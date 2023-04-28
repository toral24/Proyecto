# Poste.io
Poste.io es un servidor de correo electrónico, consta de un único contenedor, y se expone por los puertos 4443 y 8181 pero para funcionar correctamente precisa de siete puertos.

Por otro lado, para poder comunicarse con el protocolo SMTP con otros correos electrónicos se necesita un certificado TLS. En este caso se utilizará “Let’s Encrypt certificate”.

A continuación se puede ver el archivo docker-compose.yaml con el que se han generado el contenedor:

```yaml
version: "3.4"
services:
  poste:
    image: analogic/poste.io
    restart: always
    expose:
      - 25
      - 8181
      - 4443
      - 110
      - 143
      - 465
      - 587
      - 993
      - 995
    volumes:
      - mail:/var/docker/
    networks:
      - default
    environment:
      - HTTPS_PORT=4443
      - HTTP_PORT=8181
      - DISABLE_CLAMAV=TRUE
```

