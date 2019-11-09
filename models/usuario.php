<?php 

class Usuario {
    private $id_usuario;
    private $email;
    private $pass;
    private $logueado;
    private $id_empleado;

    public function __construct(){}

    public function getIdUsuario() { return $this->id_usuario; }

    public function getEmail() { return $this->email; }

    public function getPass() { return $this->pass; }
    
    public function getLogueado() { return $this->logueado; }

    public function getIdEmpleado() { return $this->id_empleado; }

    public function setIdUsuario($id_usuario) { $this->id_usuario = $id_usuario; }

    public function setEmail($email) { $this->email = $email; }

    public function setPass($pass) { $this->pass = $pass; }

    public function setLogueado($logueado) { $this->logueado = $logueado; }

    public function setIdEmpleado($id_empleado) { $this->id_empleado = $id_empleado; }
}