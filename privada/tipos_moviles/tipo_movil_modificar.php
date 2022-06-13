<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_tipo_movil = $_REQUEST["id_tipo_movil"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM tipos_moviles
					WHERE id_tipo_movil = ?
					");

$rs = $db->GetAll($sql, array($_id_tipo_movil));

$smarty->assign("tipos_moviles", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("tipo_movil_modificar.tpl");
?>