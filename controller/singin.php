<?php
$email = $_POST['email'];
$password = $_POST['pass'];

include_once '../model/User.php';
$User = new User("developer");

$respuesta = $User->login(
    array(
        'email'=>$email,
        'pass'=>$password));




session_start();
if($respuesta['error'] === 0){
    $_SESSION['usuario'] = $respuesta;
    header('Location: ../app');
    die();
}else{
    $_SESSION['respuesta'] = $respuesta;
    header('Location: ../');
    die();
}