<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_usuario = $_REQUEST["id_usuario"];

$smarty = new Smarty;

$db->debug=true;

/*LAS CONSULTAS SE TIENEN QUE HACER CON TODAS LAS TABLAS EN LAS QUE ID_USUARIO ESTA COMO HERENCIA*/
$sql = $db->Prepare("SELECT *
					FROM usuarios_roles
					WHERE id_usuario = ?
					AND estado <> 0
					");
$rs = $db->GetAll($sql, array($_id_usuario));

if (!$rs) {
	$reg = array();
	$reg["estado"] = 0;
	$reg["usuario1"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("usuarios", $reg, "UPDATE", "id_usuario='".$_id_usuario."'");
	header("Location:usuarios.php");
	exit();
}else {
	$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron !!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("usuario_eliminar.tpl");
}
?>