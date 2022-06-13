<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_llamada = $_REQUEST["id_llamada"];

$smarty = new Smarty;

//$db->debug=true;

/*LAS CONSULTAS SE TIENEN QUE HACER CON TODAS LAS TABLAS EN LAS QUE EL ID DE LA TABLA ESTA COMO HERENCIA*/
$sql = $db->Prepare("SELECT *
					FROM moviles_carreras
					WHERE id_llamada = ?
					AND estado <> 0
					");
$rs = $db->GetAll($sql, array($_id_llamada));

if (!$rs) {
	$reg = array();
	$reg["estado"] = 0;
	$reg["usuario1"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("llamadas", $reg, "UPDATE", "id_llamada='".$_id_llamada."'");
	header("Location:llamadas.php");
	exit();
}else {
	$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron !!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("llamada_eliminar.tpl");
}
?>