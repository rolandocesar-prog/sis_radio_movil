<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_socio = $_REQUEST["id_socio"];
$_id_tipo_movil = $_REQUEST["id_tipo_movil"];
$_id_movil = $_REQUEST["id_movil"];

$_num_movil = $_POST["num_movil"];
$_placa = $_POST["placa"];

//db->debug=true; 
$smarty = new Smarty;

$reg = array();
$reg["id_socio"] = $_id_socio;
$reg["id_tipo_movil"] = $_id_tipo_movil;
$reg["num_movil"] = $_num_movil;
$reg["placa"] = $_placa;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("moviles", $reg, "UPDATE", "id_movil='".$_id_movil."'");
        
if ($rs1) {
    header("Location: moviles.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_movil", $_id_movil);
    $smarty->display("movil_modificar1.tpl");
}
?>
