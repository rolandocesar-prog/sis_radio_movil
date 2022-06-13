<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_telefonista_operadora = $_POST["id_telefonista_operadora"];
$_funcion = $_POST["funcion"];
$_fecha_inicio_fu = $_POST["fecha_inicio_fu"];
$_fecha_fin_fu = $_POST["fecha_fin_fu"];
 
$smarty = new Smarty;

$reg = array();
$reg["id_telefonista_operadora"] = $_id_telefonista_operadora;
$reg["funcion"] = $_funcion;
$reg["fecha_inicio_fu"] = $_fecha_inicio_fu;
$reg["fecha_fin_fu"] = $_fecha_fin_fu;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("funciones", $reg, "INSERT");
        
if ($rs1) {
    header("Location: funciones.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("funcion_nuevo1.tpl");
}
?>
