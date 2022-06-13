<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "turnos");

paginacion("turnos.php?", $smarty);

$sql3 = $db->Prepare("SELECT *
					  FROM telefonistas_operadoras p
					  INNER JOIN turnos u ON p.id_telefonista_operadora = u.id_telefonista_operadora
					  WHERE p.estado <> 0
					  AND u.estado <> 0
					  ORDER BY u.id_turno DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("turnos", $db->GetAll($sql3, array($nElem, $regIni)));

/*$sql3 = $db->Prepare("SELECT *
					  FROM turnos u, telefonistas_operadoras p
					  WHERE u.estado <> 0
					  AND p.estado <> 0
					  ORDER BY u.id_turno DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("turnos", $db->GetAll($sql3, array($nElem, $regIni)));*/

/*$sql = $db->Prepare("SELECT *
					FROM turnos u, telefonistas_operadoras p
					WHERE u.id_telefonista_operadora = p.id_telefonista_operadora
					AND u.estado <> 0
					AND p.estado <> 0
					ORDER BY u.id_turno DESC 
					");
$rs = $db->GetAll($sql);*/

//$smarty->assign("turnos", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("turnos.tpl");
?>