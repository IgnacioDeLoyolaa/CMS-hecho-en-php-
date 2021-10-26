<?php
require 'functions.php';
$usuario = new AccionesUsuarios();

$clase_active_home="";
$clase_active_publicaciones="";



    if(!isset($_GET['section'])){
        $clase_active_home="active";
        //Obtener publicaciones recientes
        $posts = $usuario->getRecentPosts();
    }elseif (isset($_GET['section']) && $_GET['section'] == "post"
    ){
        //obtener info de la publicacion
        $post = $usuario->getPostInfo($_GET['id_publicaciones']);

        //obtener el perfil del usuario
        $profile = $usuario->getProfile($_SESSION["user"]);

        //Chequear que la publicación visitada ya este en favoritos del usuario
        if(isset($_SESSION["user"])
        ) {
            $check = $usuario->checkFavorites($profile[0]["id"], $_GET["id_publicaciones"]);
        }else{
            $check = false;
        }

    }elseif (isset($_GET['section']) && $_GET['section'] == "posts"
    ){
        //Para poner la clase activa en el botón publicaciones
        $clase_active_publicaciones="active";
        //obtener publicaciones
        $posts = $usuario->getPosts();
    }elseif (
        isset($_SESSION['user']) &&
        isset($_GET['section']) &&
        $_GET['section'] == "my-favorites"
    ) {
        if(isset($_SESSION["user"])){
            //Obtener el perfil del usuario
            $profile = $usuario->getProfile($_SESSION["user"]);
            //Obtener publicaciones favoritas
            $posts = $usuario->getMyFavorites($profile[0]["id"]);
        }
    }

?>
