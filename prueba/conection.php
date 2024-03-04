<?php
class Conection
{
    private $host = "localhost";
    private $dbname = "prueba";
    private $user = "root";
    private $password = "";

    public function conection()
    {
        try {
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            return $pdo;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}