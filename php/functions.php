<?php
require 'init.php';
class AccionesUsuarios{
     public function logIn($user, $pass)
     {
         global $database;

         $data = $database->select("usuario", [
             "clave"
         ], [
             "OR" => [
                 "usuario" => $user
             ]
         ]);
         $password_db = $data[0]["clave"];
         if (password_verify($pass, $password_db)) {
             return true;
         } else {
             return false;
         }
     }

     public function getProfile($user){
         global $database;

         $usuario = $database->select("usuario",[
             "id"
         ],["OR" => [
                    "usuario" => $user
                ]
             ]);
            return $usuario;
     }
     public function checkExistance($user){
         global $database;

         $usuarios = $database->count("usuario",[
             "OR" => [
                 "usuario" => $user
             ]
         ]);
         return $usuarios;
     }

     public function Register($user,$pass)
     {
         global $database;
         if ($this->checkExistance($user) == 0) {
             $register = $database->insert("usuario", [
                 "usuario" => htmlentities($user),
                 "clave" => password_hash($pass, PASSWORD_BCRYPT)
             ]);
             return $database->id();
         } else {
             return false;
         }
     }
    public function getPosts(){
            global $database;
         $posts = $database->select("publicaciones",[
             "id_publicaciones",
             "nombre",
             "img_publicaciones",
             "creado",
             "extension"
         ],[//Mostramos la publicaciones en pantalla
             'activo'=>1,
             "ORDER" => ["publicaciones.id_publicaciones" => "DESC"]
             ]);
         return $posts;
     }
     public function getRecentPosts(){
         global $database;
         $posts = $database->select("publicaciones",[
             "id_publicaciones",
             "nombre",
             "img_publicaciones",
             "creado",
             "extension"
         ],[//Mostramos la publicaciones en pantalla
             'activo'=>1,
             "ORDER" => ["publicaciones.id_publicaciones" => "DESC"],
             "LIMIT" => "6"
             ]);
         return $posts;
     }
     public function getPostInfo($id_publicaciones){
         global $database;

         $post = $database->select("publicaciones",[
             "[>]categorias" => ["id_categorias" => "id_categorias"],
             "[>]usuarios" => ["id" => "id"],
             ],[
             "publicaciones.nombre",
             "publicaciones.texto",
             "publicaciones.img_publicaciones",
             "publicaciones.extension",
             "publicaciones.creado",
             "usuarios.usuario"
         ],[//Mostramos la publicaciones en pantalla
             "publicaciones.id_publicaciones" => $id_publicaciones
         ]);
         return $post;
     }
     public function markAsFavorite($id_publicaciones,$id){
        global $database;

        $database->insert("favoritos",[
            "id" => $id,
            "id_publicaciones" => $id_publicaciones
        ]);
        return $database->id();
     }

     public function deletefavorite($favoritosid){
         global $database;

         $delete = $database->delete("favoritos", [
             "id_favoritos" => $favoritosid
         ]);
         return $delete->rowCount();
     }
     public function getMyFavorites($id){
         global $database;
         $posts = $database->select("favoritos",[
             "[>]publicaciones" => ["id_publicaciones" => "id_publicaciones"]
             ], [
             "publicaciones.id_publicaciones",
             "publicaciones.nombre",
             "publicaciones.img_publicaciones",
             "publicaciones.creado",
             "publicaciones.extension",
             "favoritos.id_favoritos"
         ],[//Mostramos la publicaciones en pantalla
             'publicaciones.activo'=>1,
             "favoritos.id" => $id,
             "ORDER" => ["favoritos.id_publicaciones" => "DESC"],
             "LIMIT" => "8"
         ]);
         return $posts;

     }
     public function checkFavorites($id,$id_publicaciones){
          global $database;

         $usuarios = $database->count("favoritos",[
             "AND" => [
                 "id" => $id,
                 "id_publicaciones" => $id_publicaciones
             ]
         ]);
         return $usuarios;
     }
 }

  class AdminAcciones
  {
      public function logIn($user, $pass)
      {
          global $database;

          $data = $database->select("usuarios", [
              "clave"
          ], [
              "OR" => [
                  "usuario" => $user
              ]
          ]);
          $password_db = $data[0]["clave"];

          if ($pass == $password_db) {
              return true;
          } else {
              return false;
          }
      }

      public function getProfile($admin)
      {
          global $database;

          $admin = $database->select("usuarios",[
              "id",
              "usuario"
          ],[
              "usuario" => $admin
              ]);
          return $admin;
      }

      public function getCategories(){
          global $database;

          $categories = $database->select("categorias",[
              "id_categorias",
              "categorias"
          ]);
          return $categories;
      }
      public function getPosts(){
          global $database;
          $posts = $database->select("publicaciones",[
              "id_publicaciones",
              "nombre",
              "img_publicaciones",
              "creado",
              "extension",
              'activo'
          ],[//Mostramos la publicaciones en pantalla
              "ORDER" => ["publicaciones.id_publicaciones" => "DESC"]
          ]);
          return $posts;
      }
      public function getPostInfo($id_publicaciones){
          global $database;

          $post = $database->select("publicaciones",[
              "[>]categorias" => ["id_categorias" => "id_categorias"],
              "[>]usuarios" => ["id" => "id"],
          ],[
              "publicaciones.nombre",
              "publicaciones.texto",
              "publicaciones.img_publicaciones",
              "publicaciones.extension",
              "publicaciones.creado",
              "publicaciones.id_categorias",
              "publicaciones.id_publicaciones",
              "usuarios.usuario"
          ],[//Mostramos la publicaciones en pantalla
              "publicaciones.id_publicaciones" => $id_publicaciones
          ]);
          return $post;
      }

      public function saveCategory($category)
      {
          global $database;

          $database->insert("categorias", [
              "categorias" => htmlentities($category)
          ]);
          return $database->id();
      }


      public function deleteCategory($category_id){
          global $database;

         $delete = $database->delete("categorias", [
              "id_categorias" => $category_id
          ]);
          return $delete->rowCount();
      }

public function savePost($name,$category_id,$description,$name_img,$id,$extension)
{
    global $database;
    try {
        $database->insert("publicaciones", [
            "nombre" => htmlentities($name),
            "texto" => $description,
            "img_publicaciones" => $name_img,
            "id_categorias" => htmlentities($category_id),
            "id" => $id,
            "creado" => time(),
            "extension" => $extension

        ]);
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }

    return $database->id();
}
      public function updatePost($id_publicaciones,$name,$category_id,$description,$name_img,$id,$extension)
      {
          global $database;
          try {
              if(!empty($name_img)) {
                  $data = $database->update("publicaciones", [
                      "nombre" => htmlentities($name),
                      "texto" => $description,
                      "img_publicaciones" => $name_img,
                      "id_categorias" => htmlentities($category_id),
                      "id" => $id,
                      "creado" => time(),
                      "extension" => $extension
                  ],
                      ["id_publicaciones[=]" => $id_publicaciones]);
              }
              else{
                  $data = $database->update("publicaciones", [
                      "nombre" => htmlentities($name),
                      "texto" => $description,
                      "id_categorias" => htmlentities($category_id),
                      "id" => $id,
                      "creado" => time()
                  ],
                      ["id_publicaciones[=]" => $id_publicaciones]);

              }

          } catch (PDOException $exception) {
              echo $exception->getMessage();
          }

          return $data->rowCount();
      }
      public function deletePost($id_publicaciones){
          global $database;
          //Las funciones anonimas no tienen visibilidad de variables de ámbito superior para ello usamos use para pasarle la variable que necesita
          $delete = false;
          //Pasamos la variable por referencia para modificar la variable delete de ambito superior
              $database->action(function($database) use($id_publicaciones,&$delete)  {
              try{
                  $database->delete("favoritos", [
                      "id_publicaciones" => $id_publicaciones
                  ]);
                  $database->delete("publicaciones", [
                      "id_publicaciones" => $id_publicaciones
                  ]);
                  $delete=true;
              }catch (Exception $e){
                  $delete=false;
                  return false;
              }

          });


          return $delete;
      }

      public function disablePost($id_publicaciones)
      {
          global $database;
          try {

                  $data = $database->update("publicaciones", [
                      "activo" =>0
                  ],
                      ["id_publicaciones[=]" => $id_publicaciones]);

          } catch (PDOException $exception) {
              echo $exception->getMessage();
          }
          return $data->rowCount();
      }

      public function enablePost($id_publicaciones)
      {
          global $database;
          try {

                  $data = $database->update("publicaciones", [
                      "activo" =>1
                  ],
                      ["id_publicaciones[=]" => $id_publicaciones]);

          } catch (PDOException $exception) {
              echo $exception->getMessage();
          }
          return $data->rowCount();
      }
}
?>
