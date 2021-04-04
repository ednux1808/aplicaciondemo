<?php
$email = $_POST['email'];
$password = $_POST['pass'];
$name = $_POST['name'];
$day_register = date('Y-m-d');

include_once '../model/User.php';
$User = new User("developer");

$respuesta = $User->addUser(
    array(
        'email'=>$email,
        'pass'=>$password,
        'name'=> $name,
        'day'=>$day_register));



session_start();
$_SESSION['respuesta'] = $respuesta;
header('Location: ../');
die();
