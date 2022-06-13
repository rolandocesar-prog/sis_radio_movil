<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_llamada = $_REQUEST["id_llamada"];
$_id_telefonista_operadora = $_REQUEST["id_telefonista_operadora"];
$_id_movil_carrera = $_REQUEST["id_movil_carrera"];

$_hora_movil_carrera = $_POST["hora_movil_carrera"];
$_fecha_movil_carrera = $_POST["fecha_movil_carrera"];

//db->debug=true; 
$smarty = new Smarty;

$reg = array();
$reg["id_llamada"] = $_id_llamada;
$reg["id_telefonista_operadora"] = $_id_telefonista_operadora;
$reg["hora_movil_carrera"] = $_hora_movil_carrera;
$reg["fecha_movil_carrera"] = $_fecha_movil_carrera;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("moviles_carreras", $reg, "UPDATE", "id_movil_carrera='".$_id_movil_carrera."'");
        
if ($rs1) {
    header("Location: moviles_carreras.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_movil_carrera", $_id_movil_carrera);
    $smarty->display("movil_carrera_modificar1.tpl");
}
?>
