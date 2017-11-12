<?php
/*
 * Este archivo contiene una vista que enseña los detalles de un usuario
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

include_once "../Views/Header_View.php";
include_once "../Views/MenuLateral.php";

class ViewShowCurrent {
    function __construct() {
        $this->render();
    }
    
    function render(){
?>
        <html>
            <head>
                <script language="javascript" src="../validaciones.js"></script>
                <title>Ver en detalle usuario</title>
            </head>
            <body>
<?php
        new Header_View();
?>
                <table WIDTH="100%" HEIGHT="100%" VALIGN="top">
                    <tr VALIGN="top">
                        <td WIDTH="15%" bgcolor="#F6CECE">
<?php
        new MenuLateral();
?>
                        </td>
                        <td>
                            <h2>Formulario de busqueda:</h2>
                            <form action="../Controllers/DefaultControler.php" method="post" onsubmit="comprobarVacio(login)">
                                <div>
                                    <label for="login">Login:</label>
                                    <input type="text" name="login" size="15" onblur="comprobarVacio(login),comprobarTexto(login,15)"/>
                                </div>
                                <div>
                                    <button type="submit" name="action" value="verDetalle">Enviar</button>
                                    <button type="reset" name="reset" value="Borrar">Borrar</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </body>
	</html>
<?php
    }
    
    static function mostrar($tupla){
?>
        <html>
            <head>
                <title>Ver en detalle usuario</title>
            </head>
            <body>
<?php
        new Header_View();
?>
                <table WIDTH="100%" HEIGHT="100%" VALIGN="top">
                    <tr VALIGN="top">
                        <td WIDTH="15%" bgcolor="#F6CECE">
<?php
        new MenuLateral();
?>
                        </td>
                        <td>
                            <h2>Resultado de busqueda:</h2>
                            <table>
                                <tr>
                                    <td>Login</td>
                                    <td>Nombre</td>
                                    <td>Apellidos</td>
                                    <td>DNI</td>
                                    <td>Telefono</td>
                                    <td>E-mail</td>
                                    <td>Fecha nacimiento</td>
                                    <td>Sexo</td>
                                </tr>
<?php
            echo "<tr><td>$tupla[0]</td>";
            echo "<td>$tupla[3]</td>";
            echo "<td>$tupla[4]</td>";
            echo "<td>$tupla[2]</td>";
            echo "<td>$tupla[5]</td>";
            echo "<td>$tupla[6]</td>";
            echo "<td>$tupla[7]</td>";
            echo "<td>$tupla[9]</td></tr>";
?>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
        </html>
<?php
    }
}
