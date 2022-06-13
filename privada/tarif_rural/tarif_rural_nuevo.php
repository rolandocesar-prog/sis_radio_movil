<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					FROM empresa p
					WHERE p.estado <> 0
					ORDER BY p.id_empresa DESC 
					");
$rs = $db->GetAll($sql);

$sql1 = $db->Prepare("SELECT *
					FROM zonas u
					WHERE u.estado <> 0
					ORDER BY u.id_zona DESC 
					");
$rs1 = $db->GetAll($sql1);

$smarty->assign("empresa", $rs);
$smarty->assign("zona", $rs1);
$smarty->assign("direc_css", $direc_css);
$smarty->display("tarif_rural_nuevo.tpl");
?>