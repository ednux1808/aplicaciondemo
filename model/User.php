<?php
include '../Server/Server.php';

class User extends Server
{


    /**
     * User constructor.
     */
    public function __construct($deploy)
    {
        if($deploy === "developer"):
            $this->host = "159.89.129.181";
            $this->port = "8934";
            $this->user = "postgres";
            $this->pass = "Udel$2021$1808Udel";
            $this->dbname = "aplicacion_demostracion";
        else:

        endif;
    }

    public function addUser($data = array())
    {
        $buscar = $this->connected()->query("SELECT userExist('".$data['email']."')");
        $datos = $buscar->fetchAll(PDO::FETCH_ASSOC);

            if($datos[0]['userexist'] == 0 || $datos[0]['userexist'] === '0'){
                $add = $this->connected()->query("SELECT addUsuario('".$data['email']."','".$data['name']."','".$data['pass']."','".$data['day']."')");
                $datosObtenido = $add->fetchAll(PDO::FETCH_ASSOC);
                if($datosObtenido[0]['addusuario'] === 1){
                    return array("error"=>0, "message"=>" Registered user successfully.");
                }else{
                    return array("error"=>1, "message"=>"There was an error adding.");
                }
            }else{
                return array("error"=>1, "message"=>" The user is already registered.");
            }

    }

    public function login($data = array())
    {
        $buscar = $this->connected()->query("SELECT userExist('".$data['email']."')");
        $datos = $buscar->fetchAll(PDO::FETCH_ASSOC);
        if($datos[0]['userexist'] == 1 || $datos[0]['userexist'] === '1'){
            $usuario = $this->connected()->query("SELECT *from usuarios WHERE email = '".$data['email']."'");
            $informacion = $usuario->fetchAll(PDO::FETCH_ASSOC);
            if($data['pass'] === $informacion[0]['password']) {
                return array("error" => 0, "email" => $informacion[0]['email'], "name" => $informacion[0]['name']);
            }else{
                return array("error"=>1, "message"=>"Password is incorrect");
            }
            }else{
            return array("error"=>1, "message"=>"This email is not registered");
        }
    }

    public function changePassword($data = array())
    {
        $usuario = $this->connected()->query("SELECT *from usuarios WHERE email = '".$data['email']."'");
        $informacion = $usuario->fetchAll(PDO::FETCH_ASSOC);
        if($informacion[0]['password'] === $data['passActual']){
            $change = $this->connected()->query("UPDATE usuarios SET password = '".$data['newPass']."' WHERE email = '".$data['email']."'");
            if($change){
                return array("error"=>0, "message"=>"The password was modified successfully");
            }
        }else{
            return array("error"=>1, "message"=>"The password does not match the current one");
        }
    }


}