<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_nombres = $_POST["nombres"];
$_apellidos = $_POST["apellidos"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_empresa"] = 1;
$reg["nombres"] = $_nombres;
$reg["apellidos"] = $_apellidos;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("telefonistas_operadoras", $reg, "INSERT");

if ($rs1) {
    header("Location: telefonistas_operadoras.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("telefonista_operadora_nuevo1.tpl");
    }
?>
