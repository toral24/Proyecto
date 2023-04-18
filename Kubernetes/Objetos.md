# Objetos de Kubernetes

Los objetos de Kubernetes son entidades persistentes dentro del sistema de Kubernetes, que se utilizan para representar el estado deseado del clúster. En ellos se especifica que contenedores se van a correr, de que recursos van a disponer y que políticas llevar a cabo con dichos contenedores (reinicio, actualización, …).
Todos los objetos de Kubernetes incluyen el campo spec en el que se especifica el estado deseado del objeto. Lo más habitual para definir un objeto de Kubernetes es utilizar un archivo .yaml, también conocidos como manifiestos, en el que se proporciona toda la información. Para crear el objeto definido en dicho archivo se utiliza el comando de kubectl kubectl apply -f “archivo.yaml” y la api de Kubernetes convierte está información a JSON y crea el objeto si no ha habido ningún error. El archivo .yaml debe contener obligatoriamente los siguientes campos:
* apiVersision: Versión de la API de Kubernetes.
* Kind: Clase de objeto.
* Metadata: Permite identificar el objeto incluyendo las etiquetas name, UID y/o namespace (en el siguiente punto se analizan estos últimos).

## Namespaces

Los namespaces o espacios de nombres son clústers virtuales, estos permiten dividir los recursos del clúster principal entre los diferentes equipos, proyectos, etc. Se utiliza principalmente en entornos con muchos usuarios.
De forma predeterminada Kubernetes arranca tres espacios de nombre
* Default: Es el espacio al que se asignan los objetos en los que no se especifica ningún espacio de nombres.
* Kube-system: En este espacio se ejecutan los objetos creados por el propio sistema de Kubernetes.
* Kube-public: Es legible por todos los usuarios (incluidos los no autenticados). Se reserva principalmente para uso interno del cúster, en caso de que algunos recursos necesiten ser visibles y legibles por todo el mundo.

Con el parámetro `--namespace={namespace sobre el que se quiera ejecutar un comando}` se indica que el comando que se va a ejecutar sea dentro del espacio de nombres que se le ha indiciado.
Por ejemplo:
`kubectl --namespace=contabilidad get pods`

## [Pod](./Objetos_de_ejemplo/pod.yaml)

Un pod es un grupo de uno o más contenedores (relativamente entrelazados), con almacenamiento y configuración de red compartidos y unas especificaciones de como ejecutar los contenedores. Un Pod modela un "host lógico", es decir, actúa como una máquina virtual. 

Los contenedores dentro de un Pod comparten dirección IP y puerto y pueden comunicarse entre sí mediante comunicaciones estándar entre procesos. Los contenedores de distintos Pods no pueden comunicarse por IPC (comunicación entre procesos) sin configuración especial, por lo que, es clave dividir adecuadamente los contenedores entre los distintos Pods.

Los Pods al igual que los contenedores son entidades relativamente efímeras. Cuando se crean se les asignan un UID y se planifican en los nodos donde permanecerán hasta que se supriman. Por lo general, serán reemplazados por un Pod idéntico con distinto UID. 

Los Pods son un modelo del patrón de múltiples procesos de cooperación que forman una unidad de servicio cohesiva. Simplifican la implementación y la administración de las aplicaciones proporcionando una abstracción de mayor nivel que el conjunto de las aplicaciones que lo constituyen.

## [Volume](./Objetos_de_ejemplo/persistentVolume.yaml)

Los volúmenes de Kubernets son una abstracción cuyo objetivo es evitar la pérdida de datos importantes, ya que, los contenedores y los Pods son efímeros se perdería toda la información con la que se trabaja dentro de ellos. Un volumen es un directorio accesible para los contenedores de un Pod.

Los volúmenes de Kubernetes se pueden dividir en persistentes y efímeros, estos últimos tiene el mismo tiempo de vida que el pod, mientras que los persistentes son preservados a lo largo de los reinicios de los contenedores, además se deben definir por un fichero .yaml como el que se encuentra en el enlace del título.

## [Deployment](./Objetos_de_ejemplo/deployment.yaml)

Un controlador de Deployment proporciona actualizaciones declarativas para los Pods y los ReplicaSets. En el mismo archivo se especifica un estado deseado y el controlador de deployment se encarga de cambiar del estado actual al deseado de forma controlada.

## [ReplicaSet](./Objetos_de_ejemplo/replicaset.yaml)

Consiste en mantener un conjunto estable de réplicas de Pods ejecutándose en todo momento, para garantizar la disponibilidad de las aplicaciones.

Dentro de un ReplicaSet se definen con campos un número de réplicas, incluyendo un selector que identifica los Pods que se pueden adquirir y una plantilla pod especificando los datos de los nuevos Pods que se deberían de crear para poder conseguir el número de réplicas esperado. Su propósito por lo tanto es crear y eliminar Pods para alcanzar el número esperado. Los deployments son más recomendables porque proporcionan replicaset y actualizaciones declarativas junto con muchas otras características útiles.


## Service

Un servicio es un objeto de Kubernetes que describe como se accede a las aplicaciones de un conjunto de Pods, que puede describir puertos y balanceadores de carga.  Por lo tanto, un servicio es una abstracción que define una política por la cual acceder a una aplicación

## [Ingress](./Objetos_de_ejemplo/ingress.yaml)

Es un objeto que gestiona el acceso a los servicios de un clúster. Ingress proporciona load balancer, SSL y almacenamiento virtual basado en nombres. 
Ingress expone rutas http y https al exterior que permite acceder a los servicios del clúster. El enrutamiento se controla mediante reglas definidas en un Ingress resource.

## [Secret](./Objetos_de_ejemplo/secret.yaml)

Un secret es un objeto que permite almacenar y administrar información confidencial como contraseñas o llaves ssh, ya que por seguridad no se deben definir en otros archivos más accesibles.

## [Configmap](./Objetos_de_ejemplo/configmap.yaml)

Los configmaps se utilizan para almacenar datos no confidenciales en el formato clave-valor. Los Pods pueden utilizarlos como variables de entorno, argumentos de la línea de comandos o como ficheros de configuración de un volumen. Como se puede var en este [ejemplo](./Objetos_de_ejemplo/ejemplo-uso-configmap.yaml)

Este objeto de Kubernetes permite que el resto de los objetos tengan una configuración genérica y solo habría que modificar los parámetros del configmap para ajustarlos a los valores del equipo que lo vaya a ejecutar, por ejemplo, la IP o el puerto que va a correr un contenedor.

## [StatefulSets](./Objetos_de_ejemplo/statefulset.yaml)

Gestiona el despliegue y escalado de un conjunto de Pods, a diferencia de un deployment mantiene la identidad de los Pods mediante un identificador persistente que mantienen a lo largo de cualquier reprogramación. Son útiles para aplicaciones que necesitan:
* Identificadores de red estables.
* Almacenamiento estable.
* Despliegue y escalado ordenado.
* Actualizaciones en línea.

## [DaemonSet](./Objetos_de_ejemplo/daemonset.yaml)

Un Daemonset garantiza que un grupo de nodos, generalmente todos los de un clúster, ejecuten una copia de un pod determinado. Usos:
* Recolección de logs.
* Monitorización de nodos.
* Almacenamiento en el clúster.

## [Jobs](./Objetos_de_ejemplo/job.yaml)

Un job es una forma de automatizar tareas. A diferencia de los Pods los Jobs tienen un número de ejecuciones definido y un tiempo limitado. Se suelen utilizar para tareas de mantenimiento de forma puntual y recurrente.
A la hora de definirlos la única diferencia con los Pods es el parámetro completions que es el número de ejecuciones.

## [CronJob](./Objetos_de_ejemplo/cronjob.yaml)

Cron job es un objeto que ejecuta un job de forma periódica según un horario programado, escrito en formato cron. Al definirse tiene un parámetro adicional a los Jobs llamado Schedule que es donde se define la periodicidad, luego ya se define el job en jobTemplate.


