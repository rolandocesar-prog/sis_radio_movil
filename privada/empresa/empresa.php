<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

//$db->debug=true;

$sql3 = $db->Prepare("SELECT *
					FROM empresa
					WHERE id_empresa = 1
					");
$rs3 = $db->GetAll($sql3);

$smarty->assign("empresa", $rs3);
$smarty->assign("direc_css", $direc_css);
$smarty->display("empresa.tpl");
?>