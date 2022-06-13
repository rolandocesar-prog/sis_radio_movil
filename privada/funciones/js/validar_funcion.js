"use strict"

function validar(){
	var id_telefonista_operadora = document.formu.id_telefonista_operadora.value;
	var funcion = document.formu.funcion.value;
	var fecha_inicio_fu = document.formu.fecha_inicio_fu.value;
	var fecha_fin_fu = document.formu.fecha_fin_fu.value;

	if (id_telefonista_operadora == ""){
		alert("La telefonista-operadora no fue seleccionada");
		return;
	}
	if ((!v1.test(funcion))||(funcion=="")) {
		alert("La funcion es incorrecta o el campo esta vacio");
		document.formu.funcion.focus();
		return;
	}
	if (fecha_inicio_fu == ""){
		alert("La fecha de inicio no fue seleccionada");
		return;
	}
	if (fecha_fin_fu == ""){
		alert("La fecha final no fue seleccionada");
		return;
	}
	if (fecha_fin_fu <= fecha_inicio_fu){
		alert("La fecha final no puede ser menor a la fecha inicio");
		return;
	}
	document.formu.submit();
}