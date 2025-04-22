<?php 
require_once 'model/usuario.php';
$usuario = new Usuario(); 
// funciona la insercion
// funciona editar
// $usuario->editar(8, 'kevin', 'jua3n@gmail.com', 123, '2025-02-17 14:52:14', 2);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['editar'])){
        $id_usuario = (int)$_POST['id_usuario'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['clave'];
        $rol_id = $_POST['rol'];
        $usuario->editar($id_usuario, $nombre, $email, $password, $rol_id);
        header('Location: index.php?view=usuario');    
    }
    if (isset($_POST['agregar'])){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['clave'];
        $rol_id = $_POST['rol'];
        $usuario->insertar($nombre, $email, $password, $rol_id);
        header('Location: index.php?view=usuario');    
    }

    if (isset($_POST['eliminar'])){
        $id_usuario = $_POST['id_usuario'];
        $usuario->eliminar(($id_usuario));
        header('Location: index.php?view=usuario');    
    }

}
?>