"use strict"
function validar(){
	var id_conductor = document.formu.id_conductor.value;
	var id_movil = document.formu.id_movil.value;
	var fecha_inicio = document.formu.fecha_inicio.value;
	var hora_inicio = document.formu.hora_inicio.value;
	var fecha_fin = document.formu.fecha_fin.value;
	var hora_fin = document.formu.hora_fin.value;
	
	if(id_conductor==""){
		alert("Por favor seleccione un conductor");
		document.formu.id_conductor.focus();
		return;
	}
	if(id_movil==""){
		alert("Por favor seleccione un movil");
		document.formu.id_movil.focus();
		return;
	}
	if(fecha_inicio==""){
		alert("Por favor ingrese una fecha de inicio");
		return;
	}
	if(hora_inicio==""){
		alert("Por favor ingrese una hora de inicio");
		document.formu.hora_inicio.focus();
		return;
	}
	if(fecha_fin==""){
		alert("Por favor ingrese una fecha de fin");
		return;
	}
	if(hora_fin==""){
		alert("Por favor ingrese una hora de fin");
		document.formu.hora_fin.focus();
		return;
	}
	if (fecha_fin <= fecha_inicio){
		alert("La fecha final no puede ser menor o igual a la fecha de inicio");
		return;
	}
	document.formu.submit();
}