<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_cliente = $_POST["id_cliente"];
$_id_tipo_llamada = $_POST["id_tipo_llamada"];
$_id_tipo_movil = $_POST["id_tipo_movil"];
$_observaciones = $_POST["observaciones"];
 
$smarty = new Smarty;

$reg = array();
$reg["id_cliente"] = $_id_cliente;
$reg["id_tipo_llamada"] = $_id_tipo_llamada;
$reg["id_tipo_movil"] = $_id_tipo_movil;
$reg["movil_asignado"] = 0;
$reg["estado_llamada"] = "PENDIENTE";
$reg["observaciones"] = $_observaciones;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("llamadas", $reg, "INSERT");
        
if ($rs1) {
    header("Location: llamadas.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("llamada_nuevo1.tpl");
}
?>
