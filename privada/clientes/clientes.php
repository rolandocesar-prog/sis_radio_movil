<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "clientes");

paginacion("clientes.php?", $smarty);

$sql3 = $db->Prepare("SELECT *
					  FROM empresa p
					  INNER JOIN clientes u ON p.id_empresa = u.id_empresa
					  WHERE p.estado <> 0
					  AND u.estado <> 0
					  ORDER BY id_cliente DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("clientes", $db->GetAll($sql3, array($nElem, $regIni)));

/*$sql3 = $db->Prepare("SELECT *
					  FROM clientes u, empresa p
					  WHERE p.id_empresa = u.id_empresa
					  AND p.estado <> 0
					  AND u.estado <> 0
					  ORDER BY id_cliente DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("clientes", $db->GetAll($sql3, array($nElem, $regIni)));*/

/*$sql = $db->Prepare("SELECT *
					FROM clientes u, empresa p
					WHERE u.id_empresa = p.id_empresa
					AND u.estado <> 0
					AND p.estado <> 0
					ORDER BY u.id_cliente DESC 
					");

$rs = $db->GetAll($sql);*/

//$smarty->assign("clientes", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("clientes.tpl");
?>