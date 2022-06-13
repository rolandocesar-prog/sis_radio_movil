<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_ci_socio = $_POST["ci_socio"];
$_nombres_socio = $_POST["nombres_socio"];
$_apellidos_socio = $_POST["apellidos_socio"];
$_direc_socio = $_POST["direc_socio"];
$_fecha_alta = $_POST["fecha_alta"];
$_telefono_socio = $_POST["telefono_socio"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_empresa"] = 1;
$reg["ci_socio"] = $_ci_socio;
$reg["nombres_socio"] = $_nombres_socio;
$reg["apellidos_socio"] = $_apellidos_socio;
$reg["direc_socio"] = $_direc_socio;
$reg["fecha_alta"] = $_fecha_alta;
$reg["telefono_socio"] = $_telefono_socio;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("socios", $reg, "INSERT");

if ($rs1) {
    header("Location: socios.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("socio_nuevo1.tpl");
    }
?>
