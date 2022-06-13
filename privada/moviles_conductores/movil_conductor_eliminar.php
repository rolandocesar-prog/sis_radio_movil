<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_movil_conductor = $_REQUEST["id_movil_conductor"];

$smarty = new Smarty;

//$db->debug=true;

 
	$reg = array();
	$reg["estado"] = 0;
	$reg["usuario1"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("moviles_conductores", $reg, "UPDATE", "id_movil_conductor='".$_id_movil_conductor."'");
	header("Location:moviles_conductores.php");
	exit();
?>