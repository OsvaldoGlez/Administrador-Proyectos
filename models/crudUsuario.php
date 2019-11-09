<?php

require_once '../includes/conexion.php';
require_once '../models/usuario.php';

class CrudUsuario {
    public function __construct(){}

    public function insertarUsuario($usuario) {
        $db = Db::conectar();
        $pass = sha1($usuario->getPass());
        $sql = "INSERT INTO usuarios(email, pass, id_empleado)
                VALUES(:email, :pass, :id_empleado)";
        $insert = $db->prepare($sql);
        $insert->bindValue(":email",       $usuario->getEmail());
        $insert->bindValue(":pass",        $pass);
        $insert->bindValue(":id_empleado", $usuario->getIdEmpleado());
        $insert->execute();
    }

    public function mostrarUsuarios() {
        $db = Db::conectar();
        $listaUsuarios = [];
        $sql = "SELECT * FROM usuarios";
        $select = $db->prepare($sql);
        $select->execute();
        $usuarios = $select->fetchAll();

        foreach($usuarios as $usuario) {
            $miUsuario = new Usuario();
            $miUsuario->setIdUsuario($usuario['id_usuario']);
            $miUsuario->setEmail($usuario['email']);
            $miUsuario->setPass($usuario['pass']);
            $miUsuario->setIdEmpleado($usuario['id_empleado']);
            $listaUsuarios[] = $miUsuario;
        }

        return $listaUsuarios;
    }

    public function obtenerUsuario($email, $pass) {
        $db = Db::conectar();
        $sql = "SELECT * FROM usuarios WHERE email = :email AND pass = :pass";
        $select = $db->prepare($sql);
        $select->bindValue(":email", $email);
        $select->bindValue(":pass",  $pass);
        $select->execute();
        $registro = $select->fetch();
        $usuario = new Usuario();

        if($pass == $registro['pass']) {
            $usuario->setIdUsuario($registro['id_usuario']);
            $usuario->setEmail($registro['email']);
            $usuario->setPass($registro['pass']);
            $usuario->setIdEmpleado($registro['id_empleado']);
        }

        return $usuario;
    }

    public function buscarUsuario($email) {
        $db = Db::conectar();
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $select = $db->prepare($sql);
        $select->bindValue(":email", $email);
        $select->execute();
        $registro = $select->fetch();

        if($registro['id_usuario'] != NULL)
            $emailUsado = false;
        else
            $emailUsado = true;

        return $emailUsado;
    }

    public function actualizarUsuario($usuario) {
        $db = Db::conectar();
        $pass = sha1($usuario->getPass());
        $sql = "UPDATE usuarios
                SET    email       = :email,
                       pass        = :pass,
                       id_empleado = :id_empleado
                WHERE  id_usuario  = :id_usuario";
        $update = $db->prepare($sql);
        $update->bindValue(":id_usuario",  $usuario->getIdUsuario());
        $update->bindValue(":email",       $usuario->getEmail());
        $update->bindValue(":pass",        $pass);
        $update->bindValue(":id_empleado", $usuario->getIdEmpleado());
        $update->execute();
    }

    public function eliminarUsuario($id_usuario) {
        $db = Db::conectar();
        $sql = "DELETE FROM usuarios WHERE id_usuario = :id_usuario";
        $delete = $db->prepare($sql);
        $delete->bindValue(":id_usuario", $id_usuario);
        $delete->execute();
    }
}