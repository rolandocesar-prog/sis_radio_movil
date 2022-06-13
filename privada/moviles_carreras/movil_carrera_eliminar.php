<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_movil_carrera = $_REQUEST["id_movil_carrera"];

$smarty = new Smarty;

//$db->debug=true;

 
	$reg = array();
	$reg["estado"] = 0;
	$reg["usuario1"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("moviles_carreras", $reg, "UPDATE", "id_movil_carrera='".$_id_movil_carrera."'");
	header("Location:moviles_carreras.php");
	exit();
?>