<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_conductor = $_REQUEST["id_conductor"];
$_id_movil = $_REQUEST["id_movil"];
$_id_movil_conductor = $_REQUEST["id_movil_conductor"];

$_fecha_inicio = $_POST["fecha_inicio"];
$_hora_inicio = $_POST["hora_inicio"];
$_fecha_fin = $_POST["fecha_fin"];
$_hora_fin = $_POST["hora_fin"];

//db->debug=true; 
$smarty = new Smarty;

$reg = array();
$reg["id_conductor"] = $_id_conductor;
$reg["id_movil"] = $_id_movil;
$reg["fecha_inicio"] = $_fecha_inicio;
$reg["hora_inicio"] = $_hora_inicio;
$reg["fecha_fin"] = $_fecha_fin;
$reg["hora_fin"] = $_hora_fin;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("moviles_conductores", $reg, "UPDATE", "id_movil_conductor='".$_id_movil_conductor."'");
        
if ($rs1) {
    header("Location: moviles_conductores.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_movil_conductor", $_id_movil_conductor);
    $smarty->display("movil_conductor_modificar1.tpl");
}
?>
