<?php

require_once '../models/crudTarea.php';

$crudTarea = new CrudTarea();
$tarea     = new Tarea();

if(isset($_POST['insertar'])) {

    $nombre_tarea = $_POST['nombre_tarea'];
    $descripcion  = $_POST['descripcion'];
    $estatus      = 0;
    $id_area      = $_POST['id_area'];
    $id_empleado  = $_POST['id_empleado'];
    $id_proyecto  = $_POST['id_proyecto'];

    $tarea->setNombreTarea($nombre_tarea);
    $tarea->setDescripcion($descripcion);
    $tarea->setEstatus($estatus);
    $tarea->setIdArea($id_area);
    $tarea->setIdEmpleado($id_empleado);
    $tarea->setIdProyecto($id_proyecto);

    $crudTarea->insertarTarea($tarea);
    header("Location: ../views/tareas.php?id=".$id_proyecto);
}
elseif(isset($_POST['actualizar'])) {
    $id_tarea     = $_POST['id_tarea'];
    $nombre_tarea = $_POST['nombre_tarea'];
    $descripcion  = $_POST['descripcion'];
    $id_area      = $_POST['id_area'];
    $id_empleado  = $_POST['id_empleado'];
    $id_proyecto  = $_POST['id_proyecto'];

    $tarea->setIdTarea($id_tarea);
    $tarea->setNombreTarea($nombre_tarea);
    $tarea->setDescripcion($descripcion);
    $tarea->setIdArea($id_area);
    $tarea->setIdEmpleado($id_empleado);
    $tarea->setIdProyecto($id_proyecto);

    $crudTarea->actualizarTarea($tarea);
    header("Location: ../views/tareas.php?id=".$id_proyecto);
}
elseif(isset($_GET['accion']) == "e") {
    $id_tarea    = $_GET['id'];
    $id_proyecto = $_GET['id_proyecto'];
    $crudTarea->eliminarTarea($id_tarea);
    header("Location: ../views/tareas.php?id=".$id_proyecto);
}
elseif(isset($_POST['id_proyecto']) && isset($_POST['id_tarea']) && isset($_POST['estatus'])) {
    $id_proyecto = $_POST['id_proyecto'];
    $id_tarea    = $_POST['id_tarea'];
    $estatus     = $_POST['estatus'];
    $crudTarea->actualizarEstatus($id_tarea, $estatus);
    header("Location: ../views/tareas.php?id=".$id_proyecto);
}