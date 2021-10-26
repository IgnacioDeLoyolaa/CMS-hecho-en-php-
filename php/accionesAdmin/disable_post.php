<?php
require '../functions.php';
$obj = new AdminAcciones();

$disable = $obj->disablePost($_POST['post_id']);

echo $disable;
?>
