# Estructura LAMP

LAMP es el acrónimo de "Linux, Apache, MySQL y PHP" y es uno de los sistemas de infraestructura de internet más usado (similar a XAMPP utilizado durante el curso). Para desplegar esta estructura en docker se han utilizado tres contenedore diferentes:

* PHPMyAdmin: Expuesto desde el puerto 8000 en este contenedor se gestionarán las bases de datos que se pueden utilizar a través de PHP comunicandose con otros conetenedores.

* MySQL: Expuesto por el puerto 3306 es el único de los contenedores a los que no se accede directamente, pero es el que se habrá que inidcar junto con la IP como servidor de base de datos en los fichero PHP.

* Apache: Expuesto desde el puerto 80 será el contenedor que muestre el fichero PHP que tenga el nombre de “index.php” (si no existe dará un error).
