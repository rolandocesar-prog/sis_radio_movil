<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

//$db->debug=true;

$smarty->assign("direc_css", $direc_css);
$smarty->display("fichas_tec_personas.tpl");
?>