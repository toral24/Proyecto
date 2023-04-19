<?php
require("libreria.php");
$conexion = conexion("tienda");
$tabla="select imagen,precio,descripcion from productos where id_tipo=7";
$resul=$conexion->query($tabla);
$num=$resul->num_rows;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>La torre</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <div id="cont1">
            <h1><img id="logo" src="Imagenes/logo.png">LA TORRE </h1> 
            <h3>Informática de confianza</h3>
            <div id="BuscaRegIni">
                <form id="buscador">
                    <input id="buscar_texto" type="search" placeholder="search" placeholder="buscar">
                    <input id="boton" type="submit" value=" ">
                </form>
                <p id="enlaces"><a href="registro.php">Crear usuario
                </a>/<a href="inicio.php">Iniciar Sesión</a></p>
            </div>
        </div>
        <div id="cont2">
            <br>
                <ul>
                    <li class="opciones" id="todos"><a href="index.php">Todos</a></li>
                    <li class="opciones"><a href="perifericos.php">Perifericos</a></li>
                    <li class="opciones"><a href="portatiles.php">Portatiles</a></li>
                    <li class="opciones"><a href="torres.php">Torres</a></li>
                    <li class="opciones"><a href="tablets.php">Tablets</a></li>
                    <li class="opciones"><a href="smartphones.php">Smartphones</a></li>
                    <li class="opciones"><a href="consolas.php">Consolas</a></li>
                    <li class="opciones"><a href="smartTV.php">Smart TV</a></li>
                </ul>
        </div>
        <?php
        /*
        <div class="articulos">
            <img src="Imagenes/cascos.png">
            <p>Auriculares gaming inalambricos logitech G435</p>
            <p class="precio">54,99€</p>
        </div>
        <div class="articulos">
            <img src="Imagenes/Portatil.png">
            <p>Ordenador portatil Lenovo V15</p>
            <p class="precio">319,74€</p>
        </div>
        <div class="articulos">
            <img src="Imagenes/oppo.png">
            <p>Smartphone Oppo Find X3 Neo</p>
            <p class="precio">620,41€</p>
        </div>
        
        $articulos = array(
            array("cascos.png", "Auriculares gaming inalambricos logitech G435", "54,99€"),
            array("Portatil.png", "Ordenador portatil Lenovo V15", "319,74€"),
            array("oppo.png", "Smartphone Oppo Find X3 Neo", "620,41€"),
            
        );
        autogenerador($articulos);
        */
        $articulos = array();
            for($i=0;$i<$num;$i++){
                $row=$resul->fetch_assoc();
                $articulos[$i][0]=$row['imagen'];
                $articulos[$i][1]=$row['descripcion'];
                $articulos[$i][2]=$row['precio'];
            }
        autogenerador($articulos);
        ?>
        

    </body>
</html>