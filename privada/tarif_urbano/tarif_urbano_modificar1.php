<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_id_empresa = $_REQUEST["id_empresa"];
$_id_zona = $_REQUEST["id_zona"];
$_id_tar_urb = $_REQUEST["id_tar_urb"];

$_lugar = $_POST["lugar"];
$_una_persona = $_POST["una"];
$_dos_personas = $_POST["dos"];
$_tres_personas = $_POST["tres"];

//db->debug=true; 
$smarty = new Smarty;

$reg = array();
$reg["id_empresa"] = $_id_empresa;
$reg["id_zona"] = $_id_zona;
$reg["lugar"] = $_lugar;
$reg["una_persona"] = $_una_persona;
$reg["dos_personas"] = $_dos_personas;
$reg["tres_personas"] = $_tres_personas;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("tarif_urbano", $reg, "UPDATE", "id_tar_urb='".$_id_tar_urb."'");
        
if ($rs1) {
    header("Location: tarif_urbano.php");
    exit();
}else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->assign("id_tar_urb", $_id_tar_urb);
    $smarty->display("tarif_urbano_modificar1.tpl");
}
?>
