;

$(document).ready(function(){
    //$("#btn-add-photo").change(function(){
    //    $("#url-add-photo").val($(this).val());
    //    $('#img-frame').attr('src',$(this).val());
    //});
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
});