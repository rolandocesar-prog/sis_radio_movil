<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$fecha1 = $_REQUEST["fecha1"];
$fecha2 = $_REQUEST["fecha2"];
$descripcion = $_REQUEST["descripcion"];

$smarty = new Smarty;

// $db->debug=true;

if($descripcion == "T"){
	$sql = $db->Prepare("SELECT *
					FROM clientes c, tipo_llamada t, llamadas l, tipos_moviles m
					WHERE l.fec_insercion BETWEEN ? AND ?
					AND c.id_cliente = l.id_cliente
					AND t.id_tipo_llamada = l.id_tipo_llamada
					AND m.id_tipo_movil = l.id_tipo_movil
					AND c.estado <> 0
					AND t.estado <> 0
					AND l.estado = 0
					AND m.estado <> 0
					ORDER BY l.fec_insercion ASC
						");
	$rs = $db->GetAll($sql, array($fecha1, $fecha2));
} else {
	if ($descripcion =='L') {
		$descripcion = 'LLAMADA';
	}else{
		$descripcion = 'SERVICIO';
	}
	$sql = $db->Prepare("SELECT *
					FROM clientes c, tipo_llamada t, llamadas l, tipos_moviles m
					WHERE l.fec_insercion BETWEEN ? AND ?
					AND t.descripcion = ?
					AND c.id_cliente = l.id_cliente
					AND t.id_tipo_llamada = l.id_tipo_llamada
					AND m.id_tipo_movil = l.id_tipo_movil
					AND c.estado <> 0
					AND t.estado <> 0
					AND l.estado = 0
					AND m.estado <> 0
					ORDER BY l.fec_insercion ASC
					");
	$rs = $db->GetAll($sql, array($fecha1, $fecha2, $descripcion));
}

$fecha = date("Y-m-d H:i:s");
$smarty->assign("llamadas_canceladas1", $rs);
$smarty->assign("fecha", $fecha);
$smarty->assign("direc_css", $direc_css);
$smarty->display("rpt_llamadas_canceladas1.tpl");
?>