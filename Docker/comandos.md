# Comandos básicos

Descargar una imagen:

```bash
docker pull {nombre de la imagen}
```

Ver imágenes instaladas:

```bash
docker images
```

Iniciar una imagen, es decir, crear un contenedor a partir de la imagen. Si la imagen no está descargada primero se descargará y luego se ejecutará:

```bash
docker run {parámetros, algunos importantes son los siguientes --> -p (indicar puerto), -v (montar en un volumen), -m (límite de memoria), -c (cuota de CPU) } {nombre o id de la imagen}
```

Mostrar todos los contenedores que se están ejecutando:

```bash
docker ps
```

Para gestionar volúmenes de docker se utiliza una serie de comandos que empiezan por `docker volume`:

* Crear un volumen:
```bash 
docker volume create {Parámetros} {Nombre del volumen}
```

* Listar volúmenes:
```bash
docker volume ls
```

* Ver contenido del volumen:

```bash
docker volume inspect {Nombre del volumen}
```

* Borrar volúmenes que no están siendo usados por ningún contenedor:

```bash
docker voume prune
```

* Borrar volumen:

```bash
docker volume rm {Nombre del voumen}
```

Para construir una imagen a partir de un fichero dockerfile (dentro del directorio actual o pasado como URL):

```bash
docker build {PATH | URL} -t {Nombre que va a recibir la imagen}
```
*Si se ejecuta sin parámetros se construirá una imagen a partir del dockerfile que se encuentra en el directorio actual.

Ejecutar un comando en un contenedor:

```bash
docker exec {Parámetros, los más importantes son:
-i --> Para acceder al modo interactivo, es decir, conectarse al contenedor y ejecutar los comandos que se quieran ejecutar hasta que se desconecte.
-d --> Para ejecutar en segundo plano, es decir, para ejecutar un comando que hay que introducir después del nombre del contenedor.
} {Nombre del contenedor o id}
```

Eliminar un contenedor:

```bash
docker rm {Id del contenedor}
```

Eliminar una imagen:

```bash
docker rmi {Id imagen}
```

Detener un contenedor:

```bash
docker kill {Id del contenedor}
```

Guardar una imagen de docker con el id del contenedor en una ruta local:

```bash
docker commit {Id del contenedor} {usuario}/{ruta}
```

Iniciar sesión en una cuenta de docker:

```bash
docker login (Pedirá credenciales)
```

Subir una imagen a un repositorio de docker:

```bash
docker push {usuario}/{ruta}
``` 

Ver el consumo de recursos de docker (similar a htop en linux o al administrador de tareas en windows):

```bash
docker stats
```

[volver](../../)