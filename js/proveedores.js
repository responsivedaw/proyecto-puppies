;

$(document).ready(function(){
    $.each(['./images/icon-fail.png', './images/icon-ok.png'], function(i, imgSource) {
        $('<img />')
            .css({
                position : 'absolute',
                top: '-100px',
                left: '-100px'
            })
            .appendTo('body')
            .get(0).src = imgSource;
    });
    $.validate({
        form : '#proveedores',
        scrollToTopOnError: true,
        validateOnBlur: true,
        errorMessagePosition: 'top'
	
    });
	 $('#btn-buscar').click(function() {
        var $form=$('#proveedores');
        $form.find('*[data-validation]').attr('data-validation', null);
        $form.get(0).submit();
    });
 });	

$(document).ready(function(){
    //Recuperamos provincia por AJAx y la mostramos.
    $('#localidad_proveedor').change(function(){
        var cpostal=$('#localidad_proveedor').val();
        $.ajax({
			url:"./ajax/localidades.php",
			type: "post",
			async: true,
			data: {cpostal:cpostal},
			success: function(ajax_data){
                $('#provincia_proveedor').val(ajax_data);
            }
		});
    });
});