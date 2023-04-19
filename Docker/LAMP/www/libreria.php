<?php
function autogenerador($arti) {
    for ($i = 0; $i < count($arti); $i++) {
        echo "<div class='articulos'>
            <img src='Imagenes/". $arti[$i][0] ."'/>
            <p>".$arti[$i][1]."</p>
            <p class='precio'>". $arti[$i][2] ."</p>
            </div>
            ";
    }
}

function conexion($basedatos){
    $servidor="192.168.0.22:3306";
    $usuario="root";
    $contra="test";
    return new mysqli($servidor,$usuario,$contra,$basedatos);
}

?>