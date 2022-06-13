<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					FROM socios p
					WHERE p.estado <> 0
					ORDER BY p.id_socio DESC 
					");
$rs = $db->GetAll($sql);

$sql1 = $db->Prepare("SELECT *
					FROM tipos_moviles u
					WHERE u.estado <> 0
					ORDER BY u.id_tipo_movil DESC 
					");
$rs1 = $db->GetAll($sql1);

$smarty->assign("socio", $rs);
$smarty->assign("tipo_movil", $rs1);
$smarty->assign("direc_css", $direc_css);
$smarty->display("movil_nuevo.tpl");
?>