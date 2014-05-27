;

$(document).ready(function(){
    $.validate({
        form : '#login',
        scrollToTopOnError: true,
        validateOnBlur: true,
        errorMessagePosition: 'top'
    });
});
