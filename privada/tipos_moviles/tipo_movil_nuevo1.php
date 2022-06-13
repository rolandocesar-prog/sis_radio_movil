<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_tipo_movil = $_POST["tipo_movil"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_empresa"] = 1;/*esto tiene que seguir*/
$reg["tipo_movil"] = $_tipo_movil;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("tipos_moviles", $reg, "INSERT");

if ($rs1) {
    header("Location: tipos_moviles.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("tipo_movil_nuevo1.tpl");
    }
?>
