<?php
/*
 * Este archivo la conexion a la BD
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

function conexionBD(){
    $mysqli = new mysqli("localhost",'et2','et2','ET2');
    	
    if ($mysqli->connect_errno) {
        include './MESSAGE_View.php';
        new MESSAGE("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") \n" . $mysqli->connect_error,"./index.php");
        return false;
    }
    else{
        return $mysqli;
    }
}

function desconexionBD($mysqli){
    $mysqli->close();
}
?>
