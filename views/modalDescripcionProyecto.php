<!-- The Modal -->
<div class="modal fade" id="descripcion_<?=$proyecto->getIdProyecto()?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title"><?=$proyecto->getNombreProyecto()?></h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
                
            <!-- Modal body -->
            <div class="modal-body">
                <p style="text-align: left;"><strong>Area:</strong> <?=$proyecto->getNombreArea()?></p>
                <p style="text-align: left;"><strong>Fecha Inicio:</strong> <?=$proyecto->getFechaInicio()?></p>
                <p style="text-align: left;"><strong>Fecha Entrega:</strong> <?=$proyecto->getFechaEntrega()?></p>
                <p style="text-align: left;"><strong>Descripción:</strong> <?=$proyecto->getDescripcion()?></p>
            </div>
        
        </div>
    </div>
</div>