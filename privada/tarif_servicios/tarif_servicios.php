<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "tarif_servicios");

paginacion("tarif_servicios.php?", $smarty);

$sql3 = $db->Prepare("SELECT *
					  FROM empresa p
					  INNER JOIN tarif_servicios u ON p.id_empresa = u.id_empresa
					  WHERE p.estado <> 0
					  AND u.estado <> 0
					  ORDER BY u.id_tar_serv DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("tarif_servicios", $db->GetAll($sql3, array($nElem, $regIni)));

/*$sql3 = $db->Prepare("SELECT *
					  FROM tarif_servicios u, empresa p
					  WHERE u.id_empresa = p.id_empresa
					  AND u.estado <> 0
					  AND p.estado <> 0
					  ORDER BY u.id_tar_serv DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("tarif_servicios", $db->GetAll($sql3, array($nElem, $regIni)));*/

/*$sql = $db->Prepare("SELECT *
					FROM tarif_servicios u, empresa p
					WHERE u.id_empresa = p.id_empresa
					AND u.estado <> 0
					AND p.estado <> 0
					ORDER BY u.id_tar_serv DESC 
					");
$rs = $db->GetAll($sql);*/

//$smarty->assign("tarif_servicios", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("tarif_servicios.tpl");
?>