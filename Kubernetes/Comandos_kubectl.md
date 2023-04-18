# Comandos kubectl


Aplicar un manifiesto de kubernetes:

```bash
kubectl apply -f ¨{Manifiesto de kubernetes}
```

Información del clúster:

```bash
kubectl cluster-info
```

Lista de nodos del clúster:

```bash
kubectl get nodes
```

Lista de pods:
```bash
kubectl get pods
```
Lista de servicios:

```bash
kubectl get service
```

Lista de deployments:

```bash
kubectl get deployments
```

Exponer un deployment:

```bash
kubectl exponse deployment first-deployment --port=80 --type=NodePort
```

Información detallada del pod:

```bash
kubectl describe pod {nombre del pod}
```

Eliminar servicio:

```bash
kubectl delete service {nombre del servicio}
```

Eliminar deployment:

```bash
kubectl delete deployment {nombre del deployment}
```

Escalar a 3 réplicas un deployment:

```bash
kubectl scale --replicas=3 deployment {nombre del deployment}
```

Acceder a un pod:

```bash
kubectl exec -it {nombre del pod} 
```

Crear un secret:

```bash
kubectl create secret generic mysql-pass --from-literal=password=mypassword
```