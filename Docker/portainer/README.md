# Portainer
Portainer aporta una interfaz gráfica con la que gestionar los diferentes contenedores de docker, se accede por el navegador web en este caso a través del puerto 9443. 

A continuación se puede ver el archivo docker-compose.yaml con el que se ha levantado el contenedor:

```yaml
version: "3"
services:
  portainer:
    image: portainer/portainer-ce:latest
    ports:
      - 9443:9443
    volumes:
      - data:/data
      - /var/run/docker.sock:/var/run/docker.sock
    restart: unless-stopped
volumes:
  data:
```
