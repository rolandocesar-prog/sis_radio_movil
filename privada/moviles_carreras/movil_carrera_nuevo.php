<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					FROM llamadas p
					WHERE p.estado <> 0
					ORDER BY p.id_llamada DESC 
					");
$rs = $db->GetAll($sql);

$sql1 = $db->Prepare("SELECT *
					FROM telefonistas_operadoras u
					WHERE u.estado <> 0
					ORDER BY u.id_telefonista_operadora DESC 
					");
$rs1 = $db->GetAll($sql1);

$smarty->assign("llamada", $rs);
$smarty->assign("telefonista_operadora", $rs1);
$smarty->assign("direc_css", $direc_css);
$smarty->display("movil_carrera_nuevo.tpl");
?>