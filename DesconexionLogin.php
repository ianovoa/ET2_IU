<?php
/*
 * Este archivo contiene la funcion para finalizar una sesion
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

session_start();
include 'Views/MESSAGE_View.php';
$login=$_SESSION['loginUser'];
session_destroy();
new MESSAGE_View("Desconexion del usuario $login realizada con exito", "index.php");
?>
