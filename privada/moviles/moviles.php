<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "moviles");

paginacion("moviles.php?", $smarty);

/*$sql3 = $db->Prepare("SELECT *
					  FROM socios s
					  INNER JOIN moviles m ON s.id_socio = m.id_socio
					  INNER JOIN tipos_noviles t ON t.id_tipo_movil = m.id_tipo_movil
					  WHERE s.estado <> 0
					  AND m.estado <> 0
					  AND t.estado <> 0
					  ORDER BY id_movil DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("movil", $db->GetAll($sql3, array($nElem, $regIni)));*/

$sql = $db->Prepare("SELECT *
					  FROM socios s, moviles m, tipos_moviles t
					  WHERE s.id_socio = m.id_socio AND t.id_tipo_movil = m.id_tipo_movil
					  AND s.estado <> 0
					  AND m.estado <> 0
					  AND t.estado <> 0
					  ORDER BY id_movil DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("movil", $db->GetAll($sql, array($nElem, $regIni)));

/*$sql = $db->Prepare("SELECT *
					FROM moviles u, socios p, tipos_moviles t
					WHERE u.id_socio = p.id_socio AND u.id_tipo_movil = t.id_tipo_movil
					AND u.estado <> 0
					AND p.estado <> 0
					AND t.estado <> 0
					ORDER BY u.id_movil DESC 
					");
$rs = $db->GetAll($sql);*/

//$smarty->assign("movil", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("moviles.tpl");
?>