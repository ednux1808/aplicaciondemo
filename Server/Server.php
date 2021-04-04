<?php


class Server
{
    public $host;
    public $port;
    public $user;
    public $pass;
    public $dbname;

    /**
     * Server constructor.
     */


    public function connected()
    {
        try {
            $conn = new PDO("pgsql:host=$this->host;port=$this->port;dbname=$this->dbname", $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (Exception $e) {
            echo "Ocurrió un error con la base de datos: " . $e->getMessage();
        }
    }



}