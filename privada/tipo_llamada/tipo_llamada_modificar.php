<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_tipo_llamada = $_REQUEST["id_tipo_llamada"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM tipo_llamada
					WHERE id_tipo_llamada = ?
					");

$rs = $db->GetAll($sql, array($_id_tipo_llamada));
$smarty->assign("tipo_llamada", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("tipo_llamada_modificar.tpl");
?>