"use strict"

function validar(){
	var id_empresa = document.formu.id_empresa.value;
	var id_zona = document.formu.id_zona.value;
	var lugar = document.formu.lugar.value;
	var una = document.formu.una.value;
	var dos = document.formu.dos.value;
	var tres = document.formu.tres.value;

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
	if ((!v22.test(una))||(una=="")) {
		alert("La tarifa es incorrecta o el campo esta vacio");
		document.formu.una.focus();
		return;
	}
	if ((!v22.test(dos))||(dos=="")) {
		alert("La tarifa es incorrecta o el campo esta vacio");
		document.formu.dos.focus();
		return;
	}
	if ((!v22.test(tres))||(tres=="")) {
		alert("La tarifa es incorrecta o el campo esta vacio");
		document.formu.tres.focus();
		return;
	}
	document.formu.submit();
}