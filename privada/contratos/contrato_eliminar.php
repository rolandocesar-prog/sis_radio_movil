<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_contrato = $_REQUEST["id_contrato"];

$smarty = new Smarty;

//$db->debug=true;

/*LAS CONSULTAS SE TIENEN QUE HACER CON TODAS LAS TABLAS EN LAS QUE ID_USUARIO ESTA COMO HERENCIA*/


	$reg = array();
	$reg["estado"] = 0;
	$reg["usuario1"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("contratos", $reg, "UPDATE", "id_contrato='".$_id_contrato."'");
	header("Location:contratos.php");
	exit();
?>