<?php
class controller
{
    private $model;
    public function __construct()
    {
        require_once("C:/xampp/htdocs/prueba/modelo.php");
        $this->model = new UserModel();
    }
    public function getUsers()
    {
        $users = $this->model->getUsers();
        if ($users) {
            foreach ($users as $user) {
                echo 'ID: ' . $user['id'] . '<br>';
                echo 'Nombre: ' . $user['name'] . '<br>';
                echo 'Email: ' . $user['email'] . '<br>';
                echo 'Rol: ' . $user['rol'] . '<br>';
                echo '-------------------------------------<br>';
            }
        } else {
            echo 'No se encontraron usuarios.';
        }
    }
    public function setUser($name, $email, $rol)
    {
        if ($name == null || $email == null || $rol == null) {
            echo '
            <script>alert("Completa todos los campos para registrar el usuario");
            window.location = "../views/interfaces/index.html";
            </script>
            ';
            exit;
        } else {
            $this->model->setUser($name, $email, $rol);
            echo 'Usuario registrado exitosamente.';
        }
    }
    public function deleteUser($id)
    {
        if ($id == null) {
            echo '
            <script>alert("Ingresa el ID del usuario a eliminar");
            window.location = "../views/interfaces/index.html";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteUser($id);
            echo 'Usuario eliminado exitosamente.';
        }
    }
    public function updateUser($id, $name, $email, $rol)
    {
        if ($id == null || $name == null || $email == null || $rol == null) {
            echo '
            <script>alert("Completa todos los campos para actualizar el usuario");
            window.location = "../views/interfaces/index.html";
            </script>
            ';
            exit;
        } else {
            $this->model->updateUser($id, $name, $email, $rol);
            echo 'Usuario actualizado exitosamente.';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new controller();
    if (isset($_POST['getUsers'])) {
        $controller->getUsers();
        exit;
    }
    if (isset($_POST['setUser'])) {
        $controller->setUser($_POST['name'], $_POST['email'], $_POST['rol']);
        exit;
    }
    if (isset($_POST['deleteUser'])) {
        $controller->deleteUser($_POST['id']);
        exit;
    }
    if (isset($_POST['updateUser'])) {
        $controller->updateUser($_POST['id'], $_POST['name'], $_POST['email'], $_POST['rol']);
        exit;
    }
}