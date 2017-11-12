<?php
/*
 * Este archivo contiene el modelo que accede a la BD
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

class DefaultModel {
    var $login;
    var $password;
    var $dni;
    var $nombre;
    var $apellidos;
    var $telefono;
    var $email;
    var $fechaNacimiento;
    var $fotoPersonal;
    var $sexo;
    var $mysqli;
    
    function __construct($login,$password,$dni,$nombre,$apellidos,$telefono,$email,$fechaNacimiento,$fotoPersonal,$sexo){
        $this->login = $login;
        $this->password = $password;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->fotoPersonal = $fotoPersonal;
        $this->sexo = $sexo;
        
        include_once "../ConexionBD.php";
        $this->mysqli=conexionBD();
    }
    
    //inserta una nueva tupla en la BD
    function insert(){
        if($this->login<>"" || $this->dni<>"" || $this->email<>""){ //el campo nombre no esta vacio
            $sql="SELECT * FROM USUARIOS WHERE login='$this->login' OR dni='$this->dni' OR email='$this->email'";
            $resultado= $this->mysqli->query($sql);
            if ($resultado->num_rows==0) { //comprobamos q no exita ya un user con ese nombre
                $sql = "INSERT INTO USUARIOS (login,password,dni,nombre,apellidos,telefono,email,fechaNacimiento,fotoPersonal,sexo) VALUES ('$this->login','$this->password','$this->dni','$this->nombre','$this->apellidos','$this->telefono','$this->email','$this->fechaNacimiento','$this->fotoPersonal','$this->sexo')";
                $this->mysqli->query($sql);
                return "Inserción realizada con éxito";
            }
            else { //si ya existe ese ej
                return "Ya existe en la base de datos";
            }
        }
        else{
            return "Introduzca los datos necesarios";
        }
    }
    
    //borra una tupla en la BD
    function delete(){
        $sql="SELECT * FROM USUARIOS WHERE login='$this->login'";
        $resultado= $this->mysqli->query($sql);
        if ($resultado->num_rows==1) { //si encuentra la tupla a borrar
            $sql = "DELETE FROM USUARIOS WHERE (login='$this->login')";
            $this->mysqli->query($sql);
            return "Borrado correctamente";
        }
        else{
            return "No se encuentra el user";
        }
    }
    
    //edita una tupla en la BD 
    function update(){
        $sql="SELECT * FROM USUARIOS WHERE login='$this->login'";
        $resultado= $this->mysqli->query($sql);
        if ($resultado->num_rows==1) { //si encuentra la tupla a editar
            $tupla=$resultado->fetch_row();
            if($this->password==""){ //si login esta vacio se le añade el q ya tiene
                $password=$tupla[1];
            }
            else{
                $password= $this->password;
            }
            if($this->nombre==""){ //si esta vacia se le añade el q ya tiene
                $nombre=$tupla[3];
            }
            else{
                $nombre= $this->nombre;
            }
            if($this->apellidos==""){ //si esta vacia se le añade el q ya tiene
                $apellidos=$tupla[4];
            }
            else{
                $apellidos= $this->apellidos;
            }
            if($this->telefono==""){ //si esta vacia se le añade el q ya tiene
                $telefono=$tupla[5];
            }
            else{
                $telefono= $this->telefono;
            }
            if($this->fechaNacimiento==""){ //si esta vacia se le añade el q ya tiene
                $fechaNacimiento=$tupla[7];
            }
            else{
                $fechaNacimiento= $this->fechaNacimiento;
            }
            if($this->fotoPersonal==""){ //si esta vacia se le añade el q ya tiene
                $fotoPersonal=$tupla[8];
            }
            else{
                $fotoPersonal= $this->fotoPersonal;
            }
            if($this->sexo==""){ //si esta vacia se le añade el q ya tiene
                $sexo=$tupla[9];
            }
            else{
                $sexo= $this->sexo;
            }
            $sql = "UPDATE USUARIOS SET password='$password',nombre='$nombre',apellidos='$apellidos',telefono='$telefono',fechaNacimiento='$fechaNacimiento',fotoPersonal='$fotoPersonal',sexo='$sexo'  WHERE login='$this->login'";
            $this->mysqli->query($sql);
            return "Modificado correctamente";
        }
        else{
            return "No se encuentra el user";
        }
    }
    
    function select(){
        $soloEste=TRUE;
        $sql="SELECT * FROM USUARIOS WHERE ";
        if($this->login<>""){
            $sql.="login LIKE '%$this->login%'";
            $soloEste=FALSE;
        }
        if($this->dni<>""){
            if(!$soloEste){
                $sql.=",";
            }
            $sql.="dni LIKE '%$this->dni%'";
            $soloEste=FALSE;
        }
        if($this->nombre<>""){
            if(!$soloEste){
                $sql.=",";
            }
            $sql.="nombre LIKE '%$this->nombre%'";
            $soloEste=FALSE;
        }
        if($this->apellidos<>""){
            if(!$soloEste){
                $sql.=",";
            }
            $sql.="apellidos LIKE '%$this->apellidos%'";
            $soloEste=FALSE;
        }
        if($this->telefono<>""){
            if(!$soloEste){
                $sql.=",";
            }
            $sql.="telefono LIKE '%$this->telefono%'";
            $soloEste=FALSE;
        }
        if($this->email<>""){
            if(!$soloEste){
                $sql.=",";
            }
            $sql.="email LIKE '%$this->email%'";
            $soloEste=FALSE;
        }
        if($this->fechaNacimiento<>""){
            if(!$soloEste){
                $sql.=",";
            }
            $sql.="fechaNacimiento='$this->fechaNacimiento'";
            $soloEste=FALSE;
        }
        if($this->sexo<>""){
            if(!$soloEste){
                $sql.=",";
            }
            $sql.="sexo LIKE '%$this->sexo%'";
            $soloEste=FALSE;
        }
        if(($resultado=$this->mysqli->query($sql))){
            return $resultado;
        }
        else{
            return "La busqueda no ha devuelto resultado";
        }
    }
    
    function selectLogin(){
        $sql="SELECT * FROM USUARIOS WHERE login='$this->login'";
        if(($resultado=$this->mysqli->query($sql))){
            $tupla=$resultado->fetch_row();
            return $tupla;
        }
        else{
            return "La busqueda no ha devuelto resultado";
        }
    }
    
    function selectAll(){
        $sql="SELECT * FROM USUARIOS";
        if(($resultado=$this->mysqli->query($sql))){
            return $resultado;
        }
        else{
            return "La busqueda no ha devuelto resultado";
        }
    }
    
    public function __destruct(){
        desconexionBD($this->mysqli);
    }
}
