"use strict"

function validar(){
	var nombre = document.formu.nombre.value;
	var direccion = document.formu.direccion.value;
	var telefono1 = document.formu.telefono1.value;
	var telefono2 = document.formu.telefono2.value;

	if ((!v1.test(nombre))||(nombre=="")) {
		alert("El nombre es incorrecto o el campo esta vacio");
		document.formu.nombre.focus();
		return;
	}
	if (direccion=="") {
		alert("La direccion es incorrecta o el campo esta vacio");
		document.formu.direccion.focus();
		return;
	}
	if (telefono1=="") {
		alert("El telefono es incorrecto o el campo esta vacio");
		document.formu.telefono1.focus();
		return;
	}
	if (telefono2=="") {
		alert("El telefono es incorrecto o el campo esta vacio");
		document.formu.telefono2.focus();
		return;
	}
	document.formu.submit();
}