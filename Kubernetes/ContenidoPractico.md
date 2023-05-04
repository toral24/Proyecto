# Contenido práctico

Para realizar las pruebas prácticas de Kubernetes se han probado tres de las alternativas que existen (minikube, kubeadm init y kind) para levantar un clúster local de Kubernetes. Minikube se ha descartado porque se instala en la máquina local y aunque levanta una máquina virtual en la que funcionará el clúster presenta dificultades de portabilidad, es decir, sería difícil hacer la presentación y entrega en USB, además de que funciona como un único nodo. En principio se iba a intentar crear un clúster de varias máquinas virtuales con kubeadm pero el nodo máster aparecía como notReady y no se encontró solución.

Por lo tanto, se ha decidido realizar las pruebas con la herramienta kind (Kubernetes IN Docker) dentro de la máquina virtual con Ubuntu 22.04 LTS que se utilizó previamente para las pruebas con Docker. 

## Instalación kind

Para realizar la instalación hay que ejecutar los siguientes comandos:

```bash
curl -Lo ./kind https://kind.sigs.k8s.io/dl/v0.10.0/kind-linux-amd64.
chmod +x ./kind.
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
networking:
  apiServerAddress: "127.0.0.1"
  apiServerPort: 6443
  podSubnet: "192.168.0.0/24"
nodes:
- role: control-plane
- role: worker
  extraPortMappings:
  - containerPort: 30950
    hostPort: 80
  extraMounts:
  - hostPath: /home/sergio/compartido
  - containerPath: /compartido
- role: worker
  extraPortMappings:
  - containerPort: 80
    hostPort: 80
  extraMounts:
  - hostPath: /home/sergio/compartido
  - containerPath: /compartido
```

Ahora para que se cree el clúster a partir del fichero de configuración anterior habrá que utilizar el mismo comando pero con el parámetro --config=config.yaml. El comando quedaría así:

```bash
kind create cluster --config=config.yaml
```

