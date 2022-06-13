<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");


$smarty = new Smarty;


//$db->debug=true;

$sql3 = $db->Prepare("SELECT *
					FROM tipos_moviles
					WHERE estado <> 0
					AND id_tipo_movil <> 0
					ORDER BY id_tipo_movil DESC 
					");

$rs3 = $db->GetAll($sql3);

$smarty->assign("tipos_moviles", $rs3);
$smarty->assign("direc_css", $direc_css);
$smarty->display("tipos_moviles.tpl");
?>