<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_telefonista_operadora = $_REQUEST["id_telefonista_operadora"];

$smarty = new Smarty;

//$db->debug=true;

/*LAS CONSULTAS SE TIENEN QUE HACER CON TODAS LAS TABLAS EN LAS QUE ID_PERSONA ESTA COMO HERENCIA*/
$sql1 = $db->Prepare("SELECT *
					FROM contratos
					WHERE id_telefonista_operadora = ?
					AND estado <> 0
					");
$rs1 = $db->GetAll($sql1, array($_id_telefonista_operadora));

$sql2 = $db->Prepare("SELECT *
					FROM funciones
					WHERE id_telefonista_operadora = ?
					AND estado <> 0
					");
$rs2 = $db->GetAll($sql2, array($_id_telefonista_operadora));

$sql3 = $db->Prepare("SELECT *
					FROM moviles_carreras
					WHERE id_telefonista_operadora = ?
					AND estado <> 0
					");
$rs3 = $db->GetAll($sql3, array($_id_telefonista_operadora));

$sql4 = $db->Prepare("SELECT *
					FROM turnos
					WHERE id_telefonista_operadora = ?
					AND estado <> 0
					");
$rs4 = $db->GetAll($sql4, array($_id_telefonista_operadora));

if (!$rs1 AND !$rs2 AND !$rs3 AND !$rs4) {
	$reg = array();
	$reg["estado"] = 0;
	$reg["id_usuario"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("telefonistas_operadoras", $reg, "UPDATE", "id_telefonista_operadora='".$_id_telefonista_operadora."'");
	header("Location:telefonistas_operadoras.php");
	exit();
}else {
	$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron !!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("telefonista_operadora_eliminar.tpl");
}
?>