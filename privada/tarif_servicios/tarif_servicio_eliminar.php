<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_tar_serv = $_REQUEST["id_tar_serv"];

$smarty = new Smarty;

//$db->debug=true;

/*LAS CONSULTAS SE TIENEN QUE HACER CON TODAS LAS TABLAS EN LAS QUE ID_PERSONA ESTA COMO HERENCIA*/
/*$sql = $db->Prepare("SELECT *
					FROM moviles
					WHERE id_socio = ?
					AND estado <> 0
					");
$rs = $db->GetAll($sql, array($_id_socio));*/

/*if (!$rs) {*/
	$reg = array();
	$reg["estado"] = 0;
	$reg["id_usuario"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("tarif_servicios", $reg, "UPDATE", "id_tar_serv='".$_id_tar_serv."'");
	header("Location:tarif_servicios.php");
	exit();
/*}else {
	$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron !!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("socio_eliminar.tpl");
}*/
?>