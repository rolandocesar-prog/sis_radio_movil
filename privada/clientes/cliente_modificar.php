<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$_id_cliente = $_REQUEST["id_cliente"];

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM clientes
					WHERE id_cliente = ?
					");

$rs = $db->GetAll($sql, array($_id_cliente));

$smarty->assign("cliente", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("cliente_modificar.tpl");
?>