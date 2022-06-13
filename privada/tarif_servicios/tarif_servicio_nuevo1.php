<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_tipo = $_POST["tipo"];
$_tarifa = $_POST["tarifa"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_empresa"] = 1;
$reg["tipo"] = $_tipo;
$reg["tarifa"] = $_tarifa;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("tarif_servicios", $reg, "INSERT");

if ($rs1) {
    header("Location: tarif_servicios.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("tarif_servicio_nuevo1.tpl");
    }
?>
