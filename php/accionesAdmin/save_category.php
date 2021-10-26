<?php
    require '../functions.php';
    $obj = new AdminAcciones();

    $save = $obj->saveCategory($_POST['category']);
    echo $save;
    ?>
