<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_movil = $_REQUEST["id_movil"];

$smarty = new Smarty;

//$db->debug=true;

/*LAS CONSULTAS SE TIENEN QUE HACER CON TODAS LAS TABLAS EN LAS QUE ID_MOVIL ESTA COMO HERENCIA*/
$sql = $db->Prepare("SELECT *
					FROM moviles_conductores
					WHERE id_movil = ?
					AND estado <> 0
					");
$rs = $db->GetAll($sql, array($_id_movil));

if (!$rs) {
	$reg = array();
	$reg["estado"] = 0;
	$reg["usuario1"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("moviles", $reg, "UPDATE", "id_movil='".$_id_movil."'");
	header("Location:moviles.php");
	exit();
}else {
	$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron !!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("movil_eliminar.tpl");
}
?>