<?php

require_once '../includes/conexion.php';
require_once '../includes/cabecera.php';
require_once '../models/tarea.php';

class CrudTarea {
    public function __construct(){}

    public function insertarTarea($tarea) {
        $db = Db::conectar();
        $sql = "INSERT INTO tareas(nombre_tarea, descripcion, estatus,
                                   id_area, id_proyecto, id_empleado)
                VALUES(:nombre_tarea, :descripcion, :estatus,
                       :id_area, :id_proyecto, :id_empleado)";
        $insert = $db->prepare($sql);
        $insert->bindValue(":nombre_tarea", $tarea->getNombreTarea());
        $insert->bindValue(":descripcion",  $tarea->getDescripcion());
        $insert->bindValue(":estatus",      $tarea->getEstatus());
        $insert->bindValue(":id_area",      $tarea->getIdArea());
        $insert->bindValue(":id_proyecto",  $tarea->getIdProyecto());
        $insert->bindValue(":id_empleado",  $tarea->getIdEmpleado());
        $insert->execute();
    }

    public function mostrarTareas($id_proyecto) {
        $db = Db::conectar();
        $listaTareas = [];
        $sql = "SELECT t1.*, t2.nombre_area, t3.nombre_proyecto, CONCAT(t4.nombre_empleado, ' ', t4.apellido_paterno, ' ', t4.apellido_materno) AS Empleado
                FROM tareas AS t1
                INNER JOIN areas     AS t2 ON t1.id_area     = t2.id_area
                INNER JOIN proyectos AS t3 ON t1.id_proyecto = t3.id_proyecto
                INNER JOIN empleados AS t4 ON t1.id_empleado = t4.id_empleado
                WHERE t1.id_proyecto = :id_proyecto";
        $select = $db->prepare($sql);
        $select->bindValue(":id_proyecto", $id_proyecto);
        $select->execute();
        $tareas = $select->fetchAll();

        foreach($tareas as $tarea) {
            $miTarea = new Tarea();
            $miTarea->setIdTarea($tarea['id_tarea']);
            $miTarea->setNombreTarea($tarea['nombre_tarea']);
            $miTarea->setDescripcion($tarea['descripcion']);
            $miTarea->setEstatus($tarea['estatus']);
            $miTarea->setIdArea($tarea['id_area']);
            $miTarea->setIdProyecto($tarea['id_proyecto']);
            $miTarea->setIdEmpleado($tarea['id_empleado']);
            $miTarea->setNombreArea($tarea['nombre_area']);
            $miTarea->setNombreProyecto($tarea['nombre_proyecto']);
            $miTarea->setEmpleado($tarea['Empleado']);
            $listaTareas[] = $miTarea;
        }

        return $listaTareas;
    }

    public function obtenerTarea($id_tarea) {
        $db = Db::conectar();
        $sql = "SELECT * FROM tareas WHERE id_tarea = :id_tarea";
        $select = $db->prepare($sql);
        $select->bindValue(":id_tarea", $id_tarea);
        $select->execute();
        $tarea = $select->fetch();

        $miTarea = new Tarea();
        $miTarea->setIdTarea($tarea['id_tarea']);
        $miTarea->setNombreTarea($tarea['nombre_tarea']);
        $miTarea->setDescripcion($tarea['descripcion']);
        $miTarea->setEstatus($tarea['estatus']);
        $miTarea->setIdArea($tarea['id_area']);
        $miTarea->setIdProyecto($tarea['id_proyecto']);
        $miTarea->setIdEmpleado($tarea['id_empleado']);

        return $miTarea;
    }

    public function actualizarTarea($tarea) {
        $db = Db::conectar();
        $sql = "UPDATE tareas
                SET    nombre_tarea = :nombre_tarea,
                       descripcion  = :descripcion,
                       id_area      = :id_area,
                       id_proyecto  = :id_proyecto,
                       id_empleado  = :id_empleado
                WHERE  id_tarea     = :id_tarea";
        $update = $db->prepare($sql);
        $update->bindValue(":id_tarea",     $tarea->getIdTarea());
        $update->bindValue(":nombre_tarea", $tarea->getNombreTarea());
        $update->bindValue(":descripcion",  $tarea->getDescripcion());
        $update->bindValue(":id_area",      $tarea->getIdArea());
        $update->bindValue(":id_proyecto",  $tarea->getIdProyecto());
        $update->bindValue(":id_empleado",  $tarea->getIdEmpleado());
        $update->execute();
    }

    public function eliminarTarea($id_tarea) {
        $db = Db::conectar();
        $sql = "DELETE FROM tareas WHERE id_tarea = :id_tarea";
        $delete = $db->prepare($sql);
        $delete->bindValue(":id_tarea", $id_tarea);
        $delete->execute();
    }

    public function actualizarEstatus($id_tarea, $estatus) {
        $db = Db::conectar();
        $sql = "UPDATE tareas SET estatus = :estatus WHERE id_tarea = :id_tarea";
        $update = $db->prepare($sql);
        $update->bindValue(":id_tarea", $id_tarea);
        $update->bindValue(":estatus", $estatus);
        $update->execute();
    }
}