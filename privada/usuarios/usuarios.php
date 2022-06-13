<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM personas p
					INNER JOIN usuarios u ON p.id_persona = u.id_persona
					WHERE u.estado <> 0
					AND p.estado <> 0
					ORDER BY u.id_usuario DESC 
					");
$rs = $db->GetAll($sql);

$smarty->assign("usuarios", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("usuarios.tpl");
?>