<?php
class Usuario {
    public $id_usuario, $nombre, $email, $password, $fecha_registro, $rol_id;
    public $conn;
    function __construct(){
        $this->conn = new mysqli('localhost', 'root', '', 'kaka');
    }

    function consultar(){
        // $sql = "SELECT id_usuario, nombre, email, password, fecha_registro, rol_id FROM usuario";
        $sql = "SELECT usuarios.id_usuario, usuarios.nombre, usuarios.email, usuarios.clave, usuarios.rol FROM usuarios ORDER BY usuarios.id_usuario;";
        $res = $this->conn->query($sql);
        return $res;
    }

    function insertar($nombre, $email, $clave, $rol){
        $sql = "INSERT INTO usuarios (nombre, email, clave, rol) VALUES ('$nombre', '$email', '$clave', '$rol')";
        $res = $this->conn->query($sql);

    }

    function editar($id_usuario, $nombre, $email, $password, $rol){
        $sql = "UPDATE usuarios SET nombre = '$nombre', email = '$email', clave = '$password', rol = '$rol' WHERE id_usuario = $id_usuario";
        $res = $this->conn->query($sql);
    }

    function eliminar($id_usuario){
        $sql = "DELETE FROM usuarios WHERE id_usuario = $id_usuario";
        $res = $this->conn->query($sql);
    }
}
?>