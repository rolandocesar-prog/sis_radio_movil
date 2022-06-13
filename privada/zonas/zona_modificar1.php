<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_zona = $_REQUEST["id_zona"];
$_zona = $_POST["zona"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["zona"] = $_zona;
$reg["_usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("zonas", $reg, "UPDATE", "id_zona='".$_id_zona."'");

if ($rs1) {
    header("Location: zonas.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se modificaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_zona", $_id_zona);
    $smarty->display("zona_modificar1.tpl");
}
?>
