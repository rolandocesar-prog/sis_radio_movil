<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "funciones");

paginacion("funciones.php?", $smarty);

$sql3 = $db->Prepare("SELECT *
					  FROM funciones u, telefonistas_operadoras p
					  WHERE u.id_telefonista_operadora = p.id_telefonista_operadora
					  AND u.estado <> 0
					  AND p.estado <> 0
					  ORDER BY u.id_funcion DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("funciones", $db->GetAll($sql3, array($nElem, $regIni)));

/*$sql = $db->Prepare("SELECT *
					FROM funciones u, telefonistas_operadoras p
					WHERE u.id_telefonista_operadora = p.id_telefonista_operadora
					AND u.estado <> 0
					AND p.estado <> 0
					ORDER BY u.id_funcion DESC 
					");

$rs = $db->GetAll($sql);*/

//$smarty->assign("funciones", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("funciones.tpl");
?>