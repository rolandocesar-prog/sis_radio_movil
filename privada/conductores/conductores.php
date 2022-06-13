<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "conductores");

paginacion("conductores.php?", $smarty);

$sql3 = $db->Prepare("SELECT *
					  FROM conductores
					  WHERE estado <> 0
					  AND id_conductor <> 0
					  ORDER BY id_conductor DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("conductores", $db->GetAll($sql3, array($nElem, $regIni)));

/*$sql3 = $db->Prepare("SELECT *
					FROM conductores
					WHERE estado <> 0
					AND id_conductor <> 0
					ORDER BY id_conductor DESC 
					");

$rs3 = $db->GetAll($sql3);*/

//$smarty->assign("conductores", $rs3);
$smarty->assign("direc_css", $direc_css);
$smarty->display("conductores.tpl");
?>