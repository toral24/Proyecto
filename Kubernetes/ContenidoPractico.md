# Contenido práctico

Para realizar las pruebas prácticas de Kubernetes se han probado tres de las alternativas que existen (minikube, kubeadm init y kind) para levantar un clúster local de Kubernetes. Minikube se ha descartado porque se instala en la máquina local y aunque levanta una máquina virtual en la que funcionará el clúster presenta dificultades de portabilidad, es decir, sería difícil hacer la presentación y entrega en USB, además de que funciona como un único nodo. En principio se iba a intentar crear un clúster de varias máquinas virtuales con kubeadm pero el nodo máster aparecía como notReady y no se encontró solución.

Por lo tanto, se ha decidido realizar las pruebas con la herramienta kind (Kubernetes IN Docker) dentro de la máquina virtual con Ubuntu 22.04 LTS que se utilizó previamente para las pruebas con Docker. 

## Instalación kind

Para realizar la instalación hay que ejecutar los siguientes comandos:

```bash
curl -Lo ./kind https://kind.sigs.k8s.io/dl/v0.10.0/kind-linux-amd64
chmod +x ./kind
sudo mv ./kind /usr/local/bin
```

## Arranque clúster local con kind

Una vez instalado kind con el comando `kind create cluster` se creará un clúster de kubernetes con un único nodo. Este clúster presenta varias limitaciones:

* Desde la máquina anfitrion (host) no existe un almacenamiento compartido con el clúster que se encuentra en un único contenedor de docker que hace de nodo.
*  Solo existe un nodo, por lo que, limita la amplitud de las pruebas que se pueden hacer.
* No hay puertos compartidos entre el contenedor que hace de nodo y la máquina anfitrión por lo que no se pueden acceder a los servicios de los pods.

Todos estos problemas se pueden solventar con un fichero yaml en el que se especifiquen los nodos, se comparta almacenamiento y se mapeen algunos puertos entre el host y los nodos. En este caso se va a utilizar el siguiente fichero de configuración (config.yaml):

```yaml
kind: Cluster
apiVersion: kind.x-k8s.io/v1alpha4
nodes:
- role: control-plane
  - hostPath: /home/sergio/compartido
    containerPath: /compartido
- role: worker
  - hostPath: /home/sergio/compartido
    containerPath: /compartido
```

Para poder compartir archivos entre la máquina virtual y los contenedores que actuaran como nodos de Kubernetes es necesario especificar el parámetro extraMounts. Ahora para que se cree el clúster a partir del fichero de configuración anterior habrá que utilizar el mismo comando pero con el parámetro --config=config.yaml. El comando quedaría así:

```bash
kind create cluster --config=config.yaml
```

## Instalación kubectl

Para descargar la última versión de kubectl hay que utilizar el siguiente comando:

```bash
curl -LO "https://dl.k8s.io/release/$(curl -L -s https://dl.k8s.io/release/stable.txt)/bin/linux/amd64/kubectl"
```

Y para instalarla utilizar:

```bash
sudo install -o root -g root -m 0755 kubectl /usr/local/bin/kubectl
```

## Pruebas

Una vez se ha instalado todos los recursos necesarios habrá que comprobar que todo funciona correctamente. Al crear el clúster con kind la salida deberá de ser la siguiente:

<img src="../Imagenes/kind.png">

Ahora para comprobar que los nodos estan operativos (STATUS --> Ready) habrá que utilizar el comando kubectl get nodes: 

<img src="../Imagenes/nodos.png">

Comprobar con el manifiesto de ejemplo deployment-nginx disponible en [objetos](https://toral24.github.io/Proyecto/Kubernetes/Objetos.html) que se levantan (Ready 1/1) los pods correctamente:

<img src="../Imagenes/pods.png">

Y que es posible acceder en este caso al servicio de nginx con el comando kubectl port-forward:

<img src="../Imagenes/forward.png">

Ahora en el navegador accediendo a localhost desde la máquina virtual se puede comprobar que todo funciona correctamente:

<img src="../Imagenes/ngix.png">