<?php
 require "../functions.php";
 $user = new AccionesUsuarios();

// Given password
$password = $_POST['clave'];

// Validar la contraseña
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if($user->checkExistance($_POST['usuario'])){
 echo "Ya existe un usuario con el mismo nombre de cuenta.";
}

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
 echo 'La contraseña debe tener al menos 8 caracteres de longitud y debe incluir al menos una letra mayúscula, un número y un carácter especial.';
}
else
{
 $register = $user->Register($_POST['usuario'],$_POST['clave']);
 if($register){
   echo "Se ha registrado correctamente";
 }
}
?>
