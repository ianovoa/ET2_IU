<?php
/*
 * Este archivo contiene una vista que muestra el login
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

class ViewLogin {
    function __construct(){
        $this->render();
    }
    
    function render(){
?>
       <html>
            <head>
                <script language="javascript" src="../validaciones.js"></script>
                <title>Login</title>
            </head>
            <body>
                <h2>Formulario de login:</h2>
                <form action="../Controllers/LoginController.php" method="post" onsubmit="comprobarVacio(login),comprobarVacio(password)">
                    <div>
                        <label for="login">Login:</label>
                        <input type="text" name="login" size="15" onblur="comprobarVacio(login),comprobarTexto(login,15)"/>
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" name="password" size="20" onblur="comprobarVacio(password),comprobarTexto(password,20)"/>
                    </div>
                    <div>
                        <button type="submit" name="action" value="comprobar">Enviar</button>
                        <button type="reset" name="reset" value="Borrar">Borrar</button>
                    </div>
                </form>
            </body>
	</html>
<?php
    }
}
?>