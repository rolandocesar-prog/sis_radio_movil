"use strict"

function validar(){
	var nombres = document.formu.nombres.value;
	var apellidos = document.formu.apellidos.value;

	if ((!v1.test(nombres))||(nombres=="")) {
		alert("Los nombres son incorrectos o el campo esta vacio");
		document.formu.nombres.focus();
		return;
	}
	if ((!v1.test(apellidos))||(apellidos=="")) {
		alert("El apellido es incorrecto o el campo esta vacio");
		document.formu.apellidos.focus();
		return;
	}
	document.formu.submit();
}