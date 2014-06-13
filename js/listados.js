;

$(document).ready(function(){
    $('#anclaClientes').css({'background-color':'black',
                        'color':'black',
                        'font-weight': 'bold',
                        'opacity':'1'});
    $('#listados-mascota').css('display','none');
    $('#listados-articulo').css('display','none');
    
    $('#anclaClientes').click(function(){
        $(this).css({'background-color':'black',
                     'color':'black',
                     'font-weight': 'bold',
                     'opacity':'1'});
        $('#anclaMascotas').css({'opacity':'0.7',
                                 'color':'#428BCA',
                                 'font-weight':'normal',
                                 'text-decoration':'none'});
        $('#anclaArticulos').css({'opacity':'0.7',
                                 'color':'#428BCA',
                                 'font-weight':'normal',
                                 'text-decoration':'none'});
        $('#listados-mascota').hide();
        $('#listados-articulo').hide();
        $('#listados-cliente').show();
    });
    
    $('#anclaMascotas').click(function(){
        $(this).css({'background-color':'black',
                     'color':'black',
                     'font-weight': 'bold',
                     'opacity':'1'});
        $('#anclaClientes').css({'opacity':'0.7',
                                 'color':'#428BCA',
                                 'font-weight':'normal',
                                 'text-decoration':'none'});
        $('#anclaArticulos').css({'opacity':'0.7',
                                 'color':'#428BCA',
                                 'font-weight':'normal',
                                 'text-decoration':'none'});
        $('#listados-cliente').hide();
        $('#listados-articulo').hide();
        $('#listados-mascota').show();
    });
    
    $('#anclaArticulos').click(function(){
        $(this).css({'background-color':'black',
                     'color':'black',
                     'font-weight': 'bold',
                     'opacity':'1'});
        $('#anclaClientes').css({'opacity':'0.7',
                                 'color':'#428BCA',
                                 'font-weight':'normal',
                                 'text-decoration':'none'});
        $('#anclaMascotas').css({'opacity':'0.7',
                                 'color':'#428BCA',
                                 'font-weight':'normal',
                                 'text-decoration':'none'});
        $('#listados-cliente').hide();
        $('#listados-mascota').hide();
        $('#listados-articulo').show();
    });
});