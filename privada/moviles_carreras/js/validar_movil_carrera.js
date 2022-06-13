"use strict"
function validar(){
	var id_llamada = document.formu.id_llamada.value;
	var id_telefonista_operadora = document.formu.id_telefonista_operadora.value;
	var hora_movil_carrera = document.formu.hora_movil_carrera.value;
	var fecha_movil_carrera = document.formu.fecha_movil_carrera.value;
	
	if(id_llamada==""){
		alert("Por favor seleccione llamada");
		document.formu.id_llamada.focus();
		return;
	}
	if(id_telefonista_operadora==""){
		alert("Por favor seleccione telefonista-operadora");
		document.formu.id_telefonista_operadora.focus();
		return;
	}
	if(hora_movil_carrera==""){
		alert("Por favor ingrese hora");
		document.formu.hora_movil_carrera.focus();
		return;
	}
	if(fecha_movil_carrera==""){
		alert("Por favor ingrese fecha");
		document.formu.fecha_movil_carrera.focus();
		return;
	}
	document.formu.submit();
}