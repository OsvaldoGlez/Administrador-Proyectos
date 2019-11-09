<?php
    require_once '../models/crudArea.php';
    require_once '../models/crudEmpleado.php';

    $crudArea       = new CrudArea();
    $crudEmpleado   = new CrudEmpleado();
    $listaAreas     = $crudArea->mostrarAreas();
    $listaEmpleados = $crudEmpleado->mostrarEmpleados();
?>
<!-- The Modal -->
<div class="modal fade" id="registroTareas_<?=$id_proyecto?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">Registrar Tarea</h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <br>  
            <!-- Modal body -->
            <div class="container">
                <form action="../controllers/tareaController.php" method="POST">
                    <div class="row">
                        <!-- Inicio Primera Columna Formulario -->
                        <div class="col-md-6">

                            <!-- Inicio Nombre Proyecto -->
                            <div class="form-group row">
                                <label for="nombre_tarea" class="control-label col-sm-4 text-info"><strong>Nombre Tarea</strong>:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nombre_tarea" required>
                                </div>
                            </div>
                            <!-- Fin Nombre Proyecto -->

                            <!-- Inicio Descripcion -->
                            <div class="form-group row">
                                <label for="descripcion" class="control-label col-sm-4 text-info"><strong>Descripción</strong>:</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="descripcion" cols="20" rows="5"></textarea>
                                </div>
                            </div>
                            <!-- Fin Repetir Descripcion -->

                        </div>
                        <!-- Fin Primera Columna Formulario -->
                        <!-- Inicio Segunda Columna Formulario -->
                        <div class="col-md-6">

                            <!-- Inicio Area -->
                        <div class="form-group row">
                            <label for="id_area" class="control-label col-sm-4 text-info"><strong>Area</strong>:</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="id_area" id="areaModalRegistroTarea" required>
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
                            <label for="id_area" class="control-label col-sm-4 text-info"><strong>Empleado</strong>:</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="id_empleado" id="empleadoModalRegistroTarea" required>
                                    <option value="0">- Seleccione un empleado -</option>
                                   
                                 </select>
                            </div>
                        </div>
                        <!-- Fin Empleado -->

                        </div>
                        <!-- Fin Segunda Columna Formulario -->

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="hidden" name="insertar" value="insertar">
                        <input type="hidden" name="id_proyecto" value="<?=$id_proyecto?>">
                        <input type="submit" class="btn btn-info" value="Guardar">
                    </div>

                </form>
            </div>            
        
        </div>
    </div>
</div>

