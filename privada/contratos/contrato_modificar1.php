<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_telefonista_operadora = $_REQUEST["id_telefonista_operadora"];
$_id_contrato = $_REQUEST["id_contrato"];

$_fecha_inicio = $_POST["fecha_inicio"];
$_fecha_fin = $_POST["fecha_fin"];
$_salario = $_POST["salario"];

//db->debug=true; 
$smarty = new Smarty;

$reg = array();
$reg["id_telefonista_operadora"] = $_id_telefonista_operadora;
$reg["fecha_inicio"] = $_fecha_inicio;
$reg["fecha_fin"] = $_fecha_fin;
$reg["salario"] = $_salario;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("contratos", $reg, "UPDATE", "id_contrato='".$_id_contrato."'");
        
if ($rs1) {
    header("Location: contratos.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_contrato", $_id_contrato);
    $smarty->display("contrato_modificar1.tpl");
}
?>
