<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "zonas");

paginacion("zonas.php?", $smarty);

$sql3 = $db->Prepare("SELECT *
					  FROM zonas
					  WHERE estado <> 0
					  AND id_zona <> 0
					  ORDER BY id_zona DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("zonas", $db->GetAll($sql3, array($nElem, $regIni)));

/*$sql3 = $db->Prepare("SELECT *
					FROM zonas
					WHERE estado <> 0
					AND id_zona <> 0
					ORDER BY id_zona DESC 
					");
$rs3 = $db->GetAll($sql3);*/

//$smarty->assign("zonas", $rs3);
$smarty->assign("direc_css", $direc_css);
$smarty->display("zonas.tpl");
?>