<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_telefonista_operadora = $_REQUEST["id_telefonista_operadora"];
$_id_turno = $_REQUEST["id_turno"];

$_turno = $_POST["turno"];
$_fecha_inicio_tu = $_POST["fecha_inicio_tu"];
$_fecha_fin_tu = $_POST["fecha_fin_tu"];

//db->debug=true; 
$smarty = new Smarty;

$reg = array();
$reg["id_telefonista_operadora"] = $_id_telefonista_operadora;
$reg["turno"] = $_turno;
$reg["fecha_inicio_tu"] = $_fecha_inicio_tu;
$reg["fecha_fin_tu"] = $_fecha_fin_tu;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("turnos", $reg, "UPDATE", "id_turno='".$_id_turno."'");
        
if ($rs1) {
    header("Location: turnos.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_turno", $_id_turno);
    $smarty->display("turno_modificar1.tpl");
}
?>
