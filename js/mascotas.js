;

$(document).ready(function(){
    //Recuperamos los datos del cliente asociado a una mascota.
    $('#id_cliente').change(function(){
        var datos=$('#id_cliente').val();
        $.ajax({
			url:"./ajax/cliente_mascota.php",
			type: "post",
			async: true,
			data: {id_cliente:datos},
            beforeSend: function(){
                $('#ajax-loader-cliente').css("visibility","visible");  
            },
			success: function(ajax_data){
                if (ajax_data==0){
                    //alert("No devuelve cliente");
                    $('#nombre_cliente').val("");
                    $('#apellidos_cliente').val("");
                    $('#nif_cliente').val("");
                    $('#tfno1_cliente').val("");
                    $('#tfno2_cliente').val("");
                    $('#email_cliente').val("");
                    $('#localidad_cliente').val("");
                    $('#link-cliente').attr("href","#");
                    $('#ajax-loader-cliente').css("visibility","hidden");                    
                } else {
                    var cliente=JSON.parse(ajax_data);
                    //console.log(cliente);
                    $('#nombre_cliente').val(cliente.nombre_cliente);
                    $('#apellidos_cliente').val(cliente.apellidos_cliente);
                    $('#nif_cliente').val(cliente.nif_cliente);
                    $('#tfno1_cliente').val(cliente.tfno1_cliente);
                    $('#tfno2_cliente').val(cliente.tfno2_cliente);
                    $('#email_cliente').val(cliente.email_cliente);
                    $('#localidad_cliente').val(cliente.cpostal_cliente);
                    $('#link-cliente').attr("href","./clientes.php?visualizar=true&id_cliente="+cliente.id_cliente);
                    $('#ajax-loader-cliente').css("visibility","hidden");
                }
                //$('.form-mascotas').append(ajax_data);
            }
		});
    });
    $.validate({
        form : '#mascotas',
        scrollToTopOnError: true,
        validateOnBlur: true,
        errorMessagePosition: 'top',
        modules : 'file'
    });
    // Eliminamos la validacion para el boton BUSCAR. Eliminamos todos los atributos de validacion cuando pulsamos buscar.
    $('#btn-buscar').click(function() {
        //var $form = $(this).closest('form');
        var $form=$('#mascotas');
        $form.find('*[data-validation]').attr('data-validation', null);
        $form.get(0).submit();
    });
    // Preparamos formato del calendario.
    jQuery(function ($) {
        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '',
            nextText: '',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);
    });
    $('.calendario').datepicker();
    $('#id_cliente').change(function(e){
        var cliente=$(this).val();
        
        //Ajax para recuperar datos cliente.
    });
    $('#btn-add-photo').change(function(e){
        //Vista previa de la imagen a subir.
        var formData=new FormData($('#mascotas')[0]);
        var url = "./ajax/vista_previa_imagen.php";
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $('#img-frame').attr("src","./images/ajaxdog.gif");  
            },
            success: function(data){
                if (data=='0'){
                    alert("Solo se permiten archivos .JPG o .PNG !!");
                    $('#img-link').attr("href","./images/mascotas/no_photo.jpg");
                    $('#img-frame').attr("src","./images/mascotas/no_photo.jpg");
                } else if (data=='1'){
                    alert("El tamaño maximo de la imagen es 1024Kbytes. !!");
                    $('#img-link').attr("href","./images/mascotas/no_photo.jpg");
                    $('#img-frame').attr("src","./images/mascotas/no_photo.jpg");
                } else {
                    //Añadimos ruta rebida a los atributos de ruta de la imagen y del enlace al lightbox.
                    //$('body').append(data);
                    $('#img-link').attr("href",data);
                    $('#img-frame').attr("src",data);
                }
            }
        });
    });
});
