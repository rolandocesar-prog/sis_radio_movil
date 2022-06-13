<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM clientes c, llamadas l, tipo_llamada t, tipos_moviles m
					WHERE c.id_cliente = l.id_cliente
					AND t.id_tipo_llamada = l.id_tipo_llamada
					AND m.id_tipo_movil = l.id_tipo_movil
					AND c.estado <> 0
					AND l.estado <> 0
					AND t.estado <> 0
					AND m.estado <> 0
					");
$rs = $db->GetAll($sql);

$smarty->assign("rpt_cliente_llamada", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("rpt_clientes_llamadas1.tpl");
?>