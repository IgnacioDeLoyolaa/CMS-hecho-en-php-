<?php
require '../functions.php';
$obj = new AdminAcciones();

$name_img = uniqid();
//Obtener el perfil del administrador activo
$profile = $obj->getProfile($_SESSION['admin']);
$imageInfo = getimagesize( $_FILES['image_file']['tmp_name'] );
$extension = "";
switch( $imageInfo['mime']){

    case "image/jpeg" : $extension = ".jpeg";
        break;
    case "image/jpg": $extension = ".jpg";
        break;
    case "image/gif": $extension = ".gif";
        break;
    case "image/psd": $extension = ".psd";
        break;
    case "image/bmp": $extension = ".bmp";
        break;
    default:
        break;
}
$save = $obj->savePost($_POST['txtNamePost'],$_POST['txtCategoryPost'],$_POST['description'], $name_img,$profile[0]['id'],$extension);
if($save > 0){
    move_uploaded_file($_FILES['image_file']['tmp_name'], "../../css/img/".$name_img.$extension);
    echo "true";
}else{
    echo "false";
}

?>



