<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_conductor = $_REQUEST["id_conductor"];
$_ci = $_POST["ci"];
$_nombres = $_POST["nombres"];
$_apellidos = $_POST["apellidos"];
$_licencia = $_POST["licencia"];
$_direccion = $_POST["direccion"];
$_telefono = $_POST["telefono"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["ci"] = $_ci;
$reg["nombres"] = $_nombres;
$reg["apellidos"] = $_apellidos;
$reg["licencia"] = $_licencia;
$reg["direccion"] = $_direccion;
$reg["telefono"] = $_telefono;
$reg["_usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("conductores", $reg, "UPDATE", "id_conductor='".$_id_conductor."'");

if ($rs1) {
    header("Location: conductores.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se modificaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_conductor", $_id_conductor);
    $smarty->display("conductor_modificar1.tpl");
}
?>
