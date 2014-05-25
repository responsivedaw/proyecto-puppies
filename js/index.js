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
        form : '#login',
        scrollToTopOnError: true,
        validateOnBlur: true,
        errorMessagePosition: 'top'
    });
});
