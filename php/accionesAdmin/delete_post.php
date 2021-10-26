<?php
require '../functions.php';
$obj = new AdminAcciones();

$delete = $obj->deletePost($_POST['post_id']);

echo $delete;
?>
