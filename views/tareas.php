<?php 
    require_once '../includes/conexion.php';
    require_once '../includes/cabecera.php';
    require_once '../models/crudTarea.php';

    $crudTarea = new CrudTarea();

    if(isset($_GET)) :
        $id_proyecto = $_GET['id'];
        $listaTareas = $crudTarea->mostrarTareas($id_proyecto);
    endif;
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <h1 class="navbar-brand">Administrador de Proyectos</h1>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="proyectos.php" class="btn btn-danger">Volver a Proyectos</a>
        </li>
        <li class="nav-item">
            <form action="../controllers/usuarioController.php" method="POST">
                <input type="hidden" name="salir" value="salir">
                <input type="submit" class="btn btn-info" value="Salir">
            </form>
        </li>
    </ul>
</nav>
<div class="container" style="margin-top:80px">
    <div id="form">
        <div class="container">
            <div id="form-row">
                <div id="form-column">
                    <div id="form-box">
                        <h2 class="text-info text-center">Tareas</h2>
                        <hr>
                        <a href="#registroTareas_<?=$id_proyecto?>" class="btn btn-info" data-toggle="modal">Agregar Tarea</a>
                        <?php include('../views/modalRegistroTarea.php'); ?>
                        <br><br>
                        <table class="table table-striped table-bordered table-hover table-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Estatus</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!$listaTareas) : ?>
                                <tr>
                                    <td colspan="8"><?php echo "No hay tareas... agregue una nueva."; ?></td>
                                </tr>
                            <?php 
                                else:
                                    foreach($listaTareas as $tarea):
                            ?>
                                    <tr>
                                        <td><?=$tarea->getNombreTarea()?></td>
                                        <td>
                                            <a href="#descripcion_<?=$tarea->getIdTarea()?>" class="btn btn-info btn-sm" data-toggle="modal">Ver</a>
                                            <?php include('../views/modalDescripcionTarea.php'); ?>
                                        </td>
                                        <td>
                                            <?php if($tarea->getEstatus() == 1) : ?>
                                                <label class="switch">
                                                    <input type="hidden" id="id_proyecto" value="<?=$tarea->getIdProyecto()?>">
                                                    <input type="checkbox" id="estatus" value="<?=$tarea->getIdTarea()?>" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            <?php else: ?>
                                                <label class="switch">
                                                    <input type="hidden" id="id_proyecto" value="<?=$tarea->getIdProyecto()?>">
                                                    <input type="checkbox" id="estatus" value="<?=$tarea->getIdTarea()?>">
                                                    <span class="slider round"></span>
                                                </label>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="#editarTarea_<?=$tarea->getIdTarea()?>" class="btn btn-warning btn-sm" data-toggle="modal">Editar</a>
                                            <?php include('../views/modalEditarTarea.php'); ?>
                                        </td>
                                        <td>
                                            <a href="../controllers/tareaController.php?id=<?=$tarea->getIdTarea()?>&id_proyecto=<?=$tarea->getIdProyecto()?>&accion=e" class="btn btn-danger btn-sm">Borrar</a>
                                        </td>
                                    </tr>
                            <?php
                                    endforeach;
                                endif;            
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>