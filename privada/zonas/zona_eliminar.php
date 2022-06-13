<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_zona = $_REQUEST["id_zona"];

$smarty = new Smarty;

//$db->debug=true;

/*LAS CONSULTAS SE TIENEN QUE HACER CON TODAS LAS TABLAS EN LAS QUE ID_PERSONA ESTA COMO HERENCIA*/
$sql = $db->Prepare("SELECT *
					FROM tarif_urbano, tarif_rural 
					WHERE id_zona = ?
					AND estado <> 0
					");
$rs = $db->GetAll($sql, array($_id_zona));

if (!$rs) {
	$reg = array();
	$reg["estado"] = 0;
	$reg["id_usuario"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("zonas", $reg, "UPDATE", "id_zona='".$_id_zona."'");
	header("Location:zonas.php");
	exit();
}else {
	$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron !!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("zona_eliminar.tpl");
}
?>