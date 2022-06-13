<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_conductor = $_POST["id_conductor"];
$_id_movil = $_POST["id_movil"];
$_fecha_inicio = $_POST["fecha_inicio"];
$_hora_inicio = $_POST["hora_inicio"];
$_fecha_fin = $_POST["fecha_fin"];
$_hora_fin = $_POST["hora_fin"];
 
$smarty = new Smarty;

$reg = array();
$reg["id_conductor"] = $_id_conductor;
$reg["id_movil"] = $_id_movil;
$reg["fecha_inicio"] = $_fecha_inicio;
$reg["hora_inicio"] = $_hora_inicio;
$reg["fecha_fin"] = $_fecha_fin;
$reg["hora_fin"] = $_hora_fin;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("moviles_conductores", $reg, "INSERT");
        
if ($rs1) {
    header("Location: moviles_conductores.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("movil_conductor_nuevo1.tpl");
}
?>
