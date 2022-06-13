<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "llamadas");
paginacion("llamadas.php?", $smarty);

$sql = $db->Prepare("SELECT *
					  FROM clientes c
					  INNER JOIN llamadas l ON c.id_cliente = l.id_cliente
					  INNER JOIN tipo_llamada t ON t.id_tipo_llamada = l.id_tipo_llamada
					  INNER JOIN tipos_moviles m ON m.id_tipo_movil = l.id_tipo_movil
					  WHERE c.estado <> 0
					  AND l.estado <> 0
					  AND t.estado <> 0
					  AND m.estado <> 0
					  ORDER BY l.id_llamada DESC
					  LIMIT ? OFFSET ?
					  ");
$smarty->assign("llamada", $db->GetAll($sql, array($nElem, $regIni)));

// $smarty->assign("llamadas", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("llamadas.tpl");
?>