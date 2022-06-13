"use strict"
function validar(){
	var id_cliente = document.formu.id_cliente.value;
	var id_tipo_llamada = document.formu.id_tipo_llamada.value;
	var observaciones = document.formu.observaciones.value;

	if(id_cliente==""){
		alert("Por favor seleccione un cliente");
		document.formu.id_cliente.focus();
		return;
	}
	if(id_tipo_llamada==""){
		alert("Por favor seleccione tipo de llamada");
		document.formu.id_tipo_llamada.focus();
		return;
	}
	if(observaciones==""){
		alert("Por favor ingrese una observacion");
		document.formu.observaciones.focus();
		return;
	}
	document.formu.submit();
}