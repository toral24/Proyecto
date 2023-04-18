# Herramientas de Kubernetes

## Kubectl

Kubectl es una interfaz de línea de comandos que se instala en un equipo cliente. Permite gestionar los recursos que disponen los clústers de kubernetes.

## Kubeadm

Kubeadm por otra parte se encarga de la creación y despliegue de clústers, del mantenimiento y la gestión de estos. En cuanto al diseño esta herramienta solo se encarga del arranque de las maquinas. Puede utilizarse para automatizar procesos de ajuste de un clúster.
**Características**:
* Compatibilidad: Se puede instalar en todo tipo de máquinas, tanto virtuales como físicas, como servidores cloud.
* Desarrollo local: Permite desarrollar localmente clústers con dependencias mínimas en poco tiempo para labores de prueba y desarrollo.
* Contribuye al funcionamiento de otras herramientas de más alto nivel.
* Es una herramienta ligera.
## Kind

Kind es el acrónimo de Kuberntes in docker, y permite levantar un clúster de Kubernetes en una máquina local en la que previamente se haya instalado docker, ya que, los nodos que se van a utilizar son contenedores de docker. 
Para realizar la instalación hay que ejecutar los siguientes comandos:
```bash
curl -Lo ./kind https://kind.sigs.k8s.io/dl/v0.10.0/kind-linux-amd64.
chmod +x ./kind.
sudo mv ./kind /usr/local/bin
```
Para levantar un clúster con un contenedor que funcionará como controlador y worker a la vez se utiliza el siguiente comando:
```bash
kind create cluster 
```
Pero se puede decidir cuantos contenedores levantar y su rol (controlador o worker) escribiendo un archivo de configuración como el siguiente:
```yaml
kind: Cluster
apiVersion: kind.x-k8s.io/v1alpha4
nodes:
- role: control-plane
- role: worker
- role: worker
```
Y pasándolo como parámetro al comando anterior:
```bash
kind create cluster –config=config.yaml
```

## Helm

## Kustomize

Es una herramienta de Kubernetes que permite crear objetos a través de un archivo llamado kustomiztion.yaml. De esta forma se puede personalizar la configuración de una aplicación sin tocar los archivos originales de los objetos.
