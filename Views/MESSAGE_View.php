<?php
/*
 * Este archivo contiene una vista que enseña un mensaje
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

include "../CSS.css";

class MESSAGE_View {
    function __construct($mensaje,$volver){
        $this->render($mensaje,$volver);
    }
    
    function render($mensaje,$volver){
?>
        <html>
            <head></head>
            <body>
                
<?php
        echo "<div class='margen'>MENSAJE: $mensaje";
        echo "<br><br>";
        echo "<a href='$volver'>Volver</a></div>";
        
?>
            </body>
        </html>
<?php
    }
}
?>