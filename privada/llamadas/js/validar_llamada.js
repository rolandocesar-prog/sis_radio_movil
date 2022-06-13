"use strict"

function validar(){

	var id_cliente = document.formu.id_cliente.value;
	// var id_tipo_llamada = document.formu.id_tipo_llamada.value;
	// var id_tipo_movil = document.formu.id_tipo_movil.value;
	// var observaciones = document.formu.observaciones.value;

	if (id_cliente == ""){
		alert("El cliente no fue seleccionado");
		return;
	}
	// if (id_tipo_llamada == ""){
	// 	alert("El tipo de llamada no fue seleccionado");
	// 	return;
	// }
	// if (id_tipo_movil == ""){
	// 	alert("El tipo de movil no fue seleccionado");
	// 	return;
	// }

	// if (observaciones=="") {
	// 	alert("Las observaciones estan vacias");
	// 	document.formu.observaciones.focus();
	// 	return;
	// }
	
	document.formu.submit();
}