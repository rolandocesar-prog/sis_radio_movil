<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_empresa = $_REQUEST["id_empresa"];
$_id_zona = $_REQUEST["id_zona"];
$_id_tar_rur = $_REQUEST["id_tar_rur"];

$_lugar = $_POST["lugar"];
$_tarifa_carrera = $_POST["tarifa_carrera"];

//db->debug=true; 
$smarty = new Smarty;

$reg = array();
$reg["id_empresa"] = $_id_empresa;
$reg["id_zona"] = $_id_zona;
$reg["lugar"] = $_lugar;
$reg["tarifa_carrera"] = $_tarifa_carrera;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("tarif_rural", $reg, "UPDATE", "id_tar_rur='".$_id_tar_rur."'");
        
if ($rs1) {
    header("Location: tarif_rural.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_tar_rur", $_id_tar_rur);
    $smarty->display("tarif_rural_modificar1.tpl");
}
?>
