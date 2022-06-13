"use strict"

function validar(){
	
	var id_telefonista_operadora = document.formu.id_telefonista_operadora.value;
	var fecha_inicio = document.formu.fecha_inicio.value;
	var fecha_fin = document.formu.fecha_fin.value;
	var salario = document.formu.salario.value;

	if (id_telefonista_operadora == ""){
		alert("La telefonista-operadora no fue seleccionada");
		return;
	}
	if (fecha_inicio == ""){
		alert("La fecha de inicio no fue seleccionada");
		return;
	}
	if (fecha_fin == ""){
		alert("La fecha fin no fue seleccionada");
		return;
	}
	if (fecha_fin <= fecha_inicio){
		alert("La fecha final no puede ser menor a la fecha inicio");
		return;
	}
	if ((!v22.test(salario))||(salario=="")) {
		alert("El salario es incorrecto o el campo esta vacio");
		document.formu.salario.focus();
		return;
	}
	document.formu.submit();
}