<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_tar_serv = $_REQUEST["id_tar_serv"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM tarif_servicios
					WHERE id_tar_serv = ?
					");

$rs = $db->GetAll($sql, array($_id_tar_serv));

$smarty->assign("tarifario_servicio", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("tarif_servicio_modificar.tpl");
?>