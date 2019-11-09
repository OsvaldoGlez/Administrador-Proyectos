<?php

require_once '../includes/conexion.php';
require_once '../models/empleado.php';

class CrudEmpleado {
    public function __construct(){}

    public function insertarEmpleado($empleado) {
        $db = Db::conectar();
        $sql = "INSERT INTO empleados(nombre_empleado, apellido_paterno, apellido_materno, fecha_nacimiento,
                            edad, sexo, calle, numero_exterior, numero_interior, colonia, codigo_postal,
                            telefono, puesto, id_area)
                VALUES(:nombre_empleado, :apellido_paterno, :apellido_materno, :fecha_nacimiento,
                       :edad, :sexo, :calle, :numero_exterior, :numero_interior, :colonia, :codigo_postal,
                       :telefono, :puesto, :id_area)";
        $insert = $db->prepare($sql);
        $insert->bindValue(":nombre_empleado",  $empleado->getNombreEmpleado());
        $insert->bindValue(":apellido_paterno", $empleado->getApellidoPaterno());
        $insert->bindValue(":apellido_materno", $empleado->getApellidoMaterno());
        $insert->bindValue(":fecha_nacimiento", $empleado->getFechaNacimiento());
        $insert->bindValue(":edad",             $empleado->getEdad());
        $insert->bindValue(":sexo",             $empleado->getSexo());
        $insert->bindValue(":calle",            $empleado->getCalle());
        $insert->bindValue(":numero_exterior",  $empleado->getNumeroExterior());
        $insert->bindValue(":numero_interior",  $empleado->getNumeroInterior());
        $insert->bindValue(":colonia",          $empleado->getColonia());
        $insert->bindValue(":codigo_postal",    $empleado->getCodigoPostal());
        $insert->bindValue(":telefono",         $empleado->getTelefono());
        $insert->bindValue(":puesto",           $empleado->getPuesto());
        $insert->bindValue(":id_area",          $empleado->getIdArea());
        $insert->execute();
    }

    public function mostrarEmpleados() {
        $db = Db::conectar();
        $listaEmpleados = [];
        $sql = "SELECT * FROM empleados";
        $select = $db->prepare($sql);
        $select->execute();
        $empleados = $select->fetchAll();

        foreach($empleados as $empleado) {
            $miEmpleado = new Empleado();
            $miEmpleado->setIdEmpleado($empleado['id_empleado']);
            $miEmpleado->setNombreEmpleado($empleado['nombre_empleado']);
            $miEmpleado->setApellidoPaterno($empleado['apellido_paterno']);
            $miEmpleado->setApellidoMaterno($empleado['apellido_materno']);
            $miEmpleado->setFechaNacimiento($empleado['fecha_nacimiento']);
            $miEmpleado->setEdad($empleado['edad']);
            $miEmpleado->setSexo($empleado['sexo']);
            $miEmpleado->setCalle($empleado['calle']);
            $miEmpleado->setNumeroExterior($empleado['numero_exterior']);
            $miEmpleado->setNumeroInterior($empleado['numero_interior']);
            $miEmpleado->setCodigoPostal($empleado['colonia']);
            $miEmpleado->setCodigoPostal($empleado['codigo_postal']);
            $miEmpleado->setTelefono($empleado['telefono']);
            $miEmpleado->setPuesto($empleado['puesto']);
            $miEmpleado->setIdArea($empleado['id_area']);
            $listaEmpleados[] = $miEmpleado;
        }

        return $listaEmpleados;
    }

    public function obtenerEmpleado($id_empleado) {
        $db = Db::conectar();
        $sql = "SELECT * FROM empleados WHERE id_empleado = :id_empleado";
        $select = $db->prepare($sql);
        $select->bindValue(":id_empleado", $id_empleado);
        $select->execute();
        $empleado = $select->fetch();

        $miEmpleado = new Empleado();
        $miEmpleado->setIdEmpleado($empleado['id_empleado']);
        $miEmpleado->setNombreEmpleado($empleado['nombre_empleado']);
        $miEmpleado->setApellidoPaterno($empleado['apellido_paterno']);
        $miEmpleado->setApellidoMaterno($empleado['apellido_materno']);
        $miEmpleado->setFechaNacimiento($empleado['fecha_nacimiento']);
        $miEmpleado->setEdad($empleado['edad']);
        $miEmpleado->setSexo($empleado['sexo']);
        $miEmpleado->setCalle($empleado['calle']);
        $miEmpleado->setNumeroExterior($empleado['numero_exterior']);
        $miEmpleado->setNumeroInterior($empleado['numero_interior']);
        $miEmpleado->setCodigoPostal($empleado['colonia']);
        $miEmpleado->setCodigoPostal($empleado['codigo_postal']);
        $miEmpleado->setTelefono($empleado['telefono']);
        $miEmpleado->setPuesto($empleado['puesto']);
        $miEmpleado->setIdArea($empleado['id_area']);

        return $miEmpleado;
    }

    public function actualizarEmpleado($empleado) {
        $db = Db::conectar();
        $sql = "UPDATE empleados
                SET    nombre_empleado  = :nombre_empleado,
                       apellido_paterno = :apellido_paterno,
                       apellido_materno = :apellido_materno,
                       fecha_nacimiento = :fecha_nacimiento,
                       edad             = :edad,
                       sexo             = :sexo,
                       calle            = :calle,
                       numero_exterior  = :numero_exterior,
                       numero_interior  = :numero_interior,
                       colonia          = :colonia,
                       codigo_postal    = :codigo_postal,
                       telefono         = :telefono,
                       puesto           = :puesto,
                       id_area          = :id_area
                WHERE  id_empleado      = :id_empleado";
        $update = $db->prepare($sql);
        $update->bindValue(":id_empleado",      $empleado->getIdEmpleado());
        $update->bindValue(":nombre_empleado",  $empleado->getNombreEmpleado());
        $update->bindValue(":apellido_paterno", $empleado->getApellidoPaterno());
        $update->bindValue(":apellido_materno", $empleado->getApellidoMaterno());
        $update->bindValue(":fecha_nacimiento", $empleado->getFechaNacimiento());
        $update->bindValue(":edad",             $empleado->getEdad());
        $update->bindValue(":sexo",             $empleado->getSexo());
        $update->bindValue(":calle",            $empleado->getCalle());
        $update->bindValue(":numero_exterior",  $empleado->getNumeroExterior());
        $update->bindValue(":numero_interior",  $empleado->getNumeroInterior());
        $update->bindValue(":colonia",          $empleado->getColonia());
        $update->bindValue(":codigo_postal",    $empleado->getCodigoPostal());
        $update->bindValue(":telefono",         $empleado->getTelefono());
        $update->bindValue(":puesto",           $empleado->getPuesto());
        $update->bindValue(":id_area",          $empleado->getIdArea());
        $update->execute();
    }

    public function eliminarEmpleado($id_empleado) {
        $db = Db::conectar();
        $sql = "DELETE FROM empleados WHERE id_empleado = :id_empleado";
        $delete = $db->prepare($sql);
        $delete->bindValue(":id_empleado", $id_empleado);
        $delete->execute();
    }

    public function empleadoArea($id_area) {
        $db = Db::conectar();
        $sql = "SELECT id_empleado, nombre_empleado, apellido_paterno, apellido_materno
                FROM empleados
                WHERE id_area = :id_area";
        $select = $db->prepare($sql);
        $select->bindValue(":id_area", $id_area);
        $select->execute();

        $empleado = $select->fetchAll();
        
        if($empleado) {
            foreach($empleado as $emp) {
                echo '<option value="'.$emp['id_empleado'].'">'.$emp['nombre_empleado'].' '.$emp['apellido_paterno'].' '.$emp['apellido_materno'].'</option>';  
            }
        }
        else
            echo '<option>- Seleccione un empleado -</option>';
    }
}