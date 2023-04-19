# Homeassistant

El último contendor que se va a implantar en esta parte del trabajo será dedicado a Homeassistant que es una plataforma de domótica de código abierto que permite rastrear y controlar los dispositivos del hogar y automatizar su control.

Consta de un solo contenedor que se expone desde el puerto 8123. A continuación se puede ver el archivo docker-compose.yaml utilizado para levantar el contenedor:

```yaml
version: '3'
services:
  homeassistant:
    container_name: homeassistant
    image: "ghcr.io/home-assistant/home-assistant:stable"
    volumes:
      - ./data:/config
      - /etc/localtime:/etc/localtime:ro
    restart: unless-stopped
    privileged: true
    ports:
      - "8123:8123"
    network_mode: bridge 
```

[volver](../../)