# Estructura LAMP

LAMP es el acrónimo de "Linux, Apache, MySQL y PHP" y es uno de los sistemas de infraestructura de internet más usado (similar a XAMPP utilizado durante el curso). Para desplegar esta estructura en docker se han utilizado tres contenedore diferentes:

* PHPMyAdmin: Expuesto desde el puerto 8000 en este contenedor se gestionarán las bases de datos que se pueden utilizar a través de PHP comunicandose con otros conetenedores.

* MySQL: Expuesto por el puerto 3306 es el único de los contenedores a los que no se accede directamente, pero es el que se habrá que inidcar junto con la IP como servidor de base de datos en los fichero PHP.

* Apache: Expuesto desde el puerto 80 será el contenedor que muestre el fichero PHP que tenga el nombre de “index.php” (si no existe dará un error).

A continuación se puede ver el archivo docker-compose.yaml utilizado para levantar los contenedores:

```yaml
version: "3.1"
services:
    db:
        image: mysql:8.0
        ports: 
            - "3306:3306"
        command: --default-authentication-plugin=mysql_native_password
        environment:
            MYSQL_DATABASE: dbname
            MYSQL_PASSWORD: test
            MYSQL_ROOT_PASSWORD: test 
        volumes:
            - ./dump:/docker-entrypoint-initdb.d
            - ./conf:/etc/mysql/conf.d
            - persistent:/var/lib/mysql
        networks:
            - default
    www:
        build: .
        ports: 
            - "80:80"
        volumes:
            - ./www:/var/www/html
        links:
            - db
        networks:
            - default
    phpmyadmin:
        image: phpmyadmin/phpmyadmin
        links: 
            - db:db
        ports:
            - 8000:80
        environment:
            MYSQL_USER: root
            MYSQL_PASSWORD: test
            MYSQL_ROOT_PASSWORD: test 
volumes:
    persistent:
```
Y el docker file utilizado para levantar el contenedor apache:

```dockerfile
FROM php:8.0.0-apache
ARG DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli
# Include alternative DB driver
# RUN docker-php-ext-install pdo
# RUN docker-php-ext-install pdo_mysql
RUN apt-get update \
    && apt-get install -y sendmail libpng-dev \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && apt-get install -y libonig-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip
RUN docker-php-ext-install gd

RUN a2enmod rewrite
```
[volver](../../index.md)