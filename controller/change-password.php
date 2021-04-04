<?php
$passActual = $_POST['passActual'];
$newPass = $_POST['newPass'];

session_start();
$usuario = $_SESSION['usuario'];

include_once '../model/User.php';
$User = new User("developer");

$respuesta = $User->changePassword(
    array(
        'email'=>$usuario['email'],
        'passActual'=>$passActual,
        'newPass'=> $newPass));

header('Location: ../app/index.php?message='.$respuesta['message']);
die();
