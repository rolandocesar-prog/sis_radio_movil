"use strict"
function validar(){
	var descripcion = document.formu.descripcion.value;
	
	if(descripcion==""){
		alert("Por favor ingrese una descripcion");
		document.formu.descripcion.focus();
		return;
	}
	document.formu.submit();
}