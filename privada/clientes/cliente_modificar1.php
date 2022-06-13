<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_cliente = $_REQUEST["id_cliente"];
$_nombres = $_POST["nombres"];
$_apellidos = $_POST["apellidos"];
$_direc_cliente = $_POST["direc_cliente"];
$_telefono = $_POST["telefono"];
$_recomendaciones = $_POST["recomendaciones"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["nombres"] = $_nombres;
$reg["apellidos"] = $_apellidos;
$reg["direc_cliente"] = $_direc_cliente;
$reg["telefono"] = $_telefono;
$reg["recomendaciones"] = $_recomendaciones;
$reg["_usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("clientes", $reg, "UPDATE", "id_cliente='".$_id_cliente."'");

if ($rs1) {
    header("Location: clientes.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se modificaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_cliente", $_id_cliente);
    $smarty->display("cliente_modificar1.tpl");
}
?>
