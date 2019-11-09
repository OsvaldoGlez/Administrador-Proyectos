<?php 
    require_once '../includes/conexion.php';
    require_once '../includes/cabecera.php';
    require_once '../models/crudProyecto.php';

    session_start();
    if(!isset($_SESSION['usuario']))
        header("Location: ../index.php");

    $crudProyecto = new CrudProyecto();
    $listaProyectos = $crudProyecto->mostrarProyectos();
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <h1 class="navbar-brand">Administrador de Proyectos</h1>
    <ul class="navbar-nav">
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
                        <h2 class="text-info text-center">Proyectos</h2>
                        <hr>
                        <a href="#registroProyecto" class="btn btn-info" data-toggle="modal">Agregar Proyecto</a><br><br>
                        <?php include('../views/modalRegistroProyecto.php');?>
                        <table class="table table-striped table-bordered table-hover table-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Completado</th>
                                    <th>Descripción</th>
                                    <th colspan="3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                if(!$listaProyectos) :
                            ?>
                                    <tr>
                                        <td colspan="9"><?php echo "No hay proyectos... agregue uno nuevo."; ?></td>
                                    </tr>
                            <?php 
                                else:
                                    foreach($listaProyectos as $proyecto):
                            ?>
                                    <tr>
                                        <td><?=$proyecto->getCodigoProyecto()?></td>
                                        <td><?=$proyecto->getNombreProyecto()?></td>
                                        <?php 
                                            $porcentaje = $crudProyecto->estatusProyecto($proyecto->getIdProyecto());
                                            $porcentaje = intval($porcentaje[0]);
                                            if($porcentaje == 0):
                                        ?>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-default" style="width: 0%; color: black;">0%</div>
                                                    </div>    
                                                </td>
                                        <?php elseif($porcentaje > 0 && $porcentaje <= 25): ?>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" style="width: 25%; color: white;"><?=$porcentaje?>%</div>
                                                    </div>    
                                                </td>
                                        <?php elseif($porcentaje > 25 && $porcentaje <= 50): ?>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" style="width: 50%; color: black;"><?=$porcentaje?>%</div>
                                                    </div>    
                                                </td>
                                        <?php elseif($porcentaje > 50 && $porcentaje <= 75): ?>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info" style="width: 75%; color: white;"><?=$porcentaje?>%</div>
                                                    </div>    
                                                </td>
                                        <?php elseif($porcentaje > 75 && $porcentaje <= 100): ?>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" style="width: 100%; color: white;"><?=$porcentaje?>%</div>
                                                    </div>    
                                                </td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="#descripcion_<?=$proyecto->getIdProyecto()?>" class="btn btn-info btn-sm" data-toggle="modal">Ver</a>
                                            <?php include('../views/modalDescripcionProyecto.php'); ?>
                                        </td>
                                        <td>
                                            <a href="tareas.php?id=<?=$proyecto->getIdProyecto()?>" class="btn btn-secondary btn-sm">Tareas</a>
                                        </td>
                                        <td>
                                            <a href="#editarProyecto_<?=$proyecto->getIdProyecto()?>" class="btn btn-warning btn-sm" data-toggle="modal">Editar</a>
                                            <?php include('../views/modalEditarProyecto.php'); ?>
                                        </td>
                                        <td>
                                            <a href="../controllers/proyectoController.php?id=<?=$proyecto->getIdProyecto()?>&accion=e" class="btn btn-danger btn-sm">Borrar</a>
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