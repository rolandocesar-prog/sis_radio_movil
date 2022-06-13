<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$id_movil = $_REQUEST["id_movil"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					  FROM moviles m, conductores c, moviles_conductores mc
					  WHERE m.id_movil=mc.id_movil AND c.id_conductor=mc.id_conductor 
					  AND m.id_movil = ?
					  AND m.estado <> 0
					  AND c.estado <> 0
					  AND mc.estado <> 0
					  ");
$rs = $db->GetAll($sql, array($id_movil));

$smarty->assign("movil", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("fichas_tec_moviles_conductores1.tpl");
?>