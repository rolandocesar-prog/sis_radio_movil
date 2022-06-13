<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");


$smarty = new Smarty;


//$db->debug=true;

$sql3 = $db->Prepare("SELECT *
					FROM tipo_llamada
					WHERE estado <> 0
					AND id_tipo_llamada <> 0
					ORDER BY id_tipo_llamada DESC 
					");

$rs3 = $db->GetAll($sql3);

$smarty->assign("tipo_llamada", $rs3);
$smarty->assign("direc_css", $direc_css);
$smarty->display("tipo_llamada.tpl");
?>