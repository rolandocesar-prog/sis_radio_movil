"use strict"

function validar(){
	var zona = document.formu.zona.value;

	if ((!v1.test(zona))||(zona=="")) {
		alert("La zona es incorrecta o el campo esta vacio");
		document.formu.zona.focus();
		return;
	}
	document.formu.submit();
}