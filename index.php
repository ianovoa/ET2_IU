<?php
/*
 * Este archivo contiene el index
 * Autor: 1i5bf7
 * Fecha: 12/11/2017
*/

session_start();

include_once "./Views/Header_View.php";
include_once "./Views/MenuLateral.php";
include "EstaRegistrado.php";

estaRegistrado();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
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
                    <h2>Esto es texto</h2>
                    <p style="text-align: justify">The PHP development team announces the immediate availability of PHP 7.2.0 RC6. This release is the sixth Release Candidate for 7.2.0. Barring any surprises, we expect this to be the FINAL release candidate, with Nov 30th's GA release being not-substantially different. All users of PHP are encouraged to test this version carefully, and report any bugs and incompatibilities in the bug tracking system.</p>
                    <p style="text-align: justify">For more information on the new features and other changes, you can read the NEWS file, or the UPGRADING file for a complete list of upgrading notes. These files can also be found in the release archive.</p>
                    <p style="text-align: justify">For source downloads of PHP 7.2.0 Release Candidate 6 please visit the download page, Windows sources and binaries can be found at windows.php.net/qa/.</p>
                    <p><a href="http://php.net/">Link</a></p>
                    <br><center><img src="./Files/imagen" width="50%" height="50%"></center>
                </td>
            </tr>
        </table>
    </body>
</html>