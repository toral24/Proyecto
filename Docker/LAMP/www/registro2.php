<?php
require("libreria.php");
$conexion = conexion("tienda");
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        $insert="insert into clientes (dni,usuario,nombre,apellidos,mail,nacim,pass) values('".$_POST['dni']."','".$_POST['usuario']."','".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['correo']."','".$_POST['nacim']."','".$_POST['pass']."')";
        $conexion->query($insert);
        echo "Te has registrado correctamente como ".$_POST['usuario'];
        echo "<br><a href='index.php'>Volver a la página de inicio</a>"
        ?>
    </body>
</html>