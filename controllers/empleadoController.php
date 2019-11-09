<?php

require_once '../models/crudEmpleado.php';

$crudEmpleado = new CrudEmpleado();
$empleado     = new Empleado();

if(isset($_POST['insertar'])) {
    $nombre_empleado  = $_POST['nombre_empleado'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $edad             = $_POST['edad'];
    $sexo             = $_POST['sexo'];
    $calle            = $_POST['calle'];
    $numero_exterior  = $_POST['numero_exterior'];
    $numero_interior  = $_POST['numero_interior'];
    $colonia          = $_POST['colonia'];
    $codigo_postal    = $_POST['codigo_postal'];
    $telefono         = $_POST['telefono'];
    $puesto           = $_POST['puesto'];
    $id_area          = $_POST['id_area'];

    $empleado->setNombreEmpleado($nombre_empleado);
    $empleado->setApellidoPaterno($apellido_paterno);
    $empleado->setApellidoMaterno($apellido_materno);
    $empleado->setFechaNacimiento($fecha_nacimiento);
    $empleado->setEdad($edad);
    $empleado->setSexo($sexo);
    $empleado->setCalle($calle);
    $empleado->setNumeroExterior($numero_exterior);
    $empleado->setNumeroInterior($numero_interior);
    $empleado->setColonia($colonia);
    $empleado->setCodigoPostal($codigo_postal);
    $empleado->setTelefono($telefono);
    $empleado->setPuesto($puesto);
    $empleado->setIdArea($id_area);

    $crudEmpleado->insertarEmpleado($empleado);
    header("Location: ../index.php");
}
elseif(isset($_POST['id_area'])) {
    $id_area = $_POST['id_area'];
    $crudEmpleado->empleadoArea($id_area);
}