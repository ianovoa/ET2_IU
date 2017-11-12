<?php
/*
 * Este archivo contiene el controlador que maneja vistas y modelo
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/
session_start();
include '../Models/DefaultModel.php';
include '../Views/ViewAdd.php';
include '../Views/ViewEdit.php';
include '../Views/ViewDelete.php';
include '../Views/ViewSearch.php';
include '../Views/ViewShowCurrent.php';
include '../Views/ViewShowAll.php';
include '../Views/MESSAGE_View.php';
include "../EstaRegistrado.php";

estaRegistrado();

switch ($_REQUEST['action']){
    case 'alta':
        if(!isset($_REQUEST['login'])){
            new ViewAdd();
        }
        else{
            $login=$_REQUEST['login'];
            $password=$_REQUEST['password'];
            $dni=$_REQUEST['dni'];
            $nombre=$_REQUEST['nombre'];
            $apellidos=$_REQUEST['apellidos'];
            $telefono=$_REQUEST['telefono'];
            $email=$_REQUEST['email'];
            $fechaNacimiento=$_REQUEST['fechaNacimiento'];
            
            $fotoPersonal="";
            if(isset($_FILES['fotoPersonal'])){
                $tmp_name = $_FILES['fotoPersonal']['tmp_name'];
                $fotoPersonal="../Files/$login";
                move_uploaded_file($tmp_name,"$fotoPersonal");
            }
            
            $sexo=$_REQUEST['sexo'];

            $user=new DefaultModel($login,$password,$dni,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo);
            $respuesta=$user->insert();
            new MESSAGE_View($respuesta, "../index.php");
        }
        break;
        
    case 'baja':
        if(!isset($_REQUEST['login'])){
            $selectAll=new DefaultModel("","","","","","","","","","");
            $listaUsers=$selectAll->selectAll();
            new ViewDelete($listaUsers);
        }
        elseif(!isset($_REQUEST['confirmar'])) {
            $login=$_REQUEST['login'];
            $modelo=new DefaultModel($login,"","","","","","","","","");
            $userBorrar=$modelo->selectLogin();
            ViewDelete::solicitarConfirmacion($userBorrar);
        }
        else{
            if($_REQUEST['confirmar']=="si"){ //si el usuario confirma q quiere borrar el user
                $login=$_REQUEST['login'];

                $user=new DefaultModel($login,"","","","","","","","","");
                $respuesta=$user->delete();
                new MESSAGE_View($respuesta, "../index.php");
            }
        }
        break;
        
    case 'consulta':
        if(!isset($_REQUEST['login']) && !isset($_REQUEST['dni']) && !isset($_REQUEST['nombre']) && !isset($_REQUEST['apellidos']) && !isset($_REQUEST['telefono']) && !isset($_REQUEST['email']) && !isset($_REQUEST['fechaNacimiento']) && !isset($_REQUEST['sexo'])){
            new ViewSearch();
        }
        else{
            $login=$_REQUEST['login'];
            $dni=$_REQUEST['dni'];
            $nombre=$_REQUEST['nombre'];
            $apellidos=$_REQUEST['apellidos'];
            $telefono=$_REQUEST['telefono'];
            $email=$_REQUEST['email'];
            $fechaNacimiento=$_REQUEST['fechaNacimiento'];
            $sexo=$_REQUEST['sexo'];

            $user=new DefaultModel($login,"",$dni,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,"",$sexo);           
            $resultado=$user->select();
            ViewSearch::mostrar($resultado);
        }
        break;
        
    case 'modificacion':
        if(!isset($_REQUEST['login'])){
            $selectAll=new DefaultModel("","","","","","","","","","");
            $listaUsers=$selectAll->selectAll();
            new ViewEdit($listaUsers); //asi conseguimos el login del user a modificar 
        }
        elseif(isset($_REQUEST['login']) && !isset($_REQUEST['nombre']) && !isset($_REQUEST['apellidos']) && !isset($_REQUEST['telefono']) && !isset($_REQUEST['email']) && !isset($_REQUEST['fechaNacimiento']) && !isset($_REQUEST['fotoPersonal']) && !isset($_REQUEST['sexo'])){
            $login=$_REQUEST['login'];
            ViewEdit::mostrarFormulario($login); //luego se envia a un formulario para editar
        }
        else{
            $login=$_REQUEST['login'];
            $password=$_REQUEST['password'];
            $nombre=$_REQUEST['nombre'];
            $apellidos=$_REQUEST['apellidos'];
            $telefono=$_REQUEST['telefono'];
            $fechaNacimiento=$_REQUEST['fechaNacimiento'];
            
            $fotoPersonal="";
            if(isset($_FILES['fotoPersonal'])){
                $tmp_name = $_FILES['fotoPersonal']['tmp_name'];
                $fotoPersonal="../Files/$login";
                move_uploaded_file($tmp_name,"$fotoPersonal");
            }
            
            $sexo=$_REQUEST['sexo'];

            $user=new DefaultModel($login,$password,"",$nombre,$apellidos,$telefono,"",$fechaNacimiento,$fotoPersonal,$sexo);
            $respuesta=$user->update();
            new MESSAGE_View($respuesta,"../index.php");
        }
        break;
        
    case 'verTodo':
        $selectAll=new DefaultModel("","","","","","","","","","");
        $listaUsers=$selectAll->selectAll();
        new ViewShowAll($listaUsers);
        break;
    
    case 'verDetalle':
        if(!isset($_REQUEST['login'])){
            $selectAll=new DefaultModel("","","","","","","","","","");
            $listaUsers=$selectAll->selectAll();
            new ViewShowCurrent($listaUsers);
        }
        else{
            $login=$_REQUEST['login'];
            $modelo=new DefaultModel($login,"","","","","","","","","");
            $user=$modelo->selectLogin();
            ViewShowCurrent::mostrar($user);
        }
        break;
}