<?php

require_once '../includes/conexion.php';
require_once '../models/proyecto.php';

class CrudProyecto {
    public function __construct(){}

    public function insertarProyecto($proyecto) {
        $db = Db::conectar();
        $sql = "INSERT INTO proyectos(codigo_proyecto, nombre_proyecto, descripcion,
                                        fecha_inicio, fecha_entrega, id_area)
                VALUES(:codigo_proyecto, :nombre_proyecto, :descripcion,
                        :fecha_inicio, :fecha_entrega, :id_area)";
        $insert = $db->prepare($sql);
        $insert->bindValue(":codigo_proyecto", $proyecto->getCodigoProyecto());
        $insert->bindValue(":nombre_proyecto", $proyecto->getNombreProyecto());
        $insert->bindValue(":descripcion",     $proyecto->getDescripcion());
        $insert->bindValue(":fecha_inicio",    $proyecto->getFechaInicio());
        $insert->bindValue(":fecha_entrega",   $proyecto->getFechaEntrega());
        $insert->bindValue(":id_area",         $proyecto->getIdArea());
        $insert->execute();
    }

    public function mostrarProyectos() {
        $db = Db::conectar();
        $listaProyectos = [];
        $sql = "SELECT t1.*, t2.nombre_area
                FROM proyectos AS t1
                INNER JOIN areas AS t2 ON t1.id_area = t2.id_area";
        $select = $db->prepare($sql);
        $select->execute();
        $proyectos = $select->fetchAll();

        foreach($proyectos as $proyecto) {
            $miProyecto = new Proyecto();
            $miProyecto->setIdProyecto($proyecto['id_proyecto']);
            $miProyecto->setCodigoProyecto($proyecto['codigo_proyecto']);
            $miProyecto->setNombreProyecto($proyecto['nombre_proyecto']);
            $miProyecto->setDescripcion($proyecto['descripcion']);
            $miProyecto->setFechaInicio($proyecto['fecha_inicio']);
            $miProyecto->setFechaEntrega($proyecto['fecha_entrega']);
            $miProyecto->setIdArea($proyecto['id_area']);
            $miProyecto->setNombreArea($proyecto['nombre_area']);
            
            $listaProyectos[] = $miProyecto;
        }

        return $listaProyectos;
    }

    public function obtenerProyecto($id_proyecto) {
        $db = Db::conectar();
        $sql = "SELECT * FROM proyectos WHERE id_proyecto = :id_proyecto";
        $select = $db->prepare($sql);
        $select->bindValue(":id_proyecto", $id_proyecto);
        $select->execute();
        $proyecto = $select->fetch();

        $miProyecto = new Proyecto();
        $miProyecto->setIdProyecto($proyecto['id_proyecto']);
        $miProyecto->setCodigoProyecto($proyecto['codigo_proyecto']);
        $miProyecto->setNombreProyecto($proyecto['nombre_proyecto']);
        $miProyecto->setDescripcion($proyecto['descripcion']);
        $miProyecto->setFechaInicio($proyecto['fecha_inicio']);
        $miProyecto->setFechaEntrega($proyecto['fecha_entrega']);
        $miProyecto->setIdArea($proyecto['id_area']);

        return $miProyecto;
    }

    public function actualizarProyecto($proyecto) {
        $db = Db::conectar();
        $sql = "UPDATE proyectos
                SET    codigo_proyecto = :codigo_proyecto,
                       nombre_proyecto = :nombre_proyecto,
                       descripcion     = :descripcion,
                       fecha_inicio    = :fecha_inicio,
                       fecha_entrega   = :fecha_entrega,
                       id_area         = :id_area
                WHERE  id_proyecto     = :id_proyecto";
        $update = $db->prepare($sql);
        $update->bindValue(":id_proyecto",     $proyecto->getIdProyecto());
        $update->bindValue(":codigo_proyecto", $proyecto->getCodigoProyecto());
        $update->bindValue(":nombre_proyecto", $proyecto->getNombreProyecto());
        $update->bindValue(":descripcion",     $proyecto->getDescripcion());
        $update->bindValue(":fecha_inicio",    $proyecto->getFechaInicio());
        $update->bindValue(":fecha_entrega",   $proyecto->getFechaEntrega());
        $update->bindValue(":id_area",         $proyecto->getIdArea());
        $update->execute();
    }

    public function eliminarProyecto($id_proyecto) {
        $db = Db::conectar();
        $sql = "DELETE FROM proyectos WHERE id_proyecto = :id_proyecto";
        $delete = $db->prepare($sql);
        $delete->bindValue(":id_proyecto", $id_proyecto);
        $delete->execute();
    }

    public function estatusProyecto($id_proyecto) {
        $db = Db::conectar();
        $sql = "SELECT ROUND((SUM(IF(estatus = 1, 1, 0))) * 100 / COUNT(*)) AS 'Porcentaje'
                FROM tareas
                WHERE id_proyecto = :id_proyecto";
        $select = $db->prepare($sql);
        $select->bindValue(":id_proyecto", $id_proyecto);
        $select->execute();
        $porcentaje = $select->fetch();

        return $porcentaje;
    }
}