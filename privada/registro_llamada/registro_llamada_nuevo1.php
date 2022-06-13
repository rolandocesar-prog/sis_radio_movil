<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$__id_cliente = $_POST["id_cliente"];
$__id_tipo_llamada = $_POST["id_tipo_llamada"];
$__id_tipo_movil = $_POST["id_tipo_movil"];
$__observaciones = $_POST["observaciones"];
 
$smarty = new Smarty;

$reg = array();
$reg["id_cliente"] = $__id_cliente;
$reg["id_tipo_llamada"] = $__id_tipo_llamada;
$reg["id_tipo_movil"] = $__id_tipo_movil;
$reg["observaciones"] = $__observaciones;
$reg["movil_asignado"] = 0;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("registro_llamada", $reg, "INSERT");
        
if ($rs1) {
    header("Location: registro_llamada_nuevo.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("registro_llamada_nuevo1.tpl");
}
?>
