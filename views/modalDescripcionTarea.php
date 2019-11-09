<!-- The Modal -->
<div class="modal fade" id="descripcion_<?=$tarea->getIdTarea()?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title"><?=$tarea->getNombreTarea()?></h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
                
            <!-- Modal body -->
            <div class="modal-body">
                <p style="text-align: left;"><strong>Area:</strong> <?=$tarea->getNombreArea()?></p>
                <p style="text-align: left;"><strong>Realiza:</strong> <?=$tarea->getEmpleado()?> </p>
                <p style="text-align: left;"><strong>Proyecto:</strong> <?=$tarea->getNombreProyecto()?> </p>
                <p style="text-align: left;"><strong>Descripción:</strong> <?=$tarea->getDescripcion()?></p>
            </div>
        
        </div>
    </div>
</div>