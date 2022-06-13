<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_tar_rur = $_REQUEST["id_tar_rur"];
$_id_empresa = $_REQUEST["id_empresa"];
$_id_zona = $_REQUEST["id_zona"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM tarif_rural
					WHERE id_tar_rur = ?
					");
$rs = $db->GetAll($sql, array($_id_tar_rur));

$sql2 = $db->Prepare("SELECT *
					FROM empresa
					WHERE id_empresa = ?
					AND estado <> 0			
					");
$rs2 = $db->GetAll($sql2, array($_id_empresa));

$sql3 = $db->Prepare("SELECT *
					FROM empresa
					WHERE id_empresa <> ?
					AND estado <> 0
					");
$rs3 = $db->GetAll($sql3, array($_id_empresa));

$sql4 = $db->Prepare("SELECT *
					FROM zonas
					WHERE id_zona = ?
					AND estado <> 0			
					");
$rs4 = $db->GetAll($sql4, array($_id_zona));

$sql5 = $db->Prepare("SELECT *
					FROM zonas
					WHERE id_zona <> ?
					AND estado <> 0
					");
$rs5 = $db->GetAll($sql5, array($_id_zona));


$smarty->assign("tarifario_rural", $rs);
$smarty->assign("empresa", $rs2);
$smarty->assign("empresas", $rs3);
$smarty->assign("zona", $rs4);
$smarty->assign("zonas", $rs5);

$smarty->assign("direc_css", $direc_css);
$smarty->display("tarif_rural_modificar.tpl");
?>