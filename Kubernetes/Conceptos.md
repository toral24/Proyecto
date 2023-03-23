# Conceptos básicos Kubernetes

## Índice

1. [Inicio](../../../)
2. [Guías bash y vim](../Guias_bash_y_vim/)

    2.1. [Guía bash](../Guias_bash_y_vim/bash.md)

    2.2. [Guía vim](../Guias_bash_y_vim/vim.md)
 
3. [Docker](../Docker/)

    3.1. [Conceptos básicos](../Docker/Conceptos.md)
    
    3.2. [Comandos](../Docker/comandos.md)

4. [Kubernetes](.)

    4.1. [Conceptos básicos](./Conceptos.md)

    4.2. [Comandos kubectl](./Comandos_kubectl.md)
## Introducción 

Kubernetes a diferencia de Docker tiene una gran variedad de componentes que generalmente se configuran con archivos .yaml en este proyecto se utilizarán varios de ellos que se encuentran en los enlaces vinculados al titulo de los siguientes conceptos.

## [kubectl](./Comandos_kubectl.md)

Kubectl es una interfaz de línea de comandos que se instala en un equipo cliente. Permite gestionar los recursos que disponen los clústers de kubernetes.

## [Pod](./ejemplo-pod.yaml)

Un pod es un grupo de uno o más contenedores (relativamente entrelazados), con almacenamiento y configuración de red compartidos y unas especificaciones de como ejecutar los contenedores. Un Pod modela un "host lógico", es decir, actua como una máquina virtual. 

Los contenedores dentro de un Pod comparten dirección IP y puerto y pueden comunicarse entre sí mediante comunicaciones estandar entre procesos. Los contenedores de distintos Pods no pueden comunicarse por IPC (comunicación entre procesos) sin configuración especial, por lo que, es clave dividir adecuadamente los contenedores entre los distintos Pods.

Los Pods al igual que los contenedores son entidades relativamente efímeras. Cuando se crean se les asigan un UID y se planifican en los nodos donde permaneceran hasta que se supriman. Por lo general, serán reemplazados por un Pod idéntico con distinto UID. 

Los Pods son un modelo del patrón de múltiples procesos de cooperación que forman una unidad de servicio cohesiva. Simplifican la implementación y la administración de las aplicaciones proporcionando una abstracción de mayor nivel que el conjunto de las aplicaciones que lo constituyen.

## [Volume](./ejemplo-PersistentVolume.yaml)

Los volumenes de Kubernets son una abstracción cuyo objetivo es evitar la perdida de datos importantes, ya que, los contenedores y los Pods son efimeros se perdería toda la infromación con la que se trabaja dentro de ellos. Un volumen es un directorio accesible para los contenedores de un Pod.

Los volumenes de Kubernetes se pueden dividir en persistenetes y efímeros, estos últimos tiene el mismo tiempo de vida que el pod, mientras que los persistentes son preservados a lo largo de los reinicios de los contenedores, además se deben definir por un fichero .yaml como el que se encuentra en el enlace del titulo.

## [ReplicaSet](./ejemplo-replicaset.yaml)

Consiste en mantener un conjunto estable de réplicas de Pods ejecutandose en todo momento, para garantizar la disponibilidad de las aplicaciones.

Dentro de un ReplicaSet se definen con campos un número de réplicas, incluyendo un selector que identifica los Pods que se pueden adquirir y una plantilla pod especificando los datos de los nuevos Pods que se debrían de crear para poder conseguir el número de réplicas esperado. Su proposito por lo tanto es crear y eliminar Pods para alcanzar el número esperado. Los deployments son más recomendables porque proporcionan replicaset y actualizaciones declarativas junto con muchas otras características útiles.

## [Deployment](./ejemplo-deployment.yaml)

Un controlador de Deployment proporciona actualizaciones declarativas para los Pods y los ReplicaSets. En el mismo archivo se especifica un estado deseado y el controlador de deployment se encarga de cambiar del estado actual al deaseado de forma controlada.

## Service

Un servicio es un objeto de Kubernetes que describe como se accede a las aplicaciones de un conjunto de Pods, que puede describir puertos y balanceadores de carga.  Por lo tanto, un servicio es una abtracción que define una política por la cual acceder a una aplicación

## Nodo

## Cluster

## Secret

## Ingress

## Almacenamiento

## Configmap



## StatefulSets

## DaemonSet

## Jobs

## CronJob

## ReplicationController

## Namespaces

## Kind

