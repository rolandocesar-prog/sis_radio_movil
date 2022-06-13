<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM personas p, usuarios u
					WHERE p.id_persona =u.id_persona
					AND p.estado <> 0
					AND u.estado <> 0
					");
$rs = $db->GetAll($sql);

$smarty->assign("rpt_persona_usuario", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("rpt_personas_usuarios.tpl");
?>