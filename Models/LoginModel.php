<?php
/*
 * Este archivo contiene el modelo que accede a la BD para el login
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

class LoginModel {
    var $login;
    var $password;
    var $mysqli;
    
    function __construct($login) {
        $this->login=$login;
        
        include_once "../ConexionBD.php";
        $this->mysqli=conexionBD();
    }
    
    function selectLogin($login){
        $sql="SELECT password FROM USUARIOS WHERE login='$this->login'";
        if(($resultado=$this->mysqli->query($sql))){
            $tupla=$resultado->fetch_row();
            return $tupla;
        }
        else{
            return false;
        }
    }
}
