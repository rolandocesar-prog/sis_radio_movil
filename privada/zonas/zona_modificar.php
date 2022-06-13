<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_zona = $_REQUEST["id_zona"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM zonas
					WHERE id_zona = ?
					");

$rs = $db->GetAll($sql, array($_id_zona));
$smarty->assign("zona", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("zona_modificar.tpl");
?>