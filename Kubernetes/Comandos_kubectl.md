# Comandos kubectl

Para crear cualquier recurso de Kubernetes se utiliza `kubectl create`, se pueden crear a partir de un manifiesto de kuberntes o indicando los parámetros necesarios directamente en el comando:
* Utilizando manifiesto:
```bash
kubectl create -f {manifiesto de kubernetes}
```
* Indicando los parámetros:

```bash
kubectl create {recurso que se va a crear} {nombre que se le va a dar} {parámetros, p.e. –image, --port, …}
```
Para aplicar el contenido de un manifiesto directamente se puede utilizar `kubectl apply`. Hay dos casos de uso principales:
* Aplicar un manifiesto de un solo recurso:
```bash
kubectl apply -f {Manifiesto que se quiere aplicar}
```
* Aplicar archivo de kustomize:
```bash
kubectl apply -k {kustomiztion.yaml o directamente el fichero donde se encuentran todos los manifiestos}
```

El comando `kubectl get` sirve para enumerar los recursos implementados, obtener sus detalles y más información sobre ellos. Se puede utilizar para:
* Nodos:
```bash 
kubectl get nodes
```
* Pods:
```bash
kubectl get Pods
```
* Servicios:
```bash
kubectl get Service
```
* Deployments:
```bash
kubectl get deployments
```
* Endpoins (IP más puerto donde se están mostrando contenedores fuera del cluster):
```bash
kubectl get ep o endpoint
```
Con `kubectl port-forward` se puede acceder a una aplicación desde el navegador indicando el puerto y el nombre del contenedor su sintaxis es la siguiente:

```bash
kubectl port-forward {nombre del contenedor} {puerto local}:{puerto exterior}
```
Para exponer un recurso de Kubernetes como un nuevo servicio se utiliza el comando `kubectl expose`. Algunos ejemplos útiles de este comando:
* Crear un servicio a partir de un manifiesto indicando los puertos:
```bash
kubectl exponse -f {manifiesto de Kubernetes valido} --port={puerto local por el que se quiere exponer} –target-port={puerto externo}.
```
* Crear una replica (replication controler) de un servicio indicando los puertos:
```bash
kubectl exponse rc {nombre servicio} --port={puerto local por el que se quiere exponer} –target-port={puerto externo}.
```
* Crear un servicio a partir de un pod indicando el nombre:
```bash
kubectl exponse pod {nombre del pod} --port={puerto local por el que se quiere exponer} –name={Nombre que se le va a dar al servicio}
```
* Crear un servicio a partir de un deployment indicando los puertos:
```bash
kubectl expose deployment {nombre del deployment} --port={puerto local por el que se quiere exponer} –target-port={puerto externo}.
```
El comando `kubectl delete` se utiliza para eliminar recursos se puede realizar a partir del nombre o de un manifiesto:
* Eliminar un recurso a partir de un manifiesto:
```bash
kubectl delete -f {Manifiesto de Kubernetes del objeto que se quiere borrar}
```
* Eliminar indicando su nombre:
```bash
kubectl delete {Nombre del recurso que se quiere borrar}
```
Para ejecutar comando dentro de un pod existe el comando `kubectl exec`. Algunos casos de uso:
* Ejecutar un comando dentro del pod:
```bash
Kubectl exec {Nombre del pod} -- {comando}
```
* Ejecutar un comando dentro de un contenedor de un pod:
```bash
Kubectl exec {Nombre del pod} -c {contenedor} -- {comando}
```
* Acceder a una terminal dentro del pod:
```bash
Kubectl exec {Nombre del pod} -i /bin/bash 
```

[volver](../index.md)