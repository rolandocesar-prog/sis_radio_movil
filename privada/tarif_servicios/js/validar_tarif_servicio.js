"use strict"

function validar(){
	var tipo = document.formu.tipo.value;
	var tarifa = document.formu.tarifa.value;

	if ((!v1.test(tipo))||(tipo=="")) {
		alert("El tipo es incorrecto o el campo esta vacio");
		document.formu.tipo.focus();
		return;
	}
	if ((!v22.test(tarifa))||(tarifa=="")) {
		alert("La tarifa es incorrecta o el campo esta vacio");
		document.formu.tarifa.focus();
		return;
	}
	document.formu.submit();
}