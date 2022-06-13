<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM registro_llamada
					WHERE estado >= 0
					ORDER BY id_reg_llamada ASC 
					");
$rs = $db->GetAll($sql);

$smarty->assign("despacho_llamada", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("despacho_llamada_nuevo.tpl");
?>