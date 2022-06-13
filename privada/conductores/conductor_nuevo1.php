<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_ci = $_POST["ci"];
$_nombres = $_POST["nombres"];
$_apellidos = $_POST["apellidos"];
$_licencia = $_POST["licencia"];
$_direccion = $_POST["direccion"];
$_telefono = $_POST["telefono"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_empresa"] = 1; /* esto tiene que seguir?????*/
$reg["ci"] = $_ci;
$reg["nombres"] = $_nombres;
$reg["apellidos"] = $_apellidos;
$reg["licencia"] = $_licencia;
$reg["direccion"] = $_direccion;
$reg["telefono"] = $_telefono;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("conductores", $reg, "INSERT");

if ($rs1) {
    header("Location: conductores.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("conductor_nuevo1.tpl");
    }
?>
