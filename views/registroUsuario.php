<?php 
    require_once '../includes/conexion.php';
    require_once '../includes/cabecera.php';
    require_once '../models/crudArea.php';
    require_once '../models/crudEmpleado.php';

    $crudArea     = new CrudArea();
    $crudEmpleado = new CrudEmpleado();

    $listaAreas     = $crudArea->mostrarAreas();
    $listaEmpleados = $crudEmpleado->mostrarEmpleados();
?>
<div class="jumbotron jumbotron-fliud" id="jumbotron">
    <div class="container">
        <h1>Administrador de Proyectos</h1>
        <p>Herramienta para administrar y dar seguimiento a los proyectos y sus tareas.</p>
    </div>
</div>
<div id="user">
    <div class="container">
        <div id="user-row" class="row justify-content-center align-items-center">
            <div id="user-column" class="col-md-6">
                <div id="user-box" class="col-md-12">
                    <h2 class="text-info text-center">Registrar Usuario</h2>
                    <hr>
                    <form action="../controllers/usuarioController.php" method="POST">
                        <div class="row">
                            <!-- Inicio Columna Formulario -->
                            <div class="col-md-12">

                                <!-- Inicio Area -->
                                <div class="form-group row">
                                    <label for="id_area" class="control-label col-sm-4 text-info"><strong>Area</strong>:</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="id_area" id="id_area" required>
                                            <option value="0">- Seleccione un area -</option>
                                            <?php 
                                                foreach($listaAreas as $area):
                                            ?>
                                                    <option value="<?=$area->getIdArea()?>"><?=$area->getNombreArea()?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Fin Area -->

                                <!-- Inicio Empleado -->
                                <div class="form-group row">
                                    <label for="id_empleado" class="control-label col-sm-4 text-info"><strong>Empleado</strong>:</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="id_empleado" id="id_empleado" required>
                                            <option value="0">- Seleccione un empleado -</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <!-- Fin Empleado -->

                                <!-- Inicio Codigo Usuario -->
                                <div class="form-group row">
                                    <label for="email" class="control-label col-sm-4 text-info"><strong>Email</strong>:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <!-- Fin Codigo Usuario -->

                                <!-- Inicio Password -->
                                <div class="form-group row">
                                    <label for="pass" class="control-label col-sm-4 text-info"><strong>Password</strong>:</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="pass" required>
                                    </div>
                                </div>
                                <!-- Fin Password -->

                            </div>
                            <!-- Fin Columna Formulario -->

                        </div>
                        <!-- Botones Formulario -->
                        <div class="form-group row text-center">                
                            <div class="col-md-12">
                                <input type="hidden" name="insertar" value="insertar">
                                <input type="submit" class="btn btn-info" value="Guardar">
                                <a href="../index.php" class="btn btn-info" id="cancelar">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>