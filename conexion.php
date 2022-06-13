<?php
require_once("adodb/adodb.inc.php");

$direc_css = "../css/estilo.css";

$conServidor 	= "localhost";
$conUsuario 	= "root";
$conClave 		= "";
$conBasededatos = "bd_sistema_andaluz";

$db = ADONewConnection("mysqli");
//$db -> debug = true;
$conex = $db->Connect($conServidor, $conUsuario, $conClave, $conBasededatos);
$db->Execute("SET NAMES 'utf8'");
 ?>