"use strict"

function validar(){
	var nombres = document.formu.nombres.value;
	var apellidos = document.formu.apellidos.value;
	var ci = document.formu.ci.value;
	var licencia = document.formu.licencia.value;
	var direccion = document.formu.direccion.value;
	var telefono = document.formu.telefono.value;

	if ((!v1.test(nombres))||(nombres=="")) {
		alert("Los nombres son incorrectos o el campo esta vacio");
		document.formu.nombres.focus();
		return;
	}
	if ((!v1.test(apellidos))||(apellidos=="")) {
		alert("Los apellidos son incorrectos o el campo esta vacio");
		document.formu.apellidos.focus();
		return;
	}
	if (ci=="") {
		alert("El ci es incorrecto o el campo esta vacio");
		document.formu.ci.focus();
		return;
	}
	if (licencia=="") {
		alert("La licencia es incorrecta o el campo esta vacio");
		document.formu.licencia.focus();
		return;
	}
	if (direccion=="") {
		alert("La direccion es incorrecta o el campo esta vacio");
		document.formu.direccion.focus();
		return;
	}
	if (telefono=="") {
		alert("El telefono es incorrecto o el campo esta vacio");
		document.formu.telefono.focus();
		return;
	}
	document.formu.submit();
}