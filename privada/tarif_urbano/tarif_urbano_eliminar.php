<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_tar_urb = $_REQUEST["id_tar_urb"];

$smarty = new Smarty;

//$db->debug=true;

 
	$reg = array();
	$reg["estado"] = 0;
	$reg["usuario1"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("tarif_urbano", $reg, "UPDATE", "id_tar_urb='".$_id_tar_urb."'");
	header("Location:tarif_urbano.php");
	exit();
?>