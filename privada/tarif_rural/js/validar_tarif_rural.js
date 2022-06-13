"use strict"

function validar(){
	var id_empresa = document.formu.id_empresa.value;
	var id_zona = document.formu.id_zona.value;
	var lugar = document.formu.lugar.value;
	var tarifa_carrera = document.formu.tarifa_carrera.value;

	if (id_empresa == ""){
		alert("La empresa no fue seleccionada");
		return;
	}
	if (id_zona == ""){
		alert("La zona no fue seleccionada");
		return;
	}
	if ((!v1.test(lugar))||(lugar=="")) {
		alert("El lugar es incorrecto o el campo esta vacio");
		document.formu.lugar.focus();
		return;
	}
	if ((!v22.test(tarifa_carrera))||(tarifa_carrera=="")) {
		alert("La tarifa es incorrecta o el campo esta vacio");
		document.formu.tarifa_carrera.focus();
		return;
	}
	document.formu.submit();
}