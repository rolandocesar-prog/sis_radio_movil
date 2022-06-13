<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_socio = $_REQUEST["id_socio"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM socios
					WHERE id_socio = ?
					");

$rs = $db->GetAll($sql, array($_id_socio));
$smarty->assign("socio", $rs);

$smarty->assign("direc_css", $direc_css);
$smarty->display("socio_modificar.tpl");
?>