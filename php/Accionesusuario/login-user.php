<?php

require '../functions.php';
$user = new AccionesUsuarios();
$login = $user->logIn($_POST['usuario'], $_POST['clave']);

if ($login) {
    $_SESSION['user'] = $_POST["usuario"];
    echo "true";
} else {
    echo "false";
}

?>