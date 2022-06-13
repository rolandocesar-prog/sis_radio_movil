<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_tipo_llamada = $_REQUEST["id_tipo_llamada"];
$_descripcion = $_POST["descripcion"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["descripcion"] = $_descripcion;
$reg["_usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("tipo_llamada", $reg, "UPDATE", "id_tipo_llamada='".$_id_tipo_llamada."'");

if ($rs1) {
    header("Location: tipo_llamada.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se modificaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_tipo_llamada", $_id_tipo_llamada);
    $smarty->display("tipo_llamada_modificar1.tpl");
}
?>
