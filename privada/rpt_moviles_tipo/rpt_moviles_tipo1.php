<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$tipo_movil = $_REQUEST["tipo_movil"];

$smarty = new Smarty;
//$db->debug=true;
if($tipo_movil == "T"){
	$sql = $db->Prepare("SELECT *
						FROM tipos_moviles t, socios s, moviles m
						WHERE s.id_socio = m.id_socio AND t.id_tipo_movil = m.id_tipo_movil 
						AND t.estado <> 0
						AND s.estado <> 0
						AND m.estado <> 0
						ORDER BY m.num_movil
						");
	$rs = $db->GetAll($sql);
} else {
	if ($tipo_movil =='A') {
		$tipo_movil = 'AUTO';
	}else{
		$tipo_movil = 'VAGONETA';
	}
	$sql = $db->Prepare("SELECT *
					FROM tipos_moviles t, socios s, moviles m
					WHERE tipo_movil = ?
					AND s.id_socio = m.id_socio AND t.id_tipo_movil = m.id_tipo_movil
					AND t.estado <> 0
					AND s.estado <> 0
					AND m.estado <> 0
					ORDER BY m.num_movil
					");
	$rs = $db->GetAll($sql, array($tipo_movil));
}
$fecha = date("Y-m-d H:i:s");
$smarty->assign("tipos_movil1", $rs);
$smarty->assign("fecha", $fecha);
$smarty->assign("direc_css", $direc_css);
$smarty->display("rpt_moviles_tipo1.tpl");
?>