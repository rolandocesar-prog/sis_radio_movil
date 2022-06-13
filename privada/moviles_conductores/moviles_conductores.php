<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "moviles_conductores");

paginacion("moviles_conductores.php?", $smarty);

$sql = $db->Prepare("SELECT *
					  FROM moviles t
					  INNER JOIN moviles_conductores u ON t.id_movil = u.id_movil
					  INNER JOIN conductores p ON p.id_conductor = u.id_conductor
					  WHERE t.estado <> 0
					  AND u.estado <> 0
					  AND p.estado <> 0
					  ORDER BY u.id_movil_conductor DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("movil_conductor", $db->GetAll($sql, array($nElem, $regIni)));

/*$sql = $db->Prepare("SELECT *
					  FROM moviles_conductores u, conductores p, moviles t
					  WHERE u.id_conductor = p.id_conductor AND u.id_movil = t.id_movil
					  AND u.estado <> 0
					  AND p.estado <> 0
					  AND t.estado <> 0
					  ORDER BY u.id_movil_conductor DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("movil_conductor", $db->GetAll($sql, array($nElem, $regIni)));*/

/*$sql = $db->Prepare("SELECT *
					FROM moviles_conductores u, conductores p, moviles t
					WHERE u.id_conductor = p.id_conductor AND u.id_movil = t.id_movil
					AND u.estado <> 0
					AND p.estado <> 0
					AND t.estado <> 0
					ORDER BY u.id_movil_conductor DESC 
					");
$rs = $db->GetAll($sql);*/

//$smarty->assign("movil_conductor", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("moviles_conductores.tpl");
?>