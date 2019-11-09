<?php

require_once '../includes/conexion.php';
require_once '../models/area.php';

class CrudArea {
    public function __construct() {}

    public function insertarArea($area) {
        $db = Db::conectar();
        $sql = "INSERT INTO areas(nombre_area)
                VALUES(:nombre_area)";
        $insert = $db->prepare($sql);
        $insert->bindValue(":nombre_tarea", $area->getNombreArea());
        $insert->execute();
    }

    public function mostrarAreas() {
        $db = Db::conectar();
        $listaAreas = [];
        $sql = "SELECT * FROM areas";
        $select = $db->prepare($sql);
        $select->execute();
        $areas = $select->fetchAll();

        foreach($areas as $area) {
            $miArea = new Area();
            $miArea->setIdArea($area['id_area']);
            $miArea->setNombreArea($area['nombre_area']);
            $listaAreas[] = $miArea;
        }

        return $listaAreas;
    }

    public function obtenerArea($id_area) {
        $db = Db::conectar();
        $sql = "SELECT *
                FROM areas
                WHERE id_area = :id_area";
        $select = $db->prepare($sql);
        $select->bindValue(":id_area", $id_area);
        $select->execute();
        $area = $select->fetch();

        $miArea = new Area();
        $miArea->setIdArea($area['id_area']);
        $miArea->setNombreArea($area['nombre_area']);

        return $miArea;
    }

    public function actualizarArea($area) {
        $db = Db::conectar();
        $sql = "UPDATE areas
                SET    nombre_area = :nombre_area
                WHERE  id_area     = :id_area";
        $update = $db->prepare($sql);
        $update->bindValue(":id_area",     $area->getIdArea());
        $update->bindValue(":nombre_area", $area->getNombreArea());
        $update->execute();
    }

    public function eliminarArea($id_area) {
        $db = Db::conectar();
        $sql = "DELETE FROM areas WHERE id_area = :id_area";
        $delete = $db->prepare($sql);
        $delete->bindValue(":id_area", $id_area);
        $delete->execute();
    }
}