<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_tar_serv = $_REQUEST["id_tar_serv"];
$_tipo = $_POST["tipo"];
$_tarifa = $_POST["tarifa"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["tipo"] = $_tipo;
$reg["tarifa"] = $_tarifa;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("tarif_servicios", $reg, "UPDATE", "id_tar_serv='".$_id_tar_serv."'");

if ($rs1) {
    header("Location: tarif_servicios.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se modificaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_tar_serv", $_id_tar_serv);
    $smarty->display("tarif_servicio_modificar1.tpl");
}
?>
