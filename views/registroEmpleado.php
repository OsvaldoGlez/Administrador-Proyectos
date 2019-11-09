<?php 
    require_once '../includes/conexion.php';
    require_once '../includes/cabecera.php';
    require_once '../models/crudArea.php';

    $crudArea   = new CrudArea();
    $listaAreas = $crudArea->mostrarAreas();
?>
<div class="jumbotron jumbotron-fliud" id="jumbotron">
    <div class="container">
        <h1>Administrador de Proyectos</h1>
        <p>Herramienta para administrar y dar seguimiento a los proyectos y sus tareas.</p>
    </div>
</div>
<div class="container">
    <div id="empleado">
        <div class="container">
            <div id="empleado-row">
                <div id="empleado-column">
                    <div id="empleado-box">
                        <h2 class="text-info text-center">Registrar Empleado</h2>
                        <hr>
                        <form action="../controllers/empleadoController.php" method="POST">
                            <div class="row">
                                <!-- Inicio Primera Columna Formulario -->
                                <div class="col-md-4">

                                    <!-- Inicio Nombre -->
                                    <div class="form-group row">
                                        <label for="nombre_empleado" class="control-label col-sm-4 text-info"><strong>Nombre</strong>:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="nombre_empleado" required>
                                        </div>
                                    </div>
                                    <!-- Fin Nombre -->

                                    <!-- Inicio Apellido Paterno -->
                                    <div class="form-group row">
                                        <label for="apellido_paterno" class="control-label col-sm-4 text-info"><strong>Apellido Paterno</strong>:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="apellido_paterno" required>
                                        </div>
                                    </div>
                                    <!-- Fin Apellido Paterno -->

                                    <!-- Inicio Apellido Materno -->
                                    <div class="form-group row">
                                        <label for="apellido_materno" class="control-label col-sm-4 text-info"><strong>Apellido Materno</strong>:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="apellido_materno" required>
                                        </div>
                                    </div>
                                    <!-- Fin Apellido Materno -->

                                    <!-- Inicio Fecha Nacimiento -->
                                    <div class="form-group row">
                                        <label for="fecha_nacimiento" class="control-label col-sm-4 text-info"><strong>Fecha Nacimiento</strong>:</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control" name="fecha_nacimiento" required>
                                        </div>
                                    </div>
                                    <!-- Fin Fecha Nacimiento -->

                                    <!-- Inicio Edad -->
                                    <div class="form-group row">
                                        <label for="edad" class="control-label col-sm-4 text-info"><strong>Edad</strong>:</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" name="edad" required>
                                        </div>
                                    </div>
                                    <!-- Fin Edad -->

                                </div>
                                <!-- Fin Primera Columna Formulario -->
                                
                                <!-- Inicio Segunda Columna Formulario -->
                                <div class="col-md-4">

                                    <!-- Inicio Sexo -->
                                    <div class="form-group row">
                                        <label for="sexo" class="control-label col-sm-4 text-info"><strong>Sexo</strong>:</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="sexo" required>
                                                <option value="0">Seleccione sexo</option>
                                                <option value="f">Femenino</option>
                                                <option value="m">Masculino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Fin Sexo -->

                                    <!-- Inicio Calle -->
                                    <div class="form-group row">
                                        <label for="calle" class="control-label col-sm-4 text-info"><strong>Calle</strong>:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="calle" required>
                                        </div>
                                    </div>
                                    <!-- Fin Calle -->

                                    <!-- Inicio Numero Exterior -->
                                    <div class="form-group row">
                                        <label for="numero_exterior" class="control-label col-sm-4 text-info"><strong>Número Exterior</strong>:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="numero_exterior" required>
                                        </div>
                                    </div>
                                    <!-- Fin Numero Exterior -->

                                    <!-- Inicio Numero Interior -->
                                    <div class="form-group row">
                                        <label for="numero_interior" class="control-label col-sm-4 text-info"><strong>Número Interior</strong>:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="numero_interior">
                                        </div>
                                    </div>
                                    <!-- Fin Numero Interior -->

                                    <!-- Inicio Colonia -->
                                    <div class="form-group row">
                                        <label for="colonia" class="control-label col-sm-4 text-info"><strong>Colonia</strong>:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="colonia" required>
                                        </div>
                                    </div>
                                    <!-- Fin Colonia -->

                                </div>
                                <!-- Fin Segunda Columna Formulario -->

                                <!-- Inicio Tercera Columna Formulario -->
                                <div class="col-md-4">

                                    <!-- Inicio Código Postal -->
                                    <div class="form-group row">
                                        <label for="codigo_postal" class="control-label col-sm-4 text-info"><strong>Código Postal</strong>:</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" name="codigo_postal" required>
                                        </div>
                                    </div>
                                    <!-- Fin Código Postal -->

                                    <!-- Inicio Teléfono -->
                                    <div class="form-group row">
                                        <label for="telefono" class="control-label col-sm-4 text-info"><strong>Teléfono</strong>:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="telefono" required>
                                        </div>
                                    </div>
                                    <!-- Fin Teléfono -->

                                    <!-- Inicio Puesto -->
                                    <div class="form-group row">
                                        <label for="puesto" class="control-label col-sm-4 text-info"><strong>Puesto</strong>:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="puesto" required>
                                        </div>
                                    </div>
                                    <!-- Fin Puesto -->

                                    <!-- Inicio Area -->
                                    <div class="form-group row">
                                        <label for="id_area" class="control-label col-sm-4 text-info"><strong>Area</strong>:</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="id_area" required>
                                                <option value="0">Seleccione area</option>
                                                <?php 
                                                    foreach($listaAreas as $area):
                                                ?>
                                                        <option value="<?=$area->getIdArea()?>"><?=$area->getNombreArea()?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Fin Area -->

                                    <br>
                                    <!-- Botones Formulario -->
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="insertar" value="insertar">
                                            <input type="submit" class="btn btn-info" value="Guardar">
                                            <a href="../index.php" class="btn btn-info">Cancelar</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- Fin Tercera Columna Formulario -->            
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>