<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_socio = $_POST["id_socio"];
$_id_tipo_movil = $_POST["id_tipo_movil"];
$_num_movil = $_POST["num_movil"];
$_placa = $_POST["placa"];
 
$smarty = new Smarty;

$reg = array();
$reg["id_socio"] = $_id_socio;
$reg["id_tipo_movil"] = $_id_tipo_movil;
$reg["num_movil"] = $_num_movil;
$reg["placa"] = $_placa;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("moviles", $reg, "INSERT");
        
if ($rs1) {
    header("Location: moviles.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("movil_nuevo1.tpl");
}
?>
