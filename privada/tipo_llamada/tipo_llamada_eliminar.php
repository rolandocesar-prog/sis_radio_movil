<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_tipo_llamada = $_REQUEST["id_tipo_llamada"];

$smarty = new Smarty;

//$db->debug=true;

/*LAS CONSULTAS SE TIENEN QUE HACER CON TODAS LAS TABLAS EN LAS QUE ID_PERSONA ESTA COMO HERENCIA*/
$sql = $db->Prepare("SELECT *
					FROM llamadas
					WHERE id_tipo_llamada = ?
					AND estado <> 0
					");
$rs = $db->GetAll($sql, array($_id_tipo_llamada));

if (!$rs) {
	$reg = array();
	$reg["estado"] = 0;
	$reg["id_usuario"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("tipo_llamada", $reg, "UPDATE", "id_tipo_llamada='".$_id_tipo_llamada."'");
	header("Location:tipo_llamada.php");
	exit();
}else {
	$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron !!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("tipo_llamada_eliminar.tpl");
}
?>