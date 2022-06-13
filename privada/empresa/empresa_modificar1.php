<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_empresa = $_REQUEST["id_empresa"];
$_nombre = $_POST["nombre"];
$_direccion = $_POST["direccion"];
$_telefono1 = $_POST["telefono1"];
$_telefono2 = $_POST["telefono2"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["nombre"] = $_nombre;
$reg["direccion"] = $_direccion;
$reg["telefono1"] = $_telefono1;
$reg["telefono2"] = $_telefono2;
$reg["_usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("empresa", $reg, "UPDATE", "id_empresa='".$_id_empresa."'");

if ($rs1) {
    header("Location: empresa.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se modificaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_empresa", $_id_empresa);
    $smarty->display("empresa_modificar1.tpl");
}
?>
