<?php
error_reporting(0);
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					FROM personas p
					WHERE p.estado <> 0
					ORDER BY p.id_persona DESC 
					");

$rs = $db->GetAll($sql);

$smarty->assign("personas", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("usuario_nuevo.tpl");
?>