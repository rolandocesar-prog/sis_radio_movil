"use strict"

function validar(){
	var nombres = document.formu.nombres.value;
	var apellidos = document.formu.apellidos.value;
	var direc_cliente = document.formu.direc_cliente.value;
	var telefono = document.formu.telefono.value;

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
	if (direc_cliente=="") {
		alert("La direccion es incorrecta o el campo esta vacio");
		document.formu.direc_cliente.focus();
		return;
	}
	if (telefono=="") {
		alert("El telefono es incorrecto o el campo esta vacio");
		document.formu.telefono.focus();
		return;
	}
	document.formu.submit();
}