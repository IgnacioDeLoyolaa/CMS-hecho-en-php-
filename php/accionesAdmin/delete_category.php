<?php
require '../functions.php';
$obj = new AdminAcciones();

$delete = $obj->deleteCategory($_POST['category_id']);

echo $delete;
?>
