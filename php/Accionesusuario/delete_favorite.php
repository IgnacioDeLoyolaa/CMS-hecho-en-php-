<?php
require '../functions.php';
$user = new AccionesUsuarios();

//Eliminar como favorito
$delete = $user->deletefavorite($_POST["favorite_id"]);
if($delete > 0){
    echo "true";
}else{
    echo "false";
}
?>
