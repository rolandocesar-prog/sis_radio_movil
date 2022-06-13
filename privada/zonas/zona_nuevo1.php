<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$_zona = $_POST["zona"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_empresa"] = 1;/* esto tiene que seguir en el codigo???????*/
$reg["zona"] = $_zona;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("zonas", $reg, "INSERT");

if ($rs1) {
    header("Location: zonas.php");
    exit();
} else {
    $smarty->assign("mensaje", "ERROR: Los datos no se insertaron !!!!!");
    $smarty->assign("direc_css", $direc_css);
    $smarty->display("zona_nuevo1.tpl");
    }
?>
