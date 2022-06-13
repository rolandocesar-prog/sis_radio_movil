<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_tipo_movil = $_REQUEST["id_tipo_movil"];
$_tipo_movil = $_POST["tipo_movil"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["tipo_movil"] = $_tipo_movil;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("tipos_moviles", $reg, "UPDATE", "id_tipo_movil='".$_id_tipo_movil."'");

if ($rs1) {
    header("Location: tipos_moviles.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se modificaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_tipo_movil", $_id_tipo_movil);
    $smarty->display("tipo_movil_modificar1.tpl");
}
?>
