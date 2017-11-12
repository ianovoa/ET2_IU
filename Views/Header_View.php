<?php
/*
 * Este archivo contiene la vista que enseña la cabecera
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

class Header_View{
    function __construct() {
        $this->render();
    }
    
    function render(){
?>
        <header>
            <table WIDTH="100%" BGCOLOR="#8A0808" ALIGN=CENTER style="text-align:center">
                <tr><td style="color: #FFFFFF"><h1>Gestion de Usuarios</h1></td></tr>
<?php
        $login=$_SESSION['loginUser'];
        echo "<tr><td style='"."color: #FFFFFF'><b>Usuario: $login</b></td></tr>";
?>
                <tr><td><a href="../DesconexionLogin.php">Desconectar</a></td></tr>
            </table>
        </header>
<?php
    }
}