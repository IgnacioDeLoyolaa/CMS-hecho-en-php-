<?php
require '../functions.php';
$admin = new AdminAcciones();

$login = $admin->logIn($_POST['usuario'],$_POST['clave']);

if($login){
    $_SESSION['admin'] = $_POST["usuario"];
    echo "true";
 }else{
    echo "false";
}

?>
