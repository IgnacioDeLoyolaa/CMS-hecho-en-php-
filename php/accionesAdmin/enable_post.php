<?php
require '../functions.php';
$obj = new AdminAcciones();

$enable = $obj->enablePost($_POST['post_id']);

echo $enable;
?>
