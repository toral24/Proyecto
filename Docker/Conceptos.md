# Conceptos básicos de Docker

## Índice

1. [Docker y Kubernetes. La revolución de los contenedores](../)
2. [Guías bash y vim](../Guias_bash_y_vim/)

    2.1. [Guía bash](../Guias_bash_y_vim/bash.md)

    2.2. [Guía vim](../Guias_bash_y_vim/vim.md)
 
3. [Docker](../Docker/)

    3.1. [Conceptos básicos](./Conceptos.md)
    
    3.2. [Comandos](./comandos.md)

4. [Kubernetes](../Kubernetes/)

    4.1. [Conceptos básicos](../Kubernetes/Conceptos.md)


## Docker compose

Docker compose es un plugin sencillo que ya viene pre-instalado con las últimas versiones, cuyo objetivo es orquestar contenedores.

La idea detrás de docker compose es facilitar la ejecución de diferentes contenedores que van a interactuar entre sí, a partir de un fichero .yaml en el que se indican diferentes parametros de cada uno antes de levantarse.

Para levantar todos los contenedores definidos en el fichero docker-compose.yml hay que utilizar el siguiente comando:

```bash
docker-compose up -d
```

Y para detener todos los contenedores se utilizaría:

```bash
docker-compose down
```

## Docker Hub

[Docker Hub](https://hub.docker.com/) es un sitio web similar a github en el que la gente puede de forma fácil contribuir y publicar sus imágenes. Docker tiene su propia cuenta en al que publica sus imagenes oficiales. Estas imagenes y las de autores verificados son de mayor confianza que el resto, ya que, las imagenes publicadas no dejan de ser software de terceros y pueden contener software malicioso.

## Dockerfile

Para crear imágenes de docker se utilizan ficheros lamados dockerfile, que contienen una serie de instrucciones de como generar la imagen.

Lo priemro en un dockerfile sería indicar con una linea que inicie por `FROM` la imagen base. A partir de hay se pueden inidcar comandos de bash en lineas que inicien por `RUN` para más información ver el siguiente [dockerfile](./dockerfile)