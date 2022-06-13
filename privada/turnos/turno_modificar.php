<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_turno = $_REQUEST["id_turno"];
$_id_telefonista_operadora = $_REQUEST["id_telefonista_operadora"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM turnos
					WHERE id_turno = ?
					");
$rs = $db->GetAll($sql, array($_id_turno));

$sql2 = $db->Prepare("SELECT *
					FROM telefonistas_operadoras
					WHERE id_telefonista_operadora = ?
					AND estado <> 0			
					");
$rs2 = $db->GetAll($sql2, array($_id_telefonista_operadora));

$sql3 = $db->Prepare("SELECT *
					FROM telefonistas_operadoras
					WHERE id_telefonista_operadora <> ?
					AND estado <> 0
					");
$rs3 = $db->GetAll($sql3, array($_id_telefonista_operadora));

$smarty->assign("turno", $rs);
$smarty->assign("telefonista_operadora", $rs2);
$smarty->assign("telefonistas_operadoras", $rs3);

$smarty->assign("direc_css", $direc_css);
$smarty->display("turno_modificar.tpl");
?>