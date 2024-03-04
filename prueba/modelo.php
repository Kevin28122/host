<?php
class UserModel
{
    private $pdo;

    public function __construct()
    {
        require_once("C:/xampp/htdocs/prueba/conection.php");
        $con = new Conection();
        $this->pdo = $con->conection();
    }
    public function getUsers()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user ORDER BY id desc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setUser($name, $email, $rol)
    {
        $stmt = $this->pdo->prepare("INSERT INTO user VALUES(null, :name, :email, :rol)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":rol", $rol);
        $stmt->execute();
    }
    public function deleteUser($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM user WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function updateUser($id, $name, $email, $rol)
    {
        $stmt = $this->pdo->prepare("UPDATE user SET name = :name, email = :email, rol = :rol WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":rol", $rol);
        $stmt->execute();
    }
}