<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_movil = $_REQUEST["id_movil"];
$_id_socio = $_REQUEST["id_socio"];
$_id_tipo_movil = $_REQUEST["id_tipo_movil"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM moviles
					WHERE id_movil = ?
					");
$rs = $db->GetAll($sql, array($_id_movil));

$sql2 = $db->Prepare("SELECT *
					FROM socios
					WHERE id_socio = ?
					AND estado <> 0			
					");
$rs2 = $db->GetAll($sql2, array($_id_socio));

$sql3 = $db->Prepare("SELECT *
					FROM socios
					WHERE id_socio <> ?
					AND estado <> 0
					");
$rs3 = $db->GetAll($sql3, array($_id_socio));

$sql4 = $db->Prepare("SELECT *
					FROM tipos_moviles
					WHERE id_tipo_movil = ?
					AND estado <> 0			
					");
$rs4 = $db->GetAll($sql4, array($_id_tipo_movil));

$sql5 = $db->Prepare("SELECT *
					FROM tipos_moviles
					WHERE id_tipo_movil <> ?
					AND estado <> 0
					");
$rs5 = $db->GetAll($sql5, array($_id_tipo_movil));

$smarty->assign("movil", $rs);
$smarty->assign("socio", $rs2);
$smarty->assign("socios", $rs3);
$smarty->assign("tipo_movil", $rs4);
$smarty->assign("tipos_moviles", $rs5);

$smarty->assign("direc_css", $direc_css);
$smarty->display("movil_modificar.tpl");
?>