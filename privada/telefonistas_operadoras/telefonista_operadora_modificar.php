<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_telefonista_operadora = $_REQUEST["id_telefonista_operadora"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM telefonistas_operadoras
					WHERE id_telefonista_operadora = ?
					");

$rs = $db->GetAll($sql, array($_id_telefonista_operadora));

$smarty->assign("telefonista_operadora", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("telefonista_operadora_modificar.tpl");
?>