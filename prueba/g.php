if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getUsers'])) {
        $controller->getUsers();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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




















































if($_SERVER['REQUEST_METHOD']== 'POST'){
    $RolController = new RolController();
    if($_GET['action'] == 'Crear') {
        $nombre = $_POST['nombre'];
        $RolController->setRol($nombre);

        exit;
    }

    if($_GET['action'] == 'modificar') {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $RolController->updateRol($id,$nombre);

        exit;
    }
}


if (!empty($_GET['id'])) {
    $RolController = new RolController();
    $resultado = $RolController->deleteRol($_GET['id']);
    if($resultado != 0){
        echo
        '<script>alert("Error");
        window.location ="../views/statics/Rol.html";
        </script>
        ';
    } else {
        echo
        '<script>alert("Rol eliminado correctamente");
        window.location ="../views/statics/Rol.html";
        </script>
        ';
    }
}
if(!empty($_GET['id'])){
    $RolController = new RolController();
    $resultado = $RolController->ObtPorRol($_GET['id']);
}