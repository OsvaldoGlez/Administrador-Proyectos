<?php
    require_once '../models/crudArea.php';
    require_once '../models/crudEmpleado.php';
    require_once '../models/crudTarea.php';

    $crudArea     = new CrudArea();
    $crudEmpleado = new CrudEmpleado();
    $crudTarea    = new CrudTarea();

    $listaAreas     = $crudArea->mostrarAreas();
    $listaEmpleados = $crudEmpleado->mostrarEmpleados();
?>
<!-- The Modal -->
<div class="modal fade" id="editarTarea_<?=$tarea->getIdTarea()?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">Editar Tarea</h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <br>  
            <!-- Modal body -->
            <div class="container">
                <?php 
                    $id_tarea = $tarea->getIdTarea();
                    $tarea = $crudTarea->obtenerTarea($id_tarea);
                ?>
                <form action="../controllers/tareaController.php" method="POST">
                    <div class="row">
                        <!-- Inicio Primera Columna Formulario -->
                        <div class="col-md-6">

                            <!-- Inicio Nombre Tarea -->
                            <div class="form-group row">
                                <label for="nombre_tarea" class="control-label col-sm-4 text-info"><strong>Nombre Tarea</strong>:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nombre_tarea" value="<?=$tarea->getNombreTarea()?>" required>
                                </div>
                            </div>
                            <!-- Fin Nombre Tarea -->

                            <!-- Inicio Descripcion -->
                            <div class="form-group row">
                                <label for="descripcion" class="control-label col-sm-4 text-info"><strong>Descripción</strong>:</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="descripcion" cols="20" rows="5"><?=$tarea->getDescripcion()?></textarea>
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
                                    <select class="form-control" name="id_area" required>
                                        <?php 
                                            foreach($listaAreas as $area):
                                                if($area->getIdArea() == $tarea->getIdArea()):
                                        ?>
                                                    <option value="<?=$area->getIdArea()?>" selected><?=$area->getNombreArea()?></option>
                                        <?php   else: ?>
                                                    <option value="<?=$area->getIdArea()?>"><?=$area->getNombreArea()?></option>
                                        <?php   endif;
                                            endforeach; 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Fin Area -->

                            <!-- Inicio Empleado -->
                            <div class="form-group row">
                                <label for="id_empleado" class="control-label col-sm-4 text-info"><strong>Empleado</strong>:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="id_empleado" required>
                                        <?php 
                                            foreach($listaEmpleados as $empleado):
                                                if($empleado->getIdEmpleado() == $tarea->getIdEmpleado()):
                                        ?>
                                                    <option value="<?=$empleado->getIdEmpleado()?>" selected><?=$empleado->getNombreEmpleado().' '.$empleado->getApellidoPaterno().' '.$empleado->getApellidoMaterno()?></option>
                                        <?php   else: ?>
                                                    <option value="<?=$empleado->getIdEmpleado()?>"><?=$empleado->getNombreEmpleado().' '.$empleado->getApellidoPaterno().' '.$empleado->getApellidoMaterno()?></option>
                                        <?php   endif;
                                            endforeach; 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Fin Empleado -->
                            
                        </div>
                        <!-- Fin Segunda Columna Formulario -->

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="hidden" name="actualizar" value="actualizar">
                        <input type="hidden" name="id_tarea" value="<?=$id_tarea?>">
                        <input type="hidden" name="id_proyecto" value="<?=$tarea->getIdProyecto()?>">
                        <input type="submit" class="btn btn-info" value="Actualizar">
                    </div>

                </form>
            </div>            
        
        </div>
    </div>
</div>