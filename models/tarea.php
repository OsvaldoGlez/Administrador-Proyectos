<?php 

class Tarea {
    private $id_tarea;
    private $nombre_tarea;
    private $descripcion;
    private $estatus;
    private $id_area;
    private $id_proyecto;
    private $id_empleado;
    private $nombre_area;
    private $nombre_proyecto;
    private $empleado;

    public function __construct(){}

    public function getIdTarea() { return $this->id_tarea; }

    public function getNombreTarea() { return $this->nombre_tarea; }

    public function getDescripcion() { return $this->descripcion; }

    public function getEstatus() { return $this->estatus; }

    public function getIdArea() { return $this->id_area; }

    public function getIdProyecto() { return $this->id_proyecto; }

    public function getIdEmpleado() { return $this->id_empleado; }

    public function getEmpleado() { return $this->empleado; }

    public function getNombreArea() { return $this->nombre_area; }

    public function getNombreProyecto() { return $this->nombre_proyecto; }

    public function setIdTarea($id_tarea) { $this->id_tarea = $id_tarea; }

    public function setNombreTarea($nombre_tarea) { $this->nombre_tarea = $nombre_tarea; }

    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }

    public function setEstatus($estatus) { $this->estatus = $estatus; }

    public function setIdArea($id_area) { $this->id_area = $id_area; }

    public function setIdProyecto($id_proyecto) { $this->id_proyecto = $id_proyecto; }

    public function setIdEmpleado($id_empleado) { $this->id_empleado = $id_empleado; }

    public function setEmpleado($empleado) { $this->empleado = $empleado; }

    public function setNombreArea($nombre_area) { $this->nombre_area = $nombre_area; }

    public function setNombreProyecto($nombre_proyecto) { $this->nombre_proyecto = $nombre_proyecto; }
}