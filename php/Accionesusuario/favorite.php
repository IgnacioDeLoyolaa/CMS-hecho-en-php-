<?php
require '../functions.php';
$user = new AccionesUsuarios();
//Obtener el perfil del usuario
$profile = $user->getProfile($_SESSION["user"]);
//Marcar como favorito
$favorite = $user->markAsFavorite($_POST["post_id"], $profile[0]["id"]);
if($favorite > 0) {
    echo "true";
}else{
    echo "false";
}
?>