<?php
require 'php/app_top.php';

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog videojuegos</title>
    <link rel="stylesheet" href="http://18.134.74.30/proyectotfg/css/framework/semantic/semantic.css">
    <link rel="stylesheet" href="http://18.134.74.30/proyectotfg/css/main.css">
    <link rel="stylesheet" href="http://18.134.74.30/proyectotfg/css/framework/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="http://18.134.74.30/proyectotfg/css/framework/bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="http://18.134.74.30/proyectotfg/css/framework/bootstrap/css/bootstrap-reboot.css">
    <link rel="icon" href="http://18.134.74.30/proyectotfg/css/img/joystick_game_3819.ico">
    <link href="http://18.134.74.30/proyectotfg/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<body>
<?php
 require 'view/nav/main_nav.php';
?>
<?php
if(!isset($_GET['section'])){
    require 'view/home.php';
}elseif (isset($_GET['section']) && $_GET['section'] == "posts"
){
    require 'view/posts.php';
}elseif (isset($_GET['section']) && $_GET['section'] == "post"
){
    require 'view/post.php';
}elseif (isset($_GET['section']) && $_GET['section'] == "posts"
){
    require 'view/posts.php';
}elseif (isset($_GET['section']) && $_GET['section'] == "register"
){
    require 'view/register.php';
}elseif (isset($_GET['section']) && $_GET['section'] == "log-in"
){
    require 'view/login.php';
}elseif (isset($_SESSION['user']) && isset($_GET['section']) && $_GET['section'] == "my-favorites"
){
    require 'view/my-favorites.php';
}
?>
<?php
require 'view/footer.php';
?>
<script src="http://18.134.74.30/proyectotfg/js/librerias/jquery.min.js"></script>
<script src="http://18.134.74.30/proyectotfg/js/bootstrap.min.js"></script>
<script src="http://18.134.74.30/proyectotfg/js/librerias/popper.min.js"></script>
<script src="http://18.134.74.30/proyectotfg/css/framework/semantic/semantic.js"></script>
<script src="http://18.134.74.30/proyectotfg/js/main.js"></script>
</body>
</head>
</html>
