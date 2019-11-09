$(document).ready(function() {

    /* TAREAS: Recoge el ID del proyecto, el ID y el Estatus de la Tarea
      y las envía al controlador de las tareas */ 
    $(document).on('click', '#estatus', function() {
        var estatus     = $(this).prop('checked');
        var id_tarea    = $(this).val();
        var id_proyecto = $(this).val();

        if(estatus == true)
            estatus = 1;
        else
            estatus = 0;

        $.ajax({
            url: '../../../../mis_proyectos/admin_proyectos_poo/controllers/tareaController.php',
            data: {'id_tarea': id_tarea, 'id_proyecto': id_proyecto, 'estatus': estatus},
            type: 'POST',
            cache: false
        });
    });

    /* REGISTRO USUARIO: La lista de empleados cambia de acuerdo al area seleccionada */
    $(document).on('change', '#id_area', function(){
        var id_area = $(this).val();
        $.ajax({
            url: '../../../../mis_proyectos/admin_proyectos_poo/controllers/empleadoController.php',
            data: {'id_area': id_area},
            type: 'POST',
            cache: false
        }).done(function(data){
            $('#id_empleado').html(data);
        });
    });

    /* REGISTRO TAREA: La lista de empleados cambia de acuerdo al area seleccionaa */
    $(document).on('change', '#areaModalRegistroTarea', function(){
        var id_area = $(this).val();
        $.ajax({
            url: '../../../../mis_proyectos/admin_proyectos_poo/controllers/empleadoController.php',
            data: {'id_area': id_area},
            type: 'POST',
            cache: false
        }).done(function(data){
            $('#empleadoModalRegistroTarea').html(data);
        });
    });

});