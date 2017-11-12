<?php
/*
 * Este archivo contiene la funcion conprobar si estas registrado
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

function estaRegistrado(){
    if (isset($_SESSION['loginUser'])){
        return TRUE;
    }
    else {
        header("Location: Controllers/LoginController.php");
        return FALSE;
    }
}


