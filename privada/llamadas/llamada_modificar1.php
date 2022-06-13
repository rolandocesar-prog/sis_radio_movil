<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_cliente = $_REQUEST["id_cliente"];
$_id_tipo_llamada = $_REQUEST["id_tipo_llamada"];
$_id_tipo_movil = $_REQUEST["id_tipo_movil"];
$_id_llamada = $_REQUEST["id_llamada"];

$_movil_asignado = $_POST["movil_asignado"];
$_estado_llamada = $_POST["estado_llamada"];
$_observaciones = $_POST["observaciones"];

//db->debug=true; 
$smarty = new Smarty;

$reg = array();
$reg["id_cliente"] = $_id_cliente;
$reg["id_tipo_llamada"] = $_id_tipo_llamada;
$reg["id_tipo_movil"] = $_id_tipo_movil;
$reg["movil_asignado"] = $_movil_asignado;
$reg["estado_llamada"] = $_estado_llamada;
$reg["observaciones"] = $_observaciones;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("llamadas", $reg, "UPDATE", "id_llamada='".$_id_llamada."'");
        
if ($rs1) {
    header("Location: llamadas.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_llamada", $_id_llamada);
    $smarty->display("llamada_modificar1.tpl");
}
?>
