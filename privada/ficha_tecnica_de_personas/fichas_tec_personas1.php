<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$id_persona = $_REQUEST["id_persona"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					  FROM personas
					  WHERE id_persona = ?
					  AND estado <> 0				 
					  ");
$rs = $db->GetAll($sql, array($id_persona));

$smarty->assign("persona", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("fichas_tec_personas1.tpl");
?>