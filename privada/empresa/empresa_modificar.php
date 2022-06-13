<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_empresa = $_REQUEST["id_empresa"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM empresa
					WHERE id_empresa = ?
					");
$rs = $db->GetAll($sql, array($_id_empresa));

$smarty->assign("empresa1", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("empresa_modificar.tpl");
?>