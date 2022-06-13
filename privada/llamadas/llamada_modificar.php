<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_llamada = $_REQUEST["id_llamada"];
$_id_cliente = $_REQUEST["id_cliente"];
$_id_tipo_llamada = $_REQUEST["id_tipo_llamada"];
$_id_tipo_movil = $_REQUEST["id_tipo_movil"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM llamadas
					WHERE id_llamada = ?
					");
$rs = $db->GetAll($sql, array($_id_llamada));

$sql2 = $db->Prepare("SELECT *
					FROM clientes
					WHERE id_cliente = ?
					AND estado <> 0			
					");
$rs2 = $db->GetAll($sql2, array($_id_cliente));

$sql3 = $db->Prepare("SELECT *
					FROM clientes
					WHERE id_cliente <> ?
					AND estado <> 0
					");
$rs3 = $db->GetAll($sql3, array($_id_cliente));

$sql4 = $db->Prepare("SELECT *
					FROM tipo_llamada
					WHERE id_tipo_llamada = ?
					AND estado <> 0			
					");
$rs4 = $db->GetAll($sql4, array($_id_tipo_llamada));

$sql5 = $db->Prepare("SELECT *
					FROM tipo_llamada
					WHERE id_tipo_llamada <> ?
					AND estado <> 0
					");
$rs5 = $db->GetAll($sql5, array($_id_tipo_llamada));

$sql6 = $db->Prepare("SELECT *
					FROM tipos_moviles
					WHERE id_tipo_movil = ?
					AND estado <> 0			
					");
$rs6 = $db->GetAll($sql6, array($_id_tipo_movil));

$sql7 = $db->Prepare("SELECT *
					FROM tipos_moviles
					WHERE id_tipo_movil <> ?
					AND estado <> 0
					");
$rs7 = $db->GetAll($sql7, array($_id_tipo_movil));

$smarty->assign("llamada", $rs);
$smarty->assign("cliente", $rs2);
$smarty->assign("clientes", $rs3);
$smarty->assign("tipo_llamada", $rs4);
$smarty->assign("tipos_llamadas", $rs5);
$smarty->assign("tipo_movil", $rs6);
$smarty->assign("tipos_moviles", $rs7);

$smarty->assign("direc_css", $direc_css);
$smarty->display("llamada_modificar.tpl");
?>