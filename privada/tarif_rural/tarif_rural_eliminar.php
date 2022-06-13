<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_tar_rur = $_REQUEST["id_tar_rur"];

$smarty = new Smarty;

//$db->debug=true;

 
	$reg = array();
	$reg["estado"] = 0;
	$reg["usuario1"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("tarif_rural", $reg, "UPDATE", "id_tar_rur='".$_id_tar_rur."'");
	header("Location:tarif_rural.php");
	exit();
?>