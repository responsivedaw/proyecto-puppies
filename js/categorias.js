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
        form : '#categorias',
        scrollToTopOnError: true,
        validateOnBlur: true,
        errorMessagePosition: 'top'
	
    });
	 $('#btn-buscar').click(function() {
        var $form=$('#categorias');
        $form.find('*[data-validation]').attr('data-validation', null);
        $form.get(0).submit();
    });
});	