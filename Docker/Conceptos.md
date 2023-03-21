# Conceptos básicos de Docker

## Introducción

 

## Docker compose

Docker compose es un plugin sencillo que ya viene pre-instalado con las últimas versiones, cuyo objetivo es orquestar contenedores.

La idea detrás de docker compose es facilitar la ejecución de diferentes contenedores que van a interactuar entre sí, a partir de un fichero .yaml en el que se indican diferentes parametros de cada uno antes de levantarse.

## Docker Hub

[Docker Hub](https://hub.docker.com/) es un sitio web similar a github en el que la gente puede de forma fácil contribuir y publicar sus imágenes. Docker tiene su propia cuenta en al que publica sus imagenes oficiales. Estas imagenes y las de autores verificados son de mayor confianza que el resto, ya que, las imagenes publicadas no dejan de ser software de terceros y pueden contener software malicioso.

## Dockerfile

Para crear imágenes de docker se utilizan ficheros lamados dockerfile, que contienen una serie de instrucciones de como generar la imagen.

Lo priemro en un dockerfile sería indicar con una linea que inicie por `FROM` la imagen base. A partir de hay se pueden inidcar comandos de bash en lineas que inicien por `RUN` para más información ver el siguiente [dockerfile](./dockerfile)