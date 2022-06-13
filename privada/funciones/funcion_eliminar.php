<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_funcion = $_REQUEST["id_funcion"];

$smarty = new Smarty;

//$db->debug=true;

/*LAS CONSULTAS SE TIENEN QUE HACER CON TODAS LAS TABLAS EN LAS QUE ID_USUARIO ESTA COMO HERENCIA*/


	$reg = array();
	$reg["estado"] = 0;
	$reg["usuario1"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("funciones", $reg, "UPDATE", "id_funcion='".$_id_funcion."'");
	header("Location:funciones.php");
	exit();
?>