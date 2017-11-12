<?php
/*
 * Este archivo contiene una vista que enseña los usuarios que se pueden modificar y muestra el formulario
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

include_once "../Views/Header_View.php";
include_once "../Views/MenuLateral.php";

class ViewEdit {
    function __construct($listaUsers) {
        $this->render($listaUsers);
    }
    
    function render($listaUsers){
?>
        <html>
            <head>
                <script language="javascript" src="../validaciones.js"></script>
                <title>Edita usuario</title>
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
                            <h2>Seleccione el usuario a editar:</h2>
                            <form action="../Controllers/DefaultControler.php" method="post">
                                <div>
                                    <p>Selecione el login del usuario a editar:</p>
<?php
        $tupla=$listaUsers->fetch_row();
        do{
            echo "<input type='radio' name='login' value='$tupla[0]'>$tupla[0] -> $tupla[3] $tupla[4]<br>";
            $tupla=$listaUsers->fetch_row();
        }while(!is_null($tupla));
?>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" name="action" value="modificacion">Enviar</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </body>
        </html>
<?php
    }
    
    static function mostrarFormulario($login){
?>
        <html>
            <head>Edita usuario</head>
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
                            <h2>Formulario de modificacion de usuario:</h2>
                            <form action="../Controllers/DefaultControler.php" method="post">
<?php
        echo "<input type='hidden' name='login' value='$login'/>";
?>
                                <div>
                                    <label for="password">Password:</label>
                                    <input type="text" name="password" size="20" onblur="comprobarTexto(password,20)"/>
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
                                    <button type="submit" name="action" value="modificacion">Enviar</button>
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