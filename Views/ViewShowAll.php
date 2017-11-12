<?php
/*
 * Este archivo contiene una vista que enseña los usuarios almacenados en la BD
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

include_once "../Views/Header_View.php";
include_once "../Views/MenuLateral.php";

class ViewShowAll {
    function __construct($listaUsers) {
        $this->render($listaUsers);
    }
    
    function render($listaUsers){
?>
        <html>
            <head>
                <title>Ver todos usuarios</title>
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
                            <h2>Todos los usuarios</h2>
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
        $tupla=$listaUsers->fetch_row();
        do{
            echo "<tr><td>$tupla[0]</td>";
            echo "<td>$tupla[3]</td>";
            echo "<td>$tupla[4]</td>";
            echo "<td>$tupla[2]</td>";
            echo "<td>$tupla[5]</td>";
            echo "<td>$tupla[6]</td></tr>";
            $tupla=$listaUsers->fetch_row();
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
