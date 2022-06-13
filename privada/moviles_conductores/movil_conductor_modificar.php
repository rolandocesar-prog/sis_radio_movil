<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_movil_conductor = $_REQUEST["id_movil_conductor"];
$_id_conductor = $_REQUEST["id_conductor"];
$_id_movil = $_REQUEST["id_movil"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM moviles_conductores
					WHERE id_movil_conductor = ?
					");
$rs = $db->GetAll($sql, array($_id_movil_conductor));

$sql2 = $db->Prepare("SELECT *
					FROM conductores
					WHERE id_conductor = ?
					AND estado <> 0			
					");
$rs2 = $db->GetAll($sql2, array($_id_conductor));

$sql3 = $db->Prepare("SELECT *
					FROM conductores
					WHERE id_conductor <> ?
					AND estado <> 0
					");
$rs3 = $db->GetAll($sql3, array($_id_conductor));

$sql4 = $db->Prepare("SELECT *
					FROM moviles
					WHERE id_movil = ?
					AND estado <> 0			
					");
$rs4 = $db->GetAll($sql4, array($_id_movil));

$sql5 = $db->Prepare("SELECT *
					FROM moviles
					WHERE id_movil <> ?
					AND estado <> 0
					");
$rs5 = $db->GetAll($sql5, array($_id_movil));


$smarty->assign("movil_conductor", $rs);
$smarty->assign("conductor", $rs2);
$smarty->assign("conductores", $rs3);
$smarty->assign("movil", $rs4);
$smarty->assign("moviles", $rs5);

$smarty->assign("direc_css", $direc_css);
$smarty->display("movil_conductor_modificar.tpl");
?>