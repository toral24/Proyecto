<?php
require("libreria.php");
$conexion = conexion("tienda");
$mensajeUsu = "";
$mensajePass = "";
  if (isset($_POST['enviar'])) {
    if(empty($_POST['usuario'])) {
        $mensajeUsu = "<p class='error'>*Agrega un nombre de usuario</p>";
    }else{
        $mensajeUsu = "";
    }
}
if (isset($_POST['enviar'])) {
    if(empty($_POST['pass'])) {
        $mensajePass = "<p class='error'>*Agrega un nombre de usuario</p>";
    }else{
        $mensajePass = "";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Latorre/singin</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <h2>Inicio de sesión</h2>
        <div>        
            <form action="inicio.php" method="post">
                <div class="regIni">
                    <fieldset>
                        <legend>Verifique sus credenciales</legend><br>
                        <label for="usuario">Nombre de usuario</label>
                        <input type="text" name="usuario" value="<?php
                        session_start();
                        if(!empty($_SESSION['usuario'])){
                            echo $_SESSION['usuario'];
                        }
                        ?>">
                        <?php
                        echo $mensajeUsu;
                        ?>
                        <br>
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass" value="<?php
                        if(!empty($_SESSION['pass'])){
                            echo $_SESSION['pass'];
                        }
                        
                        ?>">
                        <?php
                            echo $mensajePass;
                        ?><br>
                        <input type="checkbox" name="recordar" value="1">
                        <label for="recordar">Recordar usuario y contraseña</label><br>
                        <input class="boton" type="submit" name="enviar" value="enviar">
                        
                    </fieldset>
                    <a href="index.php" style="display: inline;">&lt; volver</a>
                    <?php
                    $usuario="select usuario,pass from clientes";
                    $resul=$conexion->query($usuario);
                    $num=$resul->num_rows;
                    $mensaje= "<p class='error'>*usuario y contraseña incorrectos</p>";
                    if(!empty($_POST['enviar'])){
                        for($i=0;$i<$num;$i++){
                            $row=$resul->fetch_assoc();
                            $n=$row['usuario'];
                            $p=$row['pass'];
                            if($n==$_POST['usuario']){
                                $nc=$n;
                                if($p==$_POST['pass']){
                                    $pc=$p;
                                    echo "Bienvenido de nuevo ".$_POST['usuario']." ahora puedes: ";
                                    $mensaje= "<a href='restringida/index.php'>ir a pagina restringida &gt;</a>";
                                }
                            }
                        }
                        echo $mensaje;
                    }
                    ?>
                </div>
            </form>
        </div>
    </body>
</html>