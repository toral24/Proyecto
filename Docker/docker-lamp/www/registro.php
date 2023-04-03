<?php
/*La lógica de está página sería que los usuarios registrados se almacenasen en una base de datos como todavía
no hemos dado acceso a base de datos no se ha echo.*/
$todoOK=true;
    if(isset($_POST['verificar'])){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $DNI = $_POST['DNI'];
        $nacim = $_POST['nacim'];
        $pass = $_POST['pass'];
        $passr = $_POST['passr'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Latorre/singup</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <h2>Formulario de registro</h2>
        <div class="regIni">        
            <form method="post" action="registro.php">
                
                    <fieldset>
                        <legend>Indique sus datos</legend>
                        <label for="correo">Correo electrónico</label>
                        <input type="email" name="correo">
                        <?php
                            if(isset($_POST['verificar'])){
                                if(empty($correo)){
                                echo "<p class='error'>*Agrega un correo</p>";
                                $todoOK = false;
                                }else{
                                    $_SESSION['correo']=$correo;
                                }
                            }
                        ?>
                        <br>
                        <label for="usuario">Nombre de usuario</label>
                        <input type="text" name="usuario">
                        <?php
                            if(isset($_POST['verificar'])){
                                if(empty($usuario)){
                                echo "<p class='error'>*Agrega un nombre de usuario</p>";
                                $todoOK = false;
                                }else{
                                    session_start();
                                    $_SESSION['usuario'] = $usuario;
                                }
                            }
                        ?>
                        <br>
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre">
                        <?php
                            if(isset($_POST['verificar'])){
                                if(empty($nombre)){
                                echo "<p class='error'>*Debes indicar tu nombre</p>";
                                $todoOK = false;
                                }else{
                                    $_SESSION['nombre']=$nombre;
                                }
                            }
                        ?>
                        <br>
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos">
                        <?php
                            if(isset($_POST['verificar'])){
                                if(empty($apellidos)){
                                echo "<p class='error'>*Debes inidicart tus apellidos</p>";
                                $todoOK = false;
                                }else{
                                    $_SESSION['apellidos']=$apellidos;
                                }
                            }
                        ?>
                        <br>
                        <label for="DNI">DNI</label>
                        <input type="text" name="DNI">
                        <?php
                            if(isset($_POST['verificar'])){
                                if(empty($DNI)){
                                echo "<p class='error'>*Debes indicar tu DNI</p>";
                                $todoOK = false;
                                }else{
                                    $_SESSION['DNI']=$DNI;
                                }
                            }
                        ?>
                        <br>
                        <label for="nacim">Fecha de nacimiento</label>
                        <input type="date" name="nacim">
                        <?php
                            if(isset($_POST['verificar'])){
                                if(empty($nacim)){
                                echo "<p class='error'>*Agrega tu fecha de nacimiento</p>";
                                $todoOK = false;
                                }else{
                                    $_SESSION['nacim']=$nacim;
                                }
                            }
                        ?>
                        <br>
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass">
                        <?php
                            if(isset($_POST['verificar'])){
                                if(empty($pass)){
                                echo "<p class='error'>*Indica una contraseña</p>";
                                $todoOK = false;
                                }elseif(strlen($pass)<6){
                                    echo "<p class='error'>*La contraseña debe tener más de 6 caracteres</p>";
                                    $todoOK = false;
                                }         
                            }
                        ?>
                        <br>
                        <label for="passr">Repita la contraseña</label>
                        <input type="password" name="passr">
                        <?php
                            if(isset($_POST['verificar'])){
                                if($pass!=$passr){
                                echo "<p class='error'>*Las contraseñas no coinciden</p>";
                                $todoOK= false;
                                }else{
                                        $_SESSION['pass'] = $pass;
                                    }
                            }
                        ?>
                        <br>
                        <input class="boton" type="submit" name="verificar" value="verificar">
                    </fieldset>
                    <a href="index.php">&lt; volver</a>
            </form>
            <?php
                if($todoOK && isset($_POST['verificar'])) {
            ?>
                <form action="registro2.php" method="post">
                    <input class="boton" type="submit" name="enviar" value="enviar">
                    <input type="hidden" name="correo" value="<?php echo $correo?>">
                    <input type="hidden" name="usuario" value="<?php echo $usuario?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre?>">
                    <input type="hidden" name="apellidos" value="<?php echo $apellidos?>">
                    <input type="hidden" name="dni" value="<?php echo $DNI?>">
                    <input type="hidden" name="nacim" value="<?php echo $nacim?>">
                    <input type="hidden" name="pass" value="<?php echo $pass?>">
                </form>
            <?php
                }
            ?>
        </div>

    </body>
</html>