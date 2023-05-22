# Objetos de Kubernetes

Los objetos de Kubernetes son entidades persistentes dentro del sistema de Kubernetes, que se utilizan para representar el estado deseado del clúster. En ellos se especifica que contenedores se van a correr, de que recursos van a disponer y que políticas llevar a cabo con dichos contenedores (reinicio, actualización, …).
Todos los objetos de Kubernetes incluyen el campo spec en el que se especifica el estado deseado del objeto. Lo más habitual para definir un objeto de Kubernetes es utilizar un archivo .yaml, también conocidos como manifiestos, en el que se proporciona toda la información. Para crear el objeto definido en dicho archivo se utiliza el comando de kubectl kubectl apply -f “archivo.yaml” y la api de Kubernetes convierte está información a JSON y crea el objeto si no ha habido ningún error. El archivo .yaml debe contener obligatoriamente los siguientes campos:
* `apiVersision`: Versión de la API de Kubernetes.
* `Kind`: Clase de objeto.
* `Metadata`: Permite identificar el objeto incluyendo las etiquetas name, UID y/o namespace (en el siguiente punto se analizan estos últimos).

## Namespaces

Los namespaces o espacios de nombres son clústers virtuales, estos permiten dividir los recursos del clúster principal entre los diferentes equipos, proyectos, etc. Se utiliza principalmente en entornos con muchos usuarios.
De forma predeterminada Kubernetes arranca tres espacios de nombre
* <u>Default</u>: Es el espacio al que se asignan los objetos en los que no se especifica ningún espacio de nombres.
* <u>Kube-system</u>: En este espacio se ejecutan los objetos creados por el propio sistema de Kubernetes.
* <u>Kube-public</u>: Es legible por todos los usuarios (incluidos los no autenticados). Se reserva principalmente para uso interno del cúster, en caso de que algunos recursos necesiten ser visibles y legibles por todo el mundo.

Con el parámetro `--namespace={namespace sobre el que se quiera ejecutar un comando}` se indica que el comando que se va a ejecutar sea dentro del espacio de nombres que se le ha indiciado.
Por ejemplo:
`kubectl --namespace=contabilidad get pods`

## Pod

Un pod es un grupo de uno o más contenedores (relativamente entrelazados), con almacenamiento y configuración de red compartidos y unas especificaciones de como ejecutar los contenedores. Un Pod modela un "host lógico", es decir, actúa como una máquina virtual. 

Los contenedores dentro de un Pod comparten dirección IP y puerto y pueden comunicarse entre sí mediante comunicaciones estándar entre procesos. Los contenedores de distintos Pods no pueden comunicarse por IPC (comunicación entre procesos) sin configuración especial, por lo que, es clave dividir adecuadamente los contenedores entre los distintos Pods.

Los Pods al igual que los contenedores son entidades relativamente efímeras. Cuando se crean se les asignan un UID y se planifican en los nodos donde permanecerán hasta que se supriman. Por lo general, serán reemplazados por un Pod idéntico con distinto UID. 

Los Pods son un modelo del patrón de múltiples procesos de cooperación que forman una unidad de servicio cohesiva. Simplifican la implementación y la administración de las aplicaciones proporcionando una abstracción de mayor nivel que el conjunto de las aplicaciones que lo constituyen.

En la etiqueta container se indica la imagen (image) que se va a utilizar para generar el o los contenedores en el pod el nombre que va a recibir el contenedor (name) y la política de descarga de la imagen. Como se puede ver en el siguiente ejemplo:

```yaml
apiVersion: v1 # required
kind: Pod # required
metadata: # required
 name: pod-nginx # required
 labels:
   app: nginx
   service: web
spec: # required
 containers:
   - image: nginx:1.16
     name: contenedor-nginx
     imagePullPolicy: Always
```

## ReplicaSet

Consiste en mantener un conjunto estable de réplicas de Pods ejecutándose en todo momento, para garantizar la disponibilidad de las aplicaciones. Permite tolerancia a fallos, ya que, si algún pod falla estarán los demás disponibles y se puede modificar el número de replicas dinámicamente. Estas réplicas se ejecutan en nodos distintos del clúster, por lo que, en caso de fallar uno de los mismos también se garantiza tolerancia a fallos físicos de estos nodos.

A la hora de definir un replicaset existen los siguientes parámetros dentro del spec (especificaciones) importantes:
* `Replicas`: Número de replicas que deben estar ejecutándose.
* `Selector`: Pods que va a controlar el ReplicaSet. Con el parámetro matchLabels se indica que los Pods que tengan un determinado Label son los que van a ser controlados.
* `Template`: Se indica la plantilla que se va a utilizar para realizar las réplicas.

```yaml
apiVersion: apps/v1
kind: ReplicaSet
metadata:
  name: replicaset-nginx
spec:
  replicas: 2
  selector:
    matchLabels:
      app: nginx
  template:
    metadata:
      labels:
        app: nginx
    spec:
      containers:
        - image: nginx
          name: contenedor-nginx

```

## Deployment

Un deployment es la unidad de más alto nivel a la hora de gestionar Kubernetes. Son los objetos de Kubernetes que se utilizan para desplegar una aplicación (junto con los statefulsets). Conlleva la creación de un replicaset y de los Pods correspondientes. Es posible realizar actualización de la imagen con lo que se creará un nuevo replicaSet, si se tiene historial de replicaSet además se puede volver a una versión anterior (Rollback).

A la hora de desplegar aplicaciones en el clúster con deployment pueden darse dos casos:

* Aplicaciones con varios servicios: Por cada servicio que se necesite se crea un recurso deployment.

* Aplicaciones construidas con microservicios: Por cada microservicio que forma parte de la aplicación se crea un recurso deployment.

Los manifiestos de deployment tienen los siguientes atributos relacionados:

* revisionHistoryLimit: Indica cuántos ReplicaSets antiguos conservar para realizar rollback (por defecto es 10).
* strategy: indica cómo se va a realizar la actualización del deployment. Puede ser:
  * Recreate: Elimina los Pods antiguos y crea los nuevos.
  * RollingUpdate: Va creando los nuevos Pods, comprueba que funcionan y se eliminan los antiguos (opción por defecto).

```yaml
apiVersion: apps/v1
kind: Deployment
metadata:
  name: deployment-nginx
  labels:
    app: nginx
spec:
  revisionHistoryLimit: 2
  strategy:
    type: RollingUpdate
  replicas: 2
  selector:
    matchLabels:
      app: nginx
  template:
    metadata:
      labels:
        app: nginx
    spec:
      containers:
      - image: nginx
        name: contendor-nginx
        ports:
        - name: http
          containerPort: 80
```

## Service

Los servicios son una abstracción que permite el acceso a las aplicaciones desplegadas en un clúster que son implementadas por uno o más Pods. Puesto que a cada Pod se le asigna una dirección IP a la que no se puede acceder directamente se necesita alguna solución para el acceso a los mismo, esta solución son los services. Además, si una aplicación tiene más de un Pod asociado los services balancearán la carga entre los Pods con una política Round Robin.

Existen tres tipos de servicios principalmente:
* <u>Cluster-IP</u>: Asigna una dirección virtual y un nombre que identifica el conjunto de Pods que están ofreciendo la aplicación (es el tipo por defecto). Esto permite gestionar conexiones con otros Pods. Este tipo de servicio solo permite el acceso interno, si se necesita acceder desde el exterior se puede utilizar el comando kubectl port-fordward (véase el Anexo 3).
* <u>Node-port</u>: Abre un puerto para que el Service se accesible desde el exterior. Por defecto el puerto generado estará en el rango 30000-40000. Para acceder se utiliza la IP del servidor máster del clúster y el puerto asignado.
* <u>LoadBalancer</u>: Se utiliza para balancear la carga de los servidores o máquinas virtuales mejorando el rendimiento general. Se utiliza principalmente en servicios de cloud público.

Algunos campos importantes de los manifiestos de Services son:
* `Type`: Tipo de servicio.
* `Ports`: dentro de este campo se indica el puerto en el campo port, el name y el targertPort (name del puerto que se indica en el deployment).
* `Selector`: Selecciona los Pods a los que se va a acceder, balanceando la carga por medio de sus etiquetas, es decir, se define el Service para los Pods con la etiqueta que se especifica en este campo.

```yaml
apiVersion: v1
kind: Service
metadata:
  name: nginx
spec:
  type: NodePort
  ports:
  - name: service-http
    port: 80
    targetPort: http
  selector:
    app: nginx
```

## Ingress
Otra opción para acceder a las aplicaciones del clúster desde el exterior es utilizar Ingress controller que proporciona un proxy inverso que a través de reglas de enrutamiento de la API de Kubernetes permite el acceso a las aplicaciones a través de nombres.

Es un objeto que gestiona el acceso a los servicios de un clúster. Ingress proporciona balanceador de carga, SSL y almacenamiento virtual basado en nombres.

Ingress expone rutas http y https al exterior que permite acceder a los servicios del clúster. El enrutamiento se controla mediante reglas definidas en un Ingress resource.
Los principales campos de un manifiesto de Ingress son:
* `Host`: Nombre que se va a utilizar para el acceso. Este nombre debe apuntar a la ip del nodo máster.
* `Path`: URL que se va a utilizar, por defecto será / que es la ruta raíz.
* `pathType`: Permite indicar como trabajar con la URL.
* `Backend`: Indica el Service al que acceder. 

```yaml
apiVersion: networking.k8s.io/v1
kind: Ingress
metadata:
  name: nginx
spec:
  rules:
  - host: www.example.org
    http:
      paths:
      - path: /
        pathType: Prefix
        backend:
          service:
            name: nginx
            port:
              number: 80
```
## ConfigMap

Algunos contenedores tienen definidas ciertas variables de entorno que son necesarias antes de su despliegue, por ejemplo, usuario y contraseña de mysql, etc. Estas variables de entrono pueden ser definidas directamente con el contenedor en la etiqueta env especificando el nombre de la variable de entorno que se va a definir y el valor que se le va a dar.

Sin embargo, se pueden utilizar un configmap que permite generar un diccionario (clave, valor) para estas variables de entorno, esto permite entre otras cosas, que el resto de los objetos tengan una configuración genérica y solo habría que modificar los parámetros del configmap para ajustarlos a los valores del equipo que lo vaya a ejecutar, por ejemplo, la IP o el puerto que va a correr un contenedor. También facilita el intercambio de manifiestos en GitHub, puesto que, por ejemplo, permite establecer los valores de red donde se va a levantar el clúster en todos los manifiestos modificando un solo objeto.

Pese a que se puede generar un manifiesto donde se especifiquen los valores del Configmap es más seguro (aunque en principio no debería de contener datos confidenciales) generarlo a través de un comando y al utilizar en un manifiesto la clave no se puede ver el valor de la misma en ninguno de los manifiestos.

### Comando para crear un ConfigMap
```bash
kubectl create cm mariadb --from-literal=root_password=my-password \
                          --from-literal=mysql_usuario=usuario     \
                          --from-literal=mysql_password=password-user \
                          --from-literal=basededatos=test
```
### Uso de un ConfigMap
```yaml
...
    spec:
      containers:
        - name: contenedor-mariadb
          image: mariadb
          ports:
            - containerPort: 3306
              name: db-port
          env:
            - name: MYSQL_ROOT_PASSWORD
              valueFrom:
                configMapKeyRef:
                  name: mariadb
                  key: root_password
            - name: MYSQL_USER
              valueFrom:
                configMapKeyRef:
                  name: mariadb
                  key: mysql_usuario
            - name: MYSQL_PASSWORD
              valueFrom:
                configMapKeyRef:
                  name: mariadb
                  key: mysql_password
            - name: MYSQL_DATABASE
              valueFrom:
                configMapKeyRef:
                  name: mariadb
                  key: basededatos
```
## Secret

Un secret es un objeto muy similar a un configmap con la diferencia de que en estos objetos la información se cifra, por lo que es útil para almacenar y administrar información confidencial como contraseñas o llaves ssh, ya que por seguridad deben ser cifradas.

Igual que en el caso anterior los secrets se pueden configurar con manifiestos de Kubernetes pero es más recomendable definirlos a través de comandos (especialmente en estos objetos que si se va a almacenar información confidencial), además debería de borrarse el historial del terminal para evitar posibles ataques informáticos  

### Comando para crear un secret
```bash
kubectl create secret generic mariadb --from-literal=password=my-password
```
### Uso de un secret
```yaml
...
    spec:
      containers:
        - name: mariadb
          image: mariadb
          ports:
            - containerPort: 3306
              name: db-port
          env:
            - name: MYSQL_ROOT_PASSWORD
              valueFrom:
                secretKeyRef:
                  name: mariadb
                  key: password

```
## Volúmenes

Los volúmenes de Kubernets son una abstracción cuyo objetivo es evitar la pérdida de datos importantes, ya que, los contenedores y los Pods son efímeros se perdería toda la información con la que se trabaja dentro de ellos. Un volumen es un directorio accesible para los contenedores de un Pod.

Los volúmenes de Kubernetes se pueden dividir en:
* <u>Efímeros</u>: Tienen la misma duración que el pod, para usarlos al definir el volumen en el pod en lugar de indicar una ruta dentro del cúster hay que añadir `emptyDir: {}`.
* <u>Persistentes</u>: Un volumen persistente (PV), por otro lado, es un recurso de almacenamiento que se define a partir de un manifiesto de kubernetes y que puede ser almacenado localmente en los nodos, en un repositorio de github o en algún servicio de cloud. 

Existe una capa de abstracción entre los Pods y los volúmenes persistentes llamada Persistent Volume Claim (PVC) que se crea automáticamente un volumen persistente que tenga un storgeClass y accessMode compatible si no se especifica en el volumen persistente directamente los PVC que tiene vinculados (que es lo recomendable). Esta capa de abstracción se añade, porque puede llegar a producir conflictos vincular directamente un volumen persistente a un contenedor (Cabadas, 2022).

### Aprovisionamiento de los volúmenes

<u>Aprovisionamiento estático</u>: El administrador del clúster crea un volumen persistente en el que se van a definir las siguientes etiquetas:

* `storageClassName`: indica el aprovisionador de almacenamiento, si no se va a utilizar hay que establecerla como manual.
* `Capacity` --> `storage`: Inidicar el tamaño.
* `AccessModes`: Para indicar el modo de acceso. Los tres principales modos de acceso son:
  * `ReadWriteOnce` (escritura y lectura para un solo nodo).
  * `ReadOnlyMany` (Escritura para muchos nodos).
  * `ReadWriteMany` (Escritura y lectura para muchos nodos).
* `persistentVolumeReclaimPolicy`: Establece la política de reciclaje. Tiene tres opciones también:
  * `Retain`: El PV no se elimina aunque se elimine el PVC.
  * `Recycle`: Se elimina el contenido y el volumen es utilizable de nuevo.
  * `Delete`: Se borra después de su utilización.
* `hostPath`: Indica el directorio donde se va a guardar la información.

**Persistent volume**

```yaml
apiVersion: v1
kind: PersistentVolume
metadata:
  name: pv1
spec:
  storageClassName: manual
  capacity:
    storage: 5Gi
  accessModes:
    - ReadWriteOnce
  persistentVolumeReclaimPolicy: Recycle
  hostPath:
    path: /data/pv1
```
<u>Aprovisionamiento dinámico</u>: Se realiza una petición de almacenamiento con un PVC y de forma dinámica se crea el PV que representa el volumen y se asocia con esa petición. Para este tipo de gestión de volúmenes se necesita un aprovisionador de almacenamiento que se debe definir a través del objeto storageClass.

**Persistent volume claim**

```yaml
apiVersion: v1
kind: PersistentVolumeClaim
metadata:
    name: pvc1
spec:
  storageClassName: manual
  accessModes:
    - ReadWriteOnce
  resources:
    requests:
      storage: 1Gi
```

A la hora usar los volúmenes habrá que definir en la etiqueta spec una etiqueta volumes donde se indicarán los PVC que se van a utilizar dándole un nombre a los grupos, luego en la etiqueta containers habrá que añadir una etiqueta voumeMounts donde se indique la ruta donde se montará los PVC en mountPath y se indica el nombre que se le dio en la etiqueta anterior.

**Uso de volumenes**

```yaml
kind: Pod
apiVersion: v1
metadata:
  name: task-pv-pod
spec:
  volumes:
    - name: task-pv-storage
      persistentVolumeClaim:
       claimName: pvc1
  containers:
    - name: task-pv-container
      image: nginx
      ports:
        - containerPort: 80
          name: "http-server"
      volumeMounts:
        - mountPath: "/usr/share/nginx/html"
          name: task-pv-storage
```

## StatefulSets

Los deployment son especialmente útiles para aplicaciones sin estado como puede ser un servicio DNS, pero para las aplicaciones con estado (stateful) como puede ser un servicio de base de datos.

La mayoría de las aplicaciones que se utilizan actualmente son con estado. Lo más habitual en Kubernetes es descomponerlas en microservicios que se intercomuniquen entre sí, en aquellos que no tengan estado se utilizarán deployments y en los demás se utilizarán StatefulSet. 

Los StatefulSet controlan el despliegue de Pods con identidades únicas y persistentes. Su objetivo es poder utilizar aplicaciones que necesiten características fijas y estables en los Pods . Alguna de las características más importantes de los StatefulSet son las siguientes:

* Requieren un **Headless Service** que sea responsable de la identidad de red de los Pods. Este garantiza Pods con identificadores de red estables.
* Almacenamiento estable (cada pod recibe un PV).

Los Headless Service se caracterizan por no tener cluster IP, creará una entrada DNS por cada Pod , que nos permitirá acceder a los mismos.

### Headless Service

```yaml
apiVersion: v1
kind: Service
metadata:
  name: nginx
  labels:
    app: nginx
spec:
  ports:
  - port: 80
    name: web
  clusterIP: None
  selector:
    app: nginx
```

Las principales características en la definición de un manifiesto de StatefulSet son las siguientes:
* `serviceName`: Nombre del dominio DNS.
* `selector`: Pods que se van a controlar (se seleccionan por la etiqueta que los identifica).
* `volumeClaimTemplates`: Es donde se define el almacenamiento estable, en la definición es similar a un PVC.
* `volumeMounts`: directorio donde se va a montar el volumen persistente en el Pod.

### StatefulSet

```yaml
apiVersion: apps/v1
kind: StatefulSet
metadata:
  name: web
spec:
  serviceName: "nginx"
  replicas: 2
  selector:
    matchLabels:
      app: nginx
  template:
    metadata:
      labels:
        app: nginx
    spec:
      containers:
      - name: nginx
        image: k8s.gcr.io/nginx-slim:0.8
        ports:
        - containerPort: 80
          name: web
        volumeMounts:
        - name: www
          mountPath: /usr/share/nginx/html
  volumeClaimTemplates:
  - metadata:
      name: www
    spec:
      accessModes: [ "ReadWriteOnce" ]
      resources:
        requests:
          storage: 1Gi

```

## DaemonSet

Un Daemonset garantiza que un grupo de nodos, generalmente todos los de un clúster, ejecuten una copia de un pod determinado. Usos:
* Recolección de logs (fluentd, logstash, ...).
* Monitorización de los nodos nodos (Prometheus, sysdig, ...).
* Almacenamiento en el clúster (ceph o glusterfs).

Todos los parámetros que puede tener un DaemonSet se ya se han estudiado

```yaml
apiVersion: apps/v1
kind: DaemonSet
metadata:
  name: daemonset1
spec:
  selector:
      matchLabels:
        name: daemonset-pod 
  template:               # Plantilla con las características del Pod
    metadata:
      labels:
        name: daemonset-pod 
    spec:
      nodeSelector:
        type: worker-prod # Etiqueta del nodo en el que se ejecuta (opcional)
      containers:
      - name: daemon-pod
        image: ...
```

## Jobs y CronJob

### Job

Un job es una forma de automatizar tareas. A diferencia de los Pods los Jobs tienen un número de ejecuciones definido y un tiempo limitado. Se suelen utilizar para tareas de mantenimiento de forma puntual y recurrente.
A la hora de definirlos la única diferencia con los Pods es el parámetro completions que es el número de ejecuciones.

```yaml
apiVersion: batch/v1
kind: Job
metadata:
  name: pi
spec:
  template:
    spec:
      containers:
      - name: pi
        image: perl
        command: ["perl",  "-Mbignum=bpi", "-wle", "print bpi(2000)"]
      restartPolicy: Never
  backoffLimit: 4
```

### CronJob

Cron job es un objeto que ejecuta un job de forma periódica según un horario programado, escrito en formato cron. Al definirse tiene un parámetro adicional a los Jobs llamado Schedule que es donde se define la periodicidad, luego ya se define el job en jobTemplate.

```yaml
apiVersion: batch/v1
kind: CronJob
metadata:
  name: hello
spec:
  schedule: "*/1 * * * *"
  jobTemplate:
    spec:
      template:
        spec:
          containers:
          - name: hello
            image: busybox
            imagePullPolicy: IfNotPresent
            command:
            - /bin/sh
            - -c
            - date; echo Curso del CEP
          restartPolicy: OnFailure
```

[volver](../index.md)
