<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_telefonista_operadora = $_POST["id_telefonista_operadora"];
$_fecha_inicio = $_POST["fecha_inicio"];
$_fecha_fin = $_POST["fecha_fin"];
$_salario = $_POST["salario"];
 
$smarty = new Smarty;

$reg = array();
$reg["id_telefonista_operadora"] = $_id_telefonista_operadora;
$reg["fecha_inicio"] = $_fecha_inicio;
$reg["fecha_fin"] = $_fecha_fin;
$reg["salario"] = $_salario;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("contratos", $reg, "INSERT");
        
if ($rs1) {
    header("Location: contratos.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("contrato_nuevo1.tpl");
}
?>
