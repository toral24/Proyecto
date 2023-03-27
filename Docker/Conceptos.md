# Conceptos básicos de Docker

## Índice

1. [Inicio](../../../)
2. [Guías bash y vim](../Guias_bash_y_vim/)

    2.1. [Guía bash](../Guias_bash_y_vim/bash.md)

    2.2. [Guía vim](../Guias_bash_y_vim/vim.md)
 
3. [Docker](../Docker/)

    3.1. [Conceptos básicos](./Conceptos.md)
    
    3.2. [Comandos](./comandos.md)

4. [Kubernetes](../Kubernetes/)

    4.1. [Conceptos básicos](../Kubernetes/Conceptos.md)

    4.2. [Comandos kubectl](../Kubernetes//Comandos_kubectl.md)


## Docker compose

Docker compose es un plugin sencillo que ya viene preinstalado con las últimas versiones, cuyo objetivo es orquestar contenedores.

La idea detrás de docker compose es facilitar la ejecución de diferentes contenedores que van a interactuar entre sí, a partir de un fichero .yaml en el que se indican diferentes parámetros de cada uno antes de levantarse.

Para levantar todos los contenedores definidos en el fichero docker-compose.yml hay que utilizar el siguiente comando:

```bash
docker-compose up -d
```

Y para detener todos los contenedores se utilizaría:

```bash
docker-compose down
```

## Volume

Son un tipo especial de carpeta a la que se puede acceder mediante un contenedor. Tienen un ciclo de vida diferente de los contenedores en los que están montados, porque se almacenan fuera de los mismos. Por lo tanto, facilitan la persistencia de datos permitiendo además compartirlos entre los diferentes contenedores y el host.

Cuando se quiere indicar en un fichero docker-compose que la aplicación que se va a desplegar monte un volumen se indica de la siguiente forma:

```yaml
volumes:
    - "./app:/usr/src/app/app"
```
De esta forma cuando se ejecute `docker compose up -d` se montará la carpeta `./app` del host en la carpeta `/usr/src/app/app` del contenedor actuando de forma similar a las carpetas compartidas

## Docker Hub

[Docker Hub](https://hub.docker.com/) es un sitio web similar a github en el que la gente puede de forma fácil contribuir y publicar sus imágenes. Docker tiene su propia cuenta en la que publica sus imágenes oficiales. Estas imágenes y las de autores verificados son de mayor confianza que el resto, ya que, las imágenes publicadas no dejan de ser software de terceros y pueden contener software malicioso.

## Dockerfile

Para crear imágenes de docker se utilizan ficheros llamados dockerfile, que contienen una serie de instrucciones de como generar la imagen.

Lo primero en un dockerfile sería indicar con una línea que inicie por `FROM` la imagen base. A partir de hay se pueden indicar comandos de bash en líneas que inicien por `RUN` para más información ver el siguiente [dockerfile](./dockerfile)