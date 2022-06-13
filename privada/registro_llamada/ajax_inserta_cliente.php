<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$apellidos1 = $_POST["apellidos1"];
$nombres1 = $_POST["nombres1"];
$direc_cliente1 = $_POST["direc_cliente1"];
$telefono1 = $_POST["telefono1"];

//$db->debug=true;

$reg = array();
$reg["id_empresa"] = 1;
$reg["apellidos"] = $apellidos1;
$reg["nombres"] = $nombres1;
$reg["direc_cliente"] = $direc_cliente1;
$reg["telefono"] = $telefono1;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = 1;
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("clientes", $reg, "INSERT");

?>