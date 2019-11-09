<?php

require_once '../models/crudProyecto.php';

$crudProyecto = new CrudProyecto();
$proyecto     = new Proyecto();

if(isset($_POST['insertar'])) {
    $codigo_proyecto = $_POST['codigo_proyecto'];
    $nombre_proyecto = $_POST['nombre_proyecto'];
    $descripcion     = $_POST['descripcion'];
    $fecha_inicio    = $_POST['fecha_inicio'];
    $fecha_entrega   = $_POST['fecha_entrega'];
    $id_area         = $_POST['id_area'];

    $proyecto->setCodigoProyecto($codigo_proyecto);
    $proyecto->setNombreProyecto($nombre_proyecto);
    $proyecto->setDescripcion($descripcion);
    $proyecto->setFechaInicio($fecha_inicio);
    $proyecto->setFechaEntrega($fecha_entrega);
    $proyecto->setIdArea($id_area);

    $crudProyecto->insertarProyecto($proyecto);
    header("Location: ../views/proyectos.php");
}
elseif(isset($_POST['actualizar'])) {
    $id_proyecto     = $_POST['id_proyecto'];
    $codigo_proyecto = $_POST['codigo_proyecto'];
    $nombre_proyecto = $_POST['nombre_proyecto'];
    $descripcion     = $_POST['descripcion'];
    $fecha_inicio    = $_POST['fecha_inicio'];
    $fecha_entrega   = $_POST['fecha_entrega'];
    $id_area         = $_POST['id_area'];

    $proyecto->setIdProyecto($id_proyecto);
    $proyecto->setCodigoProyecto($codigo_proyecto);
    $proyecto->setNombreProyecto($nombre_proyecto);
    $proyecto->setDescripcion($descripcion);
    $proyecto->setFechaInicio($fecha_inicio);
    $proyecto->setFechaEntrega($fecha_entrega);
    $proyecto->setIdArea($id_area);

    $crudProyecto->actualizarProyecto($proyecto);
    header("Location: ../views/proyectos.php");
}
elseif(isset($_GET['accion']) == "e") {
    $id_proyecto = $_GET['id'];
    $crudProyecto->eliminarProyecto($id_proyecto);
    header("Location: ../views/proyectos.php");
}