"use strict"

function validar(){
	var tipo_movil = document.formu.tipo_movil.value;

	if (tipo_movil=="") {
		alert("No selecciono el tipo de movil");
		return;
	}
	document.formu.submit();
}