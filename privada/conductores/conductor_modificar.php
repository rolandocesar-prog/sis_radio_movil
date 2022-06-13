<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_conductor = $_REQUEST["id_conductor"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM conductores
					WHERE id_conductor = ?
					");

$rs = $db->GetAll($sql, array($_id_conductor));

$smarty->assign("conductor", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("conductor_modificar.tpl");
?>