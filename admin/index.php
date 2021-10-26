<?php
require '../php/app_top_admin.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog videojuegos</title>
    <link rel="stylesheet" href="http://18.134.74.30/proyectotfg/css/framework/semantic/semantic.css">
    <link rel="stylesheet" href="http://18.134.74.30/proyectotfg/css/main.css">
    <link rel="text/css" href="http://18.134.74.30/proyectotfg/css/framework/bootstrap/css/bootstrap.css">
    <link rel="text/css" href="http://18.134.74.30/proyectotfg/css/framework/bootstrap/css/bootstrap-grid.css">
    <link rel="text/css" href="http://18.134.74.30/proyectotfg/css/framework/bootstrap/css/bootstrap-reboot.css">
    <link rel="icon" href="http://18.134.74.30/proyectotfg/css/img/joystick_game_3819.ico">
    <link href="http://18.134.74.30/proyectotfg/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<?php if(isset($_SESSION['admin'])) {
    require '../view/nav/main_admin_nav.php';
}
?>
<?php
if(!isset($_SESSION['admin'])){
    require '../view/admin/home.php';
}elseif (isset($_SESSION['admin']) && !isset($_GET['section'])
){
 require '../view/admin/main.php';
}elseif (isset($_SESSION['admin']) && isset($_GET['section']) && $_GET['section'] == "posts"
){
    require '../view/admin/posts.php';
}elseif (isset($_SESSION['admin']) && isset($_GET['section']) && $_GET['section'] == "categories"
){
    require '../view/admin/categories.php';
}elseif (isset($_SESSION['admin']) && isset($_GET['section']) && $_GET['section'] == "edit-post" && isset($_GET['id_publicaciones'])
){
    require '../view/admin/edit-post.php';
}
?>
<script src="http://18.134.74.30/proyectotfg/js/librerias/jquery.min.js"></script>
<script src="http://18.134.74.30/proyectotfg/js/bootstrap.min.js"></script>
<script src="http://18.134.74.30/proyectotfg/js/librerias/popper.min.js"></script>
<script src="http://18.134.74.30/proyectotfg/css/framework/semantic/semantic.js"></script>
<script src="http://18.134.74.30/proyectotfg/ckeditor/ckeditor/ckeditor.js"></script>
<script src="http://18.134.74.30/proyectotfg/js/admin.js"></script>
</body>
</html>
