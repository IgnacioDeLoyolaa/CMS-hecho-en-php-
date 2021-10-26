<?php
require 'functions.php';
$admin = new AdminAcciones();
if(
    isset($_SESSION['admin']) &&
    !isset($_GET['section'])
){
    $posts = $admin->getPosts();
}
if(
    isset($_SESSION['admin']) &&
    isset($_GET['section']) &&
    $_GET['section'] == "posts"
){
    $categories = $admin->getCategories();
}
if(
    isset($_SESSION['admin']) &&
    isset($_GET['section']) &&
    $_GET['section'] == "categories"
){
    $categories = $admin->getCategories();
}if(isset($_SESSION['admin']) && isset($_GET['section']) && $_GET['section'] == "edit-post" && isset($_GET['id_publicaciones']))
    {
        $editpost = $admin->getPostInfo($_GET['id_publicaciones']);
        $categories = $admin->getCategories();
}



?>
