<?php
/*
 * Este archivo contiene una vista que enseña el formulario de alta de usuario
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

include_once "../Views/Header_View.php";
include_once "../Views/MenuLateral.php";

class ViewAdd {
    function __construct() {
        $this->render();
    }
    
    function render(){
?>
        <html>
            <head>
                <script language="javascript" src="../validaciones.js"></script>
                <title>Alta usuario</title>
            </head>
            <body class="margen">
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
                            <h2>Formulario de alta de usuario:</h2>
                            <form action="../Controllers/DefaultControler.php" method="post" onsubmit="comprobarVacio(login),comprobarVacio(password),comprobarVacio(dni),comprobarVacio(email)">
                                <div>
                                    <label for="login">Login:</label>
                                    <input type="text" name="login" size="15" onblur="comprobarVacio(login),comprobarTexto(login,15)"/>
                                </div>
                                <div>
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" size="20" onblur="comprobarVacio(password),comprobarTexto(password,20)"/>
                                </div>
                                <div>
                                    <label for="dni">DNI:</label>
                                    <input type="text" name="dni" size="9" onblur="comprobarVacio(dni),comprobarDni(dni)"/>
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
                                    <input type="text" name="email" size="60" onblur="comprobarVacio(email),comprobarCorreo(email,50)"/>
                                </div>
                                <div>
                                    <label for="fechaNacimiento">Fecha de nacimiento:</label>
                                    <input type="date" name="fechaNacimiento"/>
                                </div>
                                <div>
                                    <label for="fotoPersonal">Foto personal:</label>
                                    <input type="file" name="fotoPersonal"/>
                                </div>
                                <div>
                                    <label for="sexo">Sexo:</label>
                                    <input type="radio" name="sexo" value="hombre"/> Hombre
                                    <input type="radio" name="sexo" value="mujer"/> Mujer
                                </div>
                                <br>
                                <div>
                                    <button type="submit" name="action" value="alta">Enviar</button>
                                    <button type="reset" name="reset" value="borrar">Borrar</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </body>
	</html>
<?php
    }
}
?>