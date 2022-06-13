<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "tarif_urbano");

paginacion("tarif_urbano.php?", $smarty);

/*$sql = $db->Prepare("SELECT *
					  FROM empresa p
					  INNER JOIN tarifario_urbano u ON p.id_empresa = u.id_empresa
					  INNER JOIN zonas t ON u.id_zona = t.id_zona
					  WHERE p.estado <> 0
					  AND u.estado <> 0
					  AND t.estado <> 0
					  ORDER BY u.id_tar_urb DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("tarifario_urbano", $db->GetAll($sql, array($nElem, $regIni)));*/

$sql3 = $db->Prepare("SELECT *
					  FROM tarif_urbano u, empresa p, zonas t
					  WHERE u.id_empresa = p.id_empresa AND u.id_zona = t.id_zona
					  AND u.estado <> 0
					  AND p.estado <> 0
					  AND t.estado <> 0
					  ORDER BY u.id_tar_urb DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("tarifario_urbano", $db->GetAll($sql3, array($nElem, $regIni)));

/*$sql = $db->Prepare("SELECT *
					FROM tarif_urbano u, empresa p, zonas t
					WHERE u.id_empresa = p.id_empresa AND u.id_zona = t.id_zona
					AND u.estado <> 0
					AND p.estado <> 0
					AND t.estado <> 0
					ORDER BY u.id_tar_urb DESC 
					");
$rs = $db->GetAll($sql);*/

//$smarty->assign("tarifario_urbano", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("tarif_urbano.tpl");
?>