# Conceptos básicos Kubernetes

## Introducción 

Kubernetes a diferencia de Docker tiene una gran variedad de componentes. Estos pueden ser definidos mediante archivos .yaml con la herramienta kustomize, en este proyecto se utilizarán varios de estos archivos para configurar las diferentes partes de Kubernetes.

## Clúster

Un clúster es una combinación de varios nodos. Las aplicaciones individuales se ejecutan en los clústeres que se corresponde con el nivel más alto de la jerarquía de Kubernetes. 
Los clústeres son importantes para aprovechar las ventajas que ofrece Kubernetes, porque permiten desplegar las aplicaciones sin vincularlas a máquinas concretas, ya que, su función principal es abstraer los contenedores y ejecutarlos en todos los ordenadores. Son muy flexibles al no estar sujetos a un sistema operativo concreto.
Un clúster de está formado por una unidad de control, también llamada nodo máster o principal y por uno o más nodos de trabajo o workers.
* El nodo máster se encarga de la administración del clúster. Se divide a su vez en varios componentes:
    * Servidor API: Es la parte frontal del nodo máster y coordina la comunicación con el clúster de Kubernetes. 
    * Programador: Se encarga de desplegar los contenedores en función de los recursos disponibles. Se asegura de que todos los Pods se asignen a un nodo y puedan ser ejecutados.
    * Gestor de controladores (Controller Manager): Coordina los distintos controladores (procesos). Se encarga de ajustar el estado actual de un clúster al estado deseado y garantiza tomar las medidas adecuadas si los nodos individuales fallan.
    * Etcd: Almacena los datos importantes del clúster (almacenamiento de reserva).
* Los nodos de trabajo ejecutan tareas y aplicaciones que les asigna la unidad de control e incluyen:
    * Kubelet: es un componente de los nodos de trabajo que garantiza que cada contenedor se ejecute en un pod. Para ello interactúa con Docker Engine. Es el implementador principal de la API de Kubernetes a nivel de pod impulsando la ejecución del contenedor, y decidiendo que pueden ejecutar los Pods en un nodo determinado y que no.
    * Kube-proxy: Garantiza el cumplimiento de las reglas de la red. Es también el responsable de realizar el reenvío de la conexión

## Nodo

Un nodo puede ser una máquina virtual o física, dependiendo del tipo de clúster. Los nodos pueden ser o master (plano de control) o workers (de trabajo), cada nodo de estes últimos está gestionado por el primero y contiene los servicios necesarios (container runtime, kubelet, kube-proxy) para ejecutar Pods (en el siguiente punto se profundizará más sobre los mismos).  


## [kubectl](./Objetos_de_ejemplo/Comandos_kubectl.md)

Kubectl es una interfaz de línea de comandos que se instala en un equipo cliente. Permite gestionar los recursos que disponen los clústers de kubernetes.

## [Pod](./Objetos_de_ejemplo/pod.yaml)

Un pod es un grupo de uno o más contenedores (relativamente entrelazados), con almacenamiento y configuración de red compartidos y unas especificaciones de como ejecutar los contenedores. Un Pod modela un "host lógico", es decir, actúa como una máquina virtual. 

Los contenedores dentro de un Pod comparten dirección IP y puerto y pueden comunicarse entre sí mediante comunicaciones estándar entre procesos. Los contenedores de distintos Pods no pueden comunicarse por IPC (comunicación entre procesos) sin configuración especial, por lo que, es clave dividir adecuadamente los contenedores entre los distintos Pods.

Los Pods al igual que los contenedores son entidades relativamente efímeras. Cuando se crean se les asignan un UID y se planifican en los nodos donde permanecerán hasta que se supriman. Por lo general, serán reemplazados por un Pod idéntico con distinto UID. 

Los Pods son un modelo del patrón de múltiples procesos de cooperación que forman una unidad de servicio cohesiva. Simplifican la implementación y la administración de las aplicaciones proporcionando una abstracción de mayor nivel que el conjunto de las aplicaciones que lo constituyen.

## [Volume](./Objetos_de_ejemplo/persistentVolume.yaml)

Los volúmenes de Kubernets son una abstracción cuyo objetivo es evitar la pérdida de datos importantes, ya que, los contenedores y los Pods son efímeros se perdería toda la información con la que se trabaja dentro de ellos. Un volumen es un directorio accesible para los contenedores de un Pod.

Los volúmenes de Kubernetes se pueden dividir en persistentes y efímeros, estos últimos tiene el mismo tiempo de vida que el pod, mientras que los persistentes son preservados a lo largo de los reinicios de los contenedores, además se deben definir por un fichero .yaml como el que se encuentra en el enlace del título.


## Kustomize

Es una herramienta de Kubernetes que permite crear objetos a través de un archivo llamado kustomiztion.yaml. De esta forma se puede personalizar la configuración de una aplicación sin tocar los archivos originales de los objetos.

## [ReplicaSet](./Objetos_de_ejemplo/replicaset.yaml)

Consiste en mantener un conjunto estable de réplicas de Pods ejecutándose en todo momento, para garantizar la disponibilidad de las aplicaciones.

Dentro de un ReplicaSet se definen con campos un número de réplicas, incluyendo un selector que identifica los Pods que se pueden adquirir y una plantilla pod especificando los datos de los nuevos Pods que se deberían de crear para poder conseguir el número de réplicas esperado. Su propósito por lo tanto es crear y eliminar Pods para alcanzar el número esperado. Los deployments son más recomendables porque proporcionan replicaset y actualizaciones declarativas junto con muchas otras características útiles.

## [Deployment](./Objetos_de_ejemplo/deployment.yaml)

Un controlador de Deployment proporciona actualizaciones declarativas para los Pods y los ReplicaSets. En el mismo archivo se especifica un estado deseado y el controlador de deployment se encarga de cambiar del estado actual al deseado de forma controlada.

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


## Jobs

## CronJob

## ReplicationController

## Namespaces
