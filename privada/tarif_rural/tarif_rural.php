<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "tarif_rural");

paginacion("tarif_rural.php?", $smarty);

$sql3 = $db->Prepare("SELECT *
					  FROM tarif_rural u, empresa p, zonas t
					  WHERE u.id_empresa = p.id_empresa AND u.id_zona = t.id_zona
					  AND u.estado <> 0
					  AND p.estado <> 0
					  AND t.estado <> 0
					  ORDER BY u.id_tar_rur DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("tarifario_rural", $db->GetAll($sql3, array($nElem, $regIni)));

/*$sql = $db->Prepare("SELECT *
					FROM tarif_rural u, empresa p, zonas t
					WHERE u.id_empresa = p.id_empresa AND u.id_zona = t.id_zona
					AND u.estado <> 0
					AND p.estado <> 0
					AND t.estado <> 0
					ORDER BY u.id_tar_rur DESC 
					");
$rs = $db->GetAll($sql);*/

//$smarty->assign("tarifario_rural", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("tarif_rural.tpl");
?>