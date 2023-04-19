# Conceptos básicos de Docker

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

Un Dockerfile es un script que se utiliza para construir una imagen de docker personalizándola con ciertas instrucciones y que se ejecutará con el comando docker build. Algunas de estas instrucciones son las siguientes (Anónimo, 2021):

* FROM: Se utiliza para indicar la imagen a partir de la cual se construye la nueva imagen.
* LABEL: Par clave-valor que permite añadir etiquetas.
* RUN: Se utiliza para ejecutar un comando durante el proceso de construcción.
* ADD: Se utiliza para copiar archivos o directorios desde un origen indicado con “src” hacia un destino indicado con dest. También se puede configurar la propiedad del mismo.
* ENV: Con el se define una variable de entorno que se puede utilizar durante la etapa de construcción.


[volver](../../)