<?php

require_once '../models/crudUsuario.php';

session_start();

$usuario     = new Usuario();
$crudUsuario = new CrudUsuario();

if(isset($_POST['insertar'])) {
    $email       = $_POST['email'];
    $pass        = $_POST['pass'];
    $id_empleado = $_POST['id_empleado'];

    $usuario->setEmail($email);
    $usuario->setPass($pass);
    $usuario->setIdEmpleado($id_empleado);

    if($crudUsuario->buscarUsuario($email)) {
        $crudUsuario->insertarUsuario($usuario);
        header("Location: ../index.php");
    }
    else {
        header("Location: ../includes/error.php?mensaje=El email ya existe...ingrese otro.");
    }    
}
elseif(isset($_POST['ingresar'])) {
    $email = $_POST['email'];
    $pass = sha1($_POST['pass']);

    $usuario = $crudUsuario->obtenerUsuario($email, $pass);

    if($usuario->getEmail() != NULL) {
        $_SESSION['usuario'] = $usuario;
        header("Location: ../views/proyectos.php");
    }
    else {
        header("Location: ../includes/error.php?mensaje=El email y contraseña de usuario son incorrectos.");
    }
}
elseif(isset($_POST['salir'])) {
    header("Location: ../index.php");
    unset($_SESSION['usuario']);
    session_destroy();
}