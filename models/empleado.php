<?php

class Empleado {
    private $id_empleado;
    private $nombre_empleado;
    private $apellido_paterno;
    private $apellido_materno;
    private $fecha_nacimiento;
    private $edad;
    private $sexo;
    private $calle;
    private $numero_exterior;
    private $numero_interior;
    private $colonia;
    private $codigo_postal;
    private $telefono;
    private $puesto;
    private $id_area;

    public function __construct(){}

    public function getIdEmpleado() { return $this->id_empleado; }

    public function getNombreEmpleado() { return $this->nombre_empleado; }

    public function getApellidoPaterno() { return $this->apellido_paterno; }

    public function getApellidoMaterno() { return $this->apellido_materno; }

    public function getFechaNacimiento() { return $this->fecha_nacimiento; }

    public function getEdad() { return $this->edad; }

    public function getSexo() { return $this->sexo; }

    public function getCalle() { return $this->calle; }

    public function getNumeroExterior() { return $this->numero_exterior; }

    public function getNumeroInterior() { return $this->numero_interior; }

    public function getColonia() { return $this->colonia; }

    public function getCodigoPostal() { return $this->codigo_postal; }

    public function getTelefono() { return $this->telefono; }

    public function getPuesto() { return $this->puesto; }

    public function getIdArea() { return $this->id_area; }

    public function setIdEmpleado($id_empleado) { $this->id_empleado = $id_empleado; }

    public function setNombreEmpleado($nombre_empleado) { $this->nombre_empleado = $nombre_empleado; }

    public function setApellidoPaterno($apellido_paterno) { $this->apellido_paterno = $apellido_paterno; }

    public function setApellidoMaterno($apellido_materno) { $this->apellido_materno = $apellido_materno; }

    public function setFechaNacimiento($fecha_nacimiento) { $this->fecha_nacimiento = $fecha_nacimiento; }

    public function setEdad($edad) { $this->edad = $edad; }

    public function setSexo($sexo) { $this->sexo = $sexo; }

    public function setCalle($calle) { $this->calle = $calle; }

    public function setNumeroExterior($numero_exterior) { $this->numero_exterior = $numero_exterior; }

    public function setNumeroInterior($numero_interior) { $this->numero_interior = $numero_interior; }

    public function setColonia($colonia) { $this->colonia = $colonia; }

    public function setCodigoPostal($codigo_postal) { $this->codigo_postal = $codigo_postal; }

    public function setTelefono($telefono) { $this->telefono = $telefono; }

    public function setPuesto($puesto) { $this->puesto = $puesto; }

    public function setIdArea($id_area) { $this->id_area = $id_area; }
}