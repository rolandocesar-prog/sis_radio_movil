"use strict"

function validar(){
	var ci_socio = document.formu.ci_socio.value;
	var nombres_socio = document.formu.nombres_socio.value;
	var apellidos_socio = document.formu.apellidos_socio.value;
	var direc_socio = document.formu.direc_socio.value;
	var fecha_alta = document.formu.fecha_alta.value;
	var telefono_socio = document.formu.telefono_socio.value;

	if (ci_socio=="") {
		alert("El carnet de identidad es incorrecto o el campo esta vacio");
		document.formu.ci_socio.focus();
		return;
	}
	if ((!v1.test(nombres_socio))||(nombres_socio=="")) {
		alert("Los nombres son incorrectos o el campo esta vacio");
		document.formu.nombres_socio.focus();
		return;
	}
	if ((!v1.test(apellidos_socio))||(apellidos_socio=="")) {
		alert("El apellido es incorrecto o el campo esta vacio");
		document.formu.apellidos_socio.focus();
		return;
	}
	if (direc_socio=="") {
		alert("La direccion es incorrecta o el campo esta vacio");
		document.formu.direc_socio.focus();
		return;
	}
	if (fecha_alta == "") {
		alert("El campo de fecha de alta esta vacio");
		document.formu.fecha_alta.focus();
		return;
	}
	if (telefono_socio=="") {
		alert("El telefono es incorrecto o el campo esta vacio");
		document.formu.telefono_socio.focus();
		return;
	}
	
	document.formu.submit();
}