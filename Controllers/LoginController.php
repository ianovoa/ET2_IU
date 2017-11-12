<?php
/*
 * Este archivo contiene el controlador que maneja vistas y modelo del login
 * Autor: 1i5bf7
 * Fecha: 05/10/2017
*/
session_start();

include '../Models/LoginModel.php';
include '../Views/ViewLogin.php';
include '../Views/MESSAGE_View.php';

if(!isset($_REQUEST['login'])){
    new ViewLogin();
}
 else {
    $login=$_REQUEST['login'];
    $password=$_REQUEST['password'];
    
    $user=new LoginModel($login);
    if($tuplaUser=$user->selectLogin($login)){
        if($password==$tuplaUser[0]){
            $_SESSION['loginUser']=$login;
            new MESSAGE_View("Usuario autentificado","../index.php");
        }
        else {
            new MESSAGE_View("Contraseña incorrecta","../index.php");
        }
    }
    else{
        new MESSAGE_View("El usuario no existe","../index.php");
    }
}