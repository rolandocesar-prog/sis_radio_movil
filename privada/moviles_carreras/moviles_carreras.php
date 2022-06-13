<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "moviles_carreras");

paginacion("moviles_carreras.php?", $smarty);

$sql3 = $db->Prepare("SELECT *
					FROM moviles_carreras c, llamadas u, clientes p, tipo_llamada t, tipos_moviles m
					WHERE u.id_cliente = p.id_cliente 
					AND u.id_tipo_llamada = t.id_tipo_llamada 
					AND m.id_tipo_movil = u.id_tipo_movil
					AND u.id_llamada = c.id_llamada
					AND u.estado <> 0
					AND p.estado <> 0
					AND t.estado <> 0
					AND m.estado <> 0
					ORDER BY u.id_llamada ASC
					LIMIT ? OFFSET ?
					  ");
$smarty->assign("moviles_carreras", $db->GetAll($sql3, array($nElem, $regIni)));


/*$sql = $db->Prepare("SELECT *
					FROM moviles_carreras u, llamadas p, telefonistas_operadoras t
					WHERE u.id_llamada = p.id_llamada AND u.id_telefonista_operadora = t.id_telefonista_operadora
					AND u.estado <> 0
					AND p.estado <> 0
					AND t.estado <> 0
					ORDER BY u.id_movil_carrera DESC 
					");
$rs = $db->GetAll($sql);*/

//$smarty->assign("moviles_carreras", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("moviles_carreras.tpl");
?>