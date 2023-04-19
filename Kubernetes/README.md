# Kubernetes

<img src="../Imagenes/kubernetes.png" width="50%">

Kubernetes hace referencia al timonel de un barco en esperanto. De ahí el logo, que recuerda a un timón.

Kubernetes es una plataforma de código abierto que se utiliza para administrar contenedores de linux. Se utiliza para implementar, escalar, mantener, programar y operar automáticamente múltiples contenedores de aplicaciones en grupos de nodos. Por otro lado, facilita la automatización y configuración declarativa.

Kubernetes está escrito en el lenguaje de programación Go, fue desarrollado por Google y liberado en el año 2014. Fue diseñado para utilizarse tanto en la nube como en ordenadores o centros de datos locales.

Un **clúster** de Kubernetes esta formado por varios **nodos**, a continuación, se analiza más en detalle estos dos conceptos.

## Nodo

Un nodo puede ser una máquina virtual o física, dependiendo del tipo de clúster. Los nodos pueden ser:
* **máster** o plano de control: se encarga de la administración del clúster.
* **workers** o de trabajo: cada nodo de estos últimos está gestionado por el primero y contiene los servicios necesarios (container runtime, kubelet, kube-proxy) para ejecutar Pods.

En el siguiente punto se profundizará más sobre los mismos.

## Clúster

Un clúster es una combinación de varios nodos. Las aplicaciones individuales se ejecutan en los clústeres que se corresponde con el nivel más alto de la jerarquía de Kubernetes. 
Los clústeres son importantes para aprovechar las ventajas que ofrece Kubernetes, porque permiten desplegar las aplicaciones sin vincularlas a máquinas concretas, ya que, su función principal es abstraer los contenedores y ejecutarlos en todos los ordenadores. Son muy flexibles al no estar sujetos a un sistema operativo concreto.
Un clúster de está formado por una unidad de control, también llamada nodo máster o principal y por uno o más nodos de trabajo o workers.
* El **nodo máster** se encarga de la administración del clúster. Se divide a su vez en varios componentes:
    * **Servidor API**: Es la parte frontal del nodo máster y coordina la comunicación con el clúster de Kubernetes. 
    * **Programador**: Se encarga de desplegar los contenedores en función de los recursos disponibles. Se asegura de que todos los Pods se asignen a un nodo y puedan ser ejecutados.
    * **Gestor de controladores (Controller Manager)**: Coordina los distintos controladores (procesos). Se encarga de ajustar el estado actual de un clúster al estado deseado y garantiza tomar las medidas adecuadas si los nodos individuales fallan.
    * **Etcd**: Almacena los datos importantes del clúster (almacenamiento de reserva).
* Los **nodos de trabajo** ejecutan tareas y aplicaciones que les asigna la unidad de control e incluyen:
    * **Kubelet**: es un componente de los nodos de trabajo que garantiza que cada contenedor se ejecute en un pod. Para ello interactúa con Docker Engine. Es el implementador principal de la API de Kubernetes a nivel de pod impulsando la ejecución del contenedor, y decidiendo que pueden ejecutar los Pods en un nodo determinado y que no.
    * **Kube-proxy**: Garantiza el cumplimiento de las reglas de la red. Es también el responsable de realizar el reenvío de la conexión



