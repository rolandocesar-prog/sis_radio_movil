"use strict"
function validar(){
	var id_socio = document.formu.id_socio.value;
	var id_tipo_movil = document.formu.id_tipo_movil.value;
	var num_movil = document.formu.num_movil.value;
	var placa = document.formu.placa.value;
	
	if(id_socio==""){
		alert("Por favor seleccione un socio");
		document.formu.id_socio.focus();
		return;
	}
	if(id_tipo_movil==""){
		alert("Por favor ingrese el tipo de movil");
		document.formu.id_tipo_movil.focus();
		return;
	}
	if(num_movil==""){
		alert("Por favor ingrese el numero de movil");
		document.formu.num_movil.focus();
		return;
	}
	if(placa==""){
		alert("Por favor ingrese la placa del movil");
		document.formu.placa.focus();
		return;
	}
	document.formu.submit();
}