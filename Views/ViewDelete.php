<?php
/*
 * Este archivo contiene una vista que enseña los usuarios que se pueden borrar y solicita confirmacion
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

include_once "../Views/Header_View.php";
include_once "../Views/MenuLateral.php";

class ViewDelete {
    function __construct($listaUsers) {
        $this->render($listaUsers);
    }
    
    function render($listaUsers){
?>
        <html>
            <head>
                <title>Baja usuario</title>
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
                            <h2>Seleccione el usuario a borrar:</h2>
                            <form action="../Controllers/DefaultControler.php" method="post">
                                <div>
                                    <p>Selecione el login del usuario a borrar:</p>
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
                                    <button type="submit" name="action" value="baja">Enviar</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </body>
        </html>
<?php
    }
    
    static function solicitarConfirmacion($userBorrar){
?>
        <html>
            <head>
                <title>Baja usuario</title>
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
                            <h2>¿Desea borrar este Usuario?</h2>
                            <table>
                                <tr>
                                    <td>Login:</td>
<?php
        echo "<td>$userBorrar[0]</td>";
?>
                                </tr>
                                <tr>
                                    <td>DNI:</td>
<?php
        echo "<td>$userBorrar[2]</td>";
?>
                                </tr>
                                <tr>
                                    <td>Nombre:</td>
<?php
        echo "<td>$userBorrar[3]</td>";
?>
                                </tr>
                                <tr>
                                    <td>Apellidos:</td>
<?php
        echo "<td>$userBorrar[4]</td>";
?>
                                </tr>
                                <tr>
                                    <td>Telefono:</td>
<?php
        echo "<td>$userBorrar[5]</td>";
?>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
<?php
        echo "<td>$userBorrar[6]</td>";
?>
                                </tr>
                                <tr>
                                    <td>Fecha de nacimiento:</td>
<?php
        echo "<td>$userBorrar[7]</td>";
?>
                                </tr>
                                <tr>
                                    <td>Foto de usuario:</td>
<?php
        echo "<td><img src='$userBorrar[8]'></td>";
?>
                                </tr>
                                <tr>
                                    <td>Sexo:</td>
<?php
        echo "<td>$userBorrar[9]</td>";
?>
                                </tr>
                            </table>
                            <br><br>
                            <form action="../Controllers/DefaultControler.php" method="POST">
<?php
        echo "<input type='hidden' name='login' value='$userBorrar[0]'/>";
        echo "<input type='hidden' name='action' value='baja'/>";
?>
                                <div>
                                    <button type="submit" name="confirmar" value="si">Si</button>
                                    <button type="submit" name="confirmar" value="no">No</button>
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