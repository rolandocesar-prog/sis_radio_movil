<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_funcion = $_REQUEST["id_funcion"];
$_id_telefonista_operadora = $_REQUEST["id_telefonista_operadora"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM funciones
					WHERE id_funcion = ?
					");
$rs = $db->GetAll($sql, array($_id_funcion));

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

$smarty->assign("funcion", $rs);
$smarty->assign("telefonista_operadora", $rs2);
$smarty->assign("telefonistas_operadoras", $rs3);

$smarty->assign("direc_css", $direc_css);
$smarty->display("funcion_modificar.tpl");
?>