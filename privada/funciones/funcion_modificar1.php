<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_telefonista_operadora = $_REQUEST["id_telefonista_operadora"];
$_id_funcion = $_REQUEST["id_funcion"];

$_funcion = $_POST["funcion"];
$_fecha_inicio_fu = $_POST["fecha_inicio_fu"];
$_fecha_fin_fu = $_POST["fecha_fin_fu"];

//db->debug=true; 
$smarty = new Smarty;

$reg = array();
$reg["id_telefonista_operadora"] = $_id_telefonista_operadora;
$reg["funcion"] = $_funcion;
$reg["fecha_inicio_fu"] = $_fecha_inicio_fu;
$reg["fecha_fin_fu"] = $_fecha_fin_fu;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("funciones", $reg, "UPDATE", "id_funcion='".$_id_funcion."'");
        
if ($rs1) {
    header("Location: funciones.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_funcion", $_id_funcion);
    $smarty->display("funcion_modificar1.tpl");
}
?>
