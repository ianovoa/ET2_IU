<?php
/*
 * Este archivo contiene una vista que enseña el menu lateral
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

class MenuLateral {
    function __construct() {
        $this->render();
    }
    
    function render(){
?>
        <nav>
            <h3 class="margen">Menu Gestion de Usuarios</h3>
            <ul>
                <form action="../Controllers/DefaultControler.php" method="post">
                    <li><button type="submit" name="action" value="alta">Añadir usuario</button></li>
                    <li><button type="submit" name="action" value="baja">Borrar usuario</button></li>
                    <li><button type="submit" name="action" value="modificacion">Modificar usuario</button></li>
                    <li><button type="submit" name="action" value="consulta">Buscar usuarios</button></li>
                    <li><button type="submit" name="action" value="verTodo">Ver usuarios</button></li>
                    <li><button type="submit" name="action" value="verDetalle">Consultar usuario</button></li>
                </form>
            </ul>
            <br><br><br>
            <div class="margen>"<a href="../index.php">Volver</a></div>
        </nav>
<?php
    }
}
?>