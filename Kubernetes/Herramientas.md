# Herramientas de Kubernetes

Kubernetes dispone de una serie de herramientas con diferentes usos que permiten administrar los clústers (kubectl y kubeadm), levantar clústers locales (kubeadm, kind, minikube, microk8s, …), facilitar la instalación de software (helm), etc.

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

También conocido como el gestor de paquetes de Kubernetes, Helm permite la configuración e implementación de aplicaciones y servicios en clústers de Kubernetes de una manera más sencilla y eficiente. A la hora de utilizar Helm se pueden dar dos casos (KeepCoding (e), 2022):
* Utilizar charts creados y diseñados por otros.
* Diseñar charts propios.
Los charts de Helm son paquetes de manifiestos de Kubernetes que se encargan de la descripción de un conjunto relacionado de recursos para la ejecución de una aplicación, herramienta o servicio. Ofrecen gran facilidad para crear, compartir, publicar y versionar dentro del sistema de Helm.
**Estructura de un chart de Helm**:
* **Directorio templates**: Donde se guardarán los ficheros de templates.
* **Values.yaml**: Contiene todos los valores por defecto.
* **Fichero Charts.yaml**: Define al chart de Helm.
* **Directorio Charts**: Tiene la capacidad de contener otros charts, que actuarán como dependencias.


## Kustomize

Es una herramienta de Kubernetes que permite crear objetos a través de un archivo llamado kustomiztion.yaml. De esta forma se puede personalizar la configuración de una aplicación sin tocar los archivos originales de los objetos.