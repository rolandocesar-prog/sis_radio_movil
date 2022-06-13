<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_socio = $_REQUEST["id_socio"];
$_ci_socio = $_POST["ci_socio"];
$_nombres_socio = $_POST["nombres_socio"];
$_apellidos_socio = $_POST["apellidos_socio"];
$_direc_socio = $_POST["direc_socio"];
$_fecha_alta = $_POST["fecha_alta"];
$_telefono_socio = $_POST["telefono_socio"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["ci_socio"] = $_ci_socio;
$reg["nombres_socio"] = $_nombres_socio;
$reg["apellidos_socio"] = $_apellidos_socio;
$reg["direc_socio"] = $_direc_socio;
$reg["fecha_alta"] = $_fecha_alta;
$reg["telefono_socio"] = $_telefono_socio;
$reg["_usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("socios", $reg, "UPDATE", "id_socio='".$_id_socio."'");

if ($rs1) {
    header("Location: socios.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se modificaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_socio", $_id_socio);
    $smarty->display("socio_modificar1.tpl");
}
?>
