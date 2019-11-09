<?php
    require_once '../models/crudProyecto.php';
    require_once '../models/crudArea.php';

    $crudProyecto = new CrudProyecto();
    $crudArea     = new CrudArea();
    $listaAreas = $crudArea->mostrarAreas();
?>
<!-- The Modal -->
<div class="modal fade" id="editarProyecto_<?=$proyecto->getIdProyecto()?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">Editar Proyecto</h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <br>  
            <!-- Modal body -->
            <div class="container">
                <?php 
                    $id_proyecto = $proyecto->getIdProyecto();
                    $proyecto = $crudProyecto->obtenerProyecto($id_proyecto);
                ?>
                <form action="../controllers/proyectoController.php" method="POST">
                    <div class="row">
                        <!-- Inicio Primera Columna Formulario -->
                        <div class="col-md-6">

                            <!-- Inicio Codigo Proyecto -->
                            <div class="form-group row">
                                <label for="codigo_proyecto" class="control-label col-sm-4 text-info"><strong>Código</strong>:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="codigo_proyecto" value="<?=$proyecto->getCodigoProyecto()?>" required>
                                </div>
                            </div>
                            <!-- Fin Codigo Proyecto -->

                            <!-- Inicio Nombre Proyecto -->
                            <div class="form-group row">
                                <label for="nombre_proyecto" class="control-label col-sm-4 text-info"><strong>Nombre Proyecto</strong>:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nombre_proyecto" value="<?=$proyecto->getNombreProyecto()?>" required>
                                </div>
                            </div>
                            <!-- Fin Nombre Proyecto -->

                            <!-- Inicio Descripcion -->
                            <div class="form-group row">
                                <label for="descripcion" class="control-label col-sm-4 text-info"><strong>Descripción</strong>:</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="descripcion" cols="20" rows="5"><?=$proyecto->getDescripcion()?></textarea>
                                </div>
                            </div>
                            <!-- Fin Repetir Descripcion -->

                        </div>
                        <!-- Fin Primera Columna Formulario -->

                        <!-- Inicio Segunda Columna Formulario -->
                        <div class="col-md-6">

                            <!-- Inicio Fecha Inicio -->
                            <div class="form-group row">
                                <label for="fecha_inicio" class="control-label col-sm-4 text-info"><strong>Fecha Inicio</strong>:</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="fecha_inicio" value="<?=$proyecto->getFechaInicio()?>">
                                </div>
                            </div>
                            <!-- Fin Fecha Inicio -->

                            <!-- Inicio Fecha Entrega -->
                            <div class="form-group row">
                                <label for="fecha_entrega" class="control-label col-sm-4 text-info"><strong>Fecha Entrega</strong>:</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="fecha_entrega" value="<?=$proyecto->getFechaEntrega()?>">
                                </div>
                            </div>
                            <!-- Fin Fecha Entrega -->

                            <!-- Inicio Area -->
                            <div class="form-group row">
                                <label for="id_area" class="control-label col-sm-4 text-info"><strong>Area</strong>:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="id_area" id="id_area" required>
                                        <?php 
                                            foreach($listaAreas as $area):
                                                if($area->getIdArea() == $proyecto->getIdArea()):
                                        ?>
                                            <option value="<?=$area->getIdArea()?>" selected><?=$area->getNombreArea()?></option>
                                        <?php 
                                                else:
                                        ?>
                                            <option value="<?=$area->getIdArea()?>"><?=$area->getNombreArea()?></option>
                                        <?php
                                                endif;
                                            endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Fin Area -->

                        </div>
                        <!-- Fin Segunda Columna Formulario -->

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="hidden" name="actualizar" value="actualizar">
                        <input type="hidden" name="id_proyecto" value="<?=$proyecto->getIdProyecto()?>">
                        <input type="submit" class="btn btn-info" value="Actualizar">
                    </div>

                </form>
            </div>            
        
        </div>
    </div>
</div>