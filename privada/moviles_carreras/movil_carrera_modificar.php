<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_movil_carrera = $_REQUEST["id_movil_carrera"];
$_id_llamada = $_REQUEST["id_llamada"];
$_id_telefonista_operadora = $_REQUEST["id_telefonista_operadora"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM moviles_carreras
					WHERE id_movil_carrera = ?
					");
$rs = $db->GetAll($sql, array($_id_movil_carrera));

$sql2 = $db->Prepare("SELECT *
					FROM llamadas
					WHERE id_llamada = ?
					AND estado <> 0			
					");
$rs2 = $db->GetAll($sql2, array($_id_llamada));

$sql3 = $db->Prepare("SELECT *
					FROM llamadas
					WHERE id_llamada <> ?
					AND estado <> 0
					");
$rs3 = $db->GetAll($sql3, array($_id_llamada));

$sql4 = $db->Prepare("SELECT *
					FROM telefonistas_operadoras
					WHERE id_telefonista_operadora = ?
					AND estado <> 0			
					");
$rs4 = $db->GetAll($sql4, array($_id_telefonista_operadora));

$sql5 = $db->Prepare("SELECT *
					FROM telefonistas_operadoras
					WHERE id_telefonista_operadora <> ?
					AND estado <> 0
					");
$rs5 = $db->GetAll($sql5, array($_id_telefonista_operadora));


$smarty->assign("movil_carrera", $rs);
$smarty->assign("llamada", $rs2);
$smarty->assign("llamadas", $rs3);
$smarty->assign("telefonista_operadora", $rs4);
$smarty->assign("telefonistas_operadoras", $rs5);

$smarty->assign("direc_css", $direc_css);
$smarty->display("movil_carrera_modificar.tpl");
?>