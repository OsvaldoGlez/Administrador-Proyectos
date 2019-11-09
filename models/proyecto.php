<?php 

class Proyecto {
    private $id_proyecto;
    private $codigo_proyecto;
    private $nombre_proyecto;
    private $descripcion;
    private $fecha_inicio;
    private $fecha_entrega;
    private $id_area;
    private $nombre_area;

    public function __construct(){}

    public function getIdProyecto() { return $this->id_proyecto; }

    public function getCodigoProyecto() { return $this->codigo_proyecto; }

    public function getNombreProyecto() { return $this->nombre_proyecto; }

    public function getDescripcion() { return $this->descripcion; }

    public function getFechaInicio() { return $this->fecha_inicio; }

    public function getFechaEntrega() { return $this->fecha_entrega; }

    public function getIdArea() { return $this->id_area; }

    public function getNombreArea() { return $this->nombre_area; }

    public function setIdProyecto($id_proyecto) { $this->id_proyecto = $id_proyecto; }

    public function setCodigoProyecto($codigo_proyecto) { $this->codigo_proyecto = $codigo_proyecto; }

    public function setNombreProyecto($nombre_proyecto) { $this->nombre_proyecto = $nombre_proyecto; }

    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }

    public function setFechaInicio($fecha_inicio) { $this->fecha_inicio = $fecha_inicio; }

    public function setFechaEntrega($fecha_entrega) { $this->fecha_entrega = $fecha_entrega; }

    public function setIdArea($id_area) { $this->id_area = $id_area; }

    public function setNombreArea($nombre_area) { $this->nombre_area = $nombre_area; }
}