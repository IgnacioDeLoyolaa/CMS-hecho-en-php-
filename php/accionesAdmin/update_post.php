<?php
require '../functions.php';
$obj = new AdminAcciones();
$new_image = false;
$name_img = null;
$imageInfo = null;
$extension = null;
//Obtener el perfil del administrador activo
$profile = $obj->getProfile($_SESSION['admin']);
if(!empty($_FILES['image_file']['tmp_name'])) {
$new_image = true;
    $name_img = uniqid();
    $imageInfo = getimagesize($_FILES['image_file']['tmp_name']);
    $extension = "";
    //Averiguamos la extensión de la imagen
    switch ($imageInfo['mime']) {

        case "image/jpeg" :
            $extension = ".jpeg";
            break;
        case "image/jpg":
            $extension = ".jpg";
            break;
        case "image/gif":
            $extension = ".gif";
            break;
        case "image/psd":
            $extension = ".psd";
            break;
        case "image/bmp":
            $extension = ".bmp";
            break;
        default:
            break;
    }
}
//Actualizamos la publicación en la base de datos
$update = $obj->updatePost($_POST['id_publicaciones'],$_POST['txtNamePost'], $_POST['txtCategoryPost'], $_POST['description'], $name_img, $profile[0]['id'], $extension);
if ($update > 0) {
        if ($new_image) {
            move_uploaded_file($_FILES['image_file']['tmp_name'], "../../css/img/" . $name_img . $extension);
        }
        echo "true";
    }
else{
        echo "false";
}
?>