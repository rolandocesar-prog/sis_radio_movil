<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					FROM telefonistas_operadoras p
					WHERE p.estado <> 0
					ORDER BY p.id_telefonista_operadora DESC 
					");

$rs = $db->GetAll($sql);

$smarty->assign("telefonistas_operadoras", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("turno_nuevo.tpl");
?>