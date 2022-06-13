<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$genero = $_REQUEST["genero"];

$smarty = new Smarty;
//$db->debug=true;
if($genero == "T"){
	$sql = $db->Prepare("SELECT *
						FROM personas
						WHERE estado <> 0
						");
	$rs = $db->GetAll($sql);
} else {
	$sql = $db->Prepare("SELECT *
					FROM personas
					WHERE genero = ?
					AND estado <> 0
					");
	$rs = $db->GetAll($sql, array($genero));
}
$fecha = date("Y-m-d H:i:s");
$smarty->assign("personas_genero1", $rs);
$smarty->assign("fecha", $fecha);
$smarty->assign("direc_css", $direc_css);
$smarty->display("rpt_personas_genero1.tpl");
?>