;

$(document).ready(function(){
    $.validate({
        form : '#clientes',
        scrollToTopOnError: true,
        validateOnBlur: true,
        errorMessagePosition: 'top'
    });
    // Eliminamos la validacion para el boton BUSCAR.
    // Eliminamos todos los atributos de validacion cuando pulsamos buscar.
    $('#btn-buscar').click(function() {
        //var $form = $(this).closest('form');
        var $form=$('#clientes');
        $form.find('*[data-validation]').attr('data-validation', null);
        $form.get(0).submit();
    });
    //Recuperamos provincia por AJAx y la mostramos.
    $('#cpostal_cliente').change(function(){
        var cpostal=$('#cpostal_cliente').val();
        $.ajax({
			url:"./ajax/localidades.php",
			type: "post",
			async: true,
			data: {cpostal:cpostal},
			success: function(ajax_data){
                $('#provincia_cliente').val(ajax_data);
            }
		});
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
});