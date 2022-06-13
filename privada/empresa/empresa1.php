<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_empresa = $_REQUEST["id_empresa"];
$_nombre = $_POST["nombre"];
$_direccion = $_POST["direccion"];
$_telefono1 = $_POST["telefono1"];
$_telefono2 = $_POST["telefono2"];

$_logo_empresa1 = $_POST["logo_empresa1"];
$_nombre_log = $_FILES['logo_empresa']['name'];

$smarty = new Smarty;
//ESTO ES PARA LA FOTO
if ((!empty($_FILES['logo_empresa'])) and is_uploaded_file($_FILES['logo_empresa']['tmp_name'])) {
	copy($_FILES['logo_empresa']['tmp_name'],'logos/'.$_nombre_log);
	$logo_empresa = $_FILES['logo_empresa']['name'];
}elseif ($_logo_empresa1 == "") {
	$logo_empresa = '';
	$_nombre_log = '';
}else
$_nombre_log = $_logo_empresa1;

$reg = array();
$reg["nombre"] = $_nombre;
$reg["direccion"] = $_direccion;
$reg["telefono1"] = $_telefono1;
$reg["telefono2"] = $_telefono2;
$reg["logo_empresa"] = $_nombre_log;
$reg["_usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("empresa", $reg, "UPDATE", "id_empresa='".$_id_empresa."'");

if ($rs1) {
    $smarty->assign("mensaje", "Los datos se modificaron ACTUALIZAR EL SISTEMA !!!!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("empresa1.tpl");
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se modificaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("empresa1.tpl");
}
?>
