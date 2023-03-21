# Comandos básicos

Descargar una imagen:

```bash
docker pull {nombre de la imagen}
```

Ver imagenes instaladas:

```bash
docker images
```

Iniciar una imagen, es decir, crear un conetenedor a partir de la imagen. Si la imagen no está descargada primero se descargará y luego se ejecutará:

```bash
docker run {parametros, algunos importantes son los siguientes --> -p (indicar puerto), -v (montar en un volumen), -m (limite de memoria), -c (cuota de CPU) } {nombre o id de la imagen}
```

Motrar todos los contenedores que se estan ejecutando:

```bash
docker ps
```

Para gestionar volumenes de docker se utiliza una serie de comandos que empiezan por `docker volume`:

* Crear un volumen:
```bash 
docker volume create {Parametros} {Nombre del volumen}
```

* Listar volumenes:
```bash
docker volume ls
```

* Ver contenido del volumen:

```bash
docker volume inspect {Nombre del volumen}
```

* Borrar volumenes que no están siendo usados por ningún contenedor:

```bash
docker voume prune
```

* Borrar volumen:

```bash
docker volume rm {Nombre del voumen}
```

Ejecutar un comando en un contenedor:

```bash
docker exec {Parametros, los más importantes son:
-i --> Para acceder al modo interactivo, es decir, conectarse al contenedor y ejecutar los comandos que se quieran ejecutar hasta que se desconecte.
-d --> Para ejecutar en segundo plano, es decir, para ejecutra un comando que abrica que introducir después del nombre del contenedor.
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

Guardar una imagen de docker con el id del conetenedor en una ruta local:

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