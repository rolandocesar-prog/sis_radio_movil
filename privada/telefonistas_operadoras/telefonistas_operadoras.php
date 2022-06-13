<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "telefonistas_operadoras");

paginacion("telefonistas_operadoras.php?", $smarty);

$sql3 = $db->Prepare("SELECT *
					  FROM empresa p
					  INNER JOIN telefonistas_operadoras u ON p.id_empresa = u.id_empresa
					  WHERE u.estado <> 0
					  AND p.estado <> 0
					  ORDER BY u.id_telefonista_operadora DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("telefonistas_operadoras", $db->GetAll($sql3, array($nElem, $regIni)));

/*$sql3 = $db->Prepare("SELECT *
					  FROM telefonistas_operadoras u, empresa p
					  WHERE u.estado <> 0
					  AND p.estado <> 0
					  ORDER BY u.id_telefonista_operadora DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("telefonistas_operadoras", $db->GetAll($sql3, array($nElem, $regIni)));*/

/*$sql = $db->Prepare("SELECT *
					FROM telefonistas_operadoras u, empresa p
					WHERE u.id_empresa = p.id_empresa
					AND u.estado <> 0
					AND p.estado <> 0
					ORDER BY u.id_telefonista_operadora DESC 
					");
$rs = $db->GetAll($sql);*/

/*$smarty->assign("telefonistas_operadoras", $rs);*/
$smarty->assign("direc_css", $direc_css);
$smarty->display("telefonistas_operadoras.tpl");
?>