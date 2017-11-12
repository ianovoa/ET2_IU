<?php
/*
 * Este archivo contiene una vista que enseña el formulario de busqueda y el resultado
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

include_once "../Views/Header_View.php";
include_once "../Views/MenuLateral.php";

class ViewSearch {
    function __construct() {
        $this->render();
    }
    
    function render(){
?>
        <html>
            <head>
                <script language="javascript" src="../validaciones.js"></script>
                <title>Consulta usuario</title>
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
                            <form action="../Controllers/DefaultControler.php" method="post">
                                <div>
                                    <label for="login">Login:</label>
                                    <input type="text" name="login" size="15" onblur="comprobarTexto(login,15)"/>
                                </div>
                                <div>
                                    <label for="dni">DNI:</label>
                                    <input type="text" name="dni" size="9" onblur="comprobarDni(dni)"/>
                                </div>
                                <div>
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" name="nombre" size="30" onblur="comprobarAlfabetico(nombre,30)"/>
                                </div>
                                <div>
                                    <label for="apellidos">Apellidos:</label>
                                    <input type="text" name="apellidos" size="50" onblur="comprobarAlfabetico(apellidos,50)"/>
                                </div>
                                <div>
                                    <label for="telefono">Telefono:</label>
                                    <input type="number" name="telefono" size="11" onblur="comprobarEntero(telefono,000000000,999999999)"/>
                                </div>
                                <div>
                                    <label for="email">E-mail:</label>
                                    <input type="text" name="email" size="60" onblur="comprobarCorreo(email,50)"/>
                                </div>
                                <div>
                                    <label for="fechaNacimiento">Fecha de nacimiento:</label>
                                    <input type="date" name="fechaNacimiento"/>
                                </div>
                                <div>
                                    <label for="sexo">Sexo:</label>
                                    <input type="radio" name="sexo" value="hombre"/> Hombre
                                    <input type="radio" name="sexo" value="mujer"/> Mujer
                                </div>
                                <br>
                                <div>
                                    <button type="submit" name="action" value="consulta">Enviar</button>
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
    
    static function mostrar($resultado){
?>
        <html>
            <head>
                <title>Consulta usuario</title>
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
                                </tr>
<?php
        $tupla=$resultado->fetch_row();
        do{
            echo "<tr><td>$tupla[0]</td>";
            echo "<td>$tupla[3]</td>";
            echo "<td>$tupla[4]</td>";
            echo "<td>$tupla[2]</td>";
            echo "<td>$tupla[5]</td>";
            echo "<td>$tupla[6]</td></tr>";
            $tupla=$resultado->fetch_row();
        }while(!is_null($tupla));
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