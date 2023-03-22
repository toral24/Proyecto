# Comandos kubectl

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

Información del cluster

```bash
kubectl cluster-info
```

Lista de nodos del cluster

```bash
kubectl get nodes
```

Lista de pods
```bash
kubectl get pods
```
Lista de servicios

```bash
kubectl get service
```

Lista de deployments

```bash
kubectl get deployments
```

Exponer un deployment

```bash
kubectl exponse deployment first-deployment --port=80 --type=NodePort
```

Información detallada del pod

```bash
kubectl describe pod {nombre delpod}
```

Eliminar servicio

```bash
kubectl delete service {nombre del servicio}
```

Eliminar deployment

```bash
kubectl delete deployment {nombre del deployment}
```

Escalar a 3 replicas un deployment

```bash
kubectl scale --replicas=3 deployment {nombre del deployment}
```

Acceder a un pod

```bash
kubectl exec -it {nombre del pod} 
```

Crear un secret

```bash
kubectl create secret generic mysql-pass --from-literal=password=mypassword
```

Aplicar el contenido de un fichero deployment.yaml

```bash
kubectl apply -f deployment.yaml
```
