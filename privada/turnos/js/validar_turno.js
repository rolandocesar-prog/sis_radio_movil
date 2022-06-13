"use strict"
function validar(){
	var id_telefonista_operadora = document.formu.id_telefonista_operadora.value;
	var turno = document.formu.turno.value;
	var fecha_inicio_tu = document.formu.fecha_inicio_tu.value;
	var fecha_fin_tu = document.formu.fecha_fin_tu.value;
	
	if(id_telefonista_operadora==""){
		alert("Por favor seleccione una telefonista-operadora");
		document.formu.id_telefonista_operadora.focus();
		return;
	}
	if(turno==""){
		alert("Por favor ingrese un turno");
		document.formu.turno.focus();
		return;
	}
	if(fecha_inicio_tu==""){
		alert("Por favor ingrese la fecha de inicio");
		return;
	}
	if(fecha_fin_tu==""){
		alert("Por favor ingrese la fecha de fin");
		return;
	}
	if (fecha_fin_tu <= fecha_inicio_tu){
		alert("La fecha final no puede ser menor o igual a la fecha de inicio");
		return;
	}
	document.formu.submit();
}