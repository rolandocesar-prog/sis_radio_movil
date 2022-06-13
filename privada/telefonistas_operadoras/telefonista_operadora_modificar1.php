<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_telefonista_operadora = $_REQUEST["id_telefonista_operadora"];
$_nombres = $_POST["nombres"];
$_apellidos = $_POST["apellidos"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["nombres"] = $_nombres;
$reg["apellidos"] = $_apellidos;
$reg["_usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("telefonistas_operadoras", $reg, "UPDATE", "id_telefonista_operadora='".$_id_telefonista_operadora."'");

if ($rs1) {
    header("Location: telefonistas_operadoras.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se modificaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_telefonista_operadora", $_id_telefonista_operadora);
    $smarty->display("telefonista_operadora_modificar1.tpl");
}
?>
