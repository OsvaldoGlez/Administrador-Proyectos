<?php

require_once '../includes/conexion.php';

class Area{
    private $id_area;
    private $nombre_area;

    public function __construct(){}

    public function getIdArea() { return $this->id_area; }

    public function getNombreArea() { return $this->nombre_area; }

    public function setIdArea($id_area) { $this->id_area = $id_area; }

    public function setNombreArea($nombre_area) { $this->nombre_area = $nombre_area; }
}