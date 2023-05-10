# Kubernetes

<img src="../Imagenes/kubernetes.png" width="50%">

Kubernetes hace referencia al timonel de un barco en esperanto. De ahí el logo, que recuerda a un timón. Es una plataforma de código abierto que se utiliza para administrar contenedores de linux. Se utiliza para implementar, escalar, mantener, programar y operar automáticamente múltiples contenedores de aplicaciones en grupos de nodos. Por otro lado, facilita la automatización y configuración declarativa.

Kubernetes está escrito en el lenguaje de programación Go, fue desarrollado por Google y liberado en el año 2014. Fue diseñado para utilizarse tanto en la nube como en ordenadores o centros de datos locales (Miguel, 2021).


## El clúster y los nodos

Kubernetes es un sistema distribuido, lo cual quiere decir que los recursos (memoria, cpu, …) puede encontrarse en varios dispositivos, tanto virtuales (contenedores, máquinas virtuales, …) como físicos (PCs, servidores, …) conocidos como **nodos** (Miguel, 2021). Estos nodos se dividen en:

* **Nodo máster o plano de control:** se encarga de la administración del clúster. Se divide a su vez en varios componentes:

    * <u>Servidor API (kube-apiserver):</u> Es la parte frontal del nodo máster y coordina la comunicación con el clúster de Kubernetes. 

    * <u>Programador (kube-scheduler):</u> Se encarga de desplegar los contenedores en función de los recursos disponibles. Se asegura de que todos los Pods se asignen a un nodo y puedan ser ejecutados.

    * <u>Gestor de controladores (kube-controller-manager):</u> Coordina los distintos controladores (procesos). Se encarga de ajustar el estado actual de un clúster al estado deseado y garantiza tomar las medidas adecuadas si los nodos individuales fallan.

    * <u>Etcd:</u> Almacena los datos importantes del clúster (almacenamiento de reserva).

* **Nodo de trabajos o workers:** ejecutan tareas y aplicaciones que les asigna la unidad de control e incluyen:

    * <u>Kubelet:</u> es un componente de los nodos de trabajo que garantiza que cada contenedor se ejecute en un pod. Para ello interactúa con Docker Engine. Es el implementador principal de la API de Kubernetes a nivel de pod impulsando la ejecución del contenedor, y decidiendo que pueden ejecutar los Pods en un nodo determinado y que no.

    * <u>Kube-proxy:</u> Garantiza el cumplimiento de las reglas de la red. Es también el responsable de realizar el reenvío de la conexión.

Por otro lado, un **clúster** es una combinación de varios nodos de estos nodos (mínimo un nodo máster). Las aplicaciones individuales se ejecutan en los clústeres, abstraídas del nivel físico, de ahí su importancia para aprovechar las ventajas que ofrece esta plataforma. Aportan una gran flexibilidad al no estar sujetos a un sistema operativo (Anónimo (c), 2022).