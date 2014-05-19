;
window.onload=function(){
	mueveReloj();
}

function mueveReloj(){
	momentoActual = new Date();
	hora = momentoActual.getHours();
	minuto = momentoActual.getMinutes();
	segundo = momentoActual.getSeconds();
	
	formato_segundo = new String (segundo);
	if (formato_segundo.length == 1){
        segundo = "0" + segundo;
    }	
	formato_minuto = new String (minuto);
	if (formato_minuto.length == 1){
        minuto = "0" + minuto;
    }
	formato_hora = new String (hora);
	if (formato_hora.length == 1){
        hora = "0" + hora;
    }	
	horaImprimible = hora + " : " + minuto + " : " + segundo;
    document.getElementById("reloj-footer").value = horaImprimible;
	setTimeout("mueveReloj()",1000);
}