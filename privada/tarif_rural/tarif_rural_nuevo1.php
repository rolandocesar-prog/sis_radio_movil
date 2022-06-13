<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_empresa = $_POST["id_empresa"];
$_id_zona = $_POST["id_zona"];
$_lugar = $_POST["lugar"];
$_tarifa_carrera = $_POST["tarifa_carrera"];
 
$smarty = new Smarty;

$reg = array();
$reg["id_empresa"] = $_id_empresa;
$reg["id_zona"] = $_id_zona;
$reg["lugar"] = $_lugar;
$reg["tarifa_carrera"] = $_tarifa_carrera;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("tarif_rural", $reg, "INSERT");
        
if ($rs1) {
    header("Location: tarif_rural.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("tarif_rural_nuevo1.tpl");
}
?>
