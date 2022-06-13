<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_telefonista_operadora = $_POST["id_telefonista_operadora"];
$_turno = $_POST["turno"];
$_fecha_inicio_tu = $_POST["fecha_inicio_tu"];
$_fecha_fin_tu = $_POST["fecha_fin_tu"];
 
$smarty = new Smarty;

$reg = array();
$reg["id_telefonista_operadora"] = $_id_telefonista_operadora;
$reg["turno"] = $_turno;
$reg["fecha_inicio_tu"] = $_fecha_inicio_tu;
$reg["fecha_fin_tu"] = $_fecha_fin_tu;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("turnos", $reg, "INSERT");
        
if ($rs1) {
    header("Location: turnos.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("turno_nuevo1.tpl");
}
?>
