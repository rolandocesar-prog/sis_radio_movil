<?php
error_reporting(0);
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					FROM clientes c
					WHERE c.estado <> 0
					ORDER BY c.id_cliente DESC 
					");
$rs = $db->GetAll($sql);

$sql1 = $db->Prepare("SELECT *
					FROM tipo_llamada t
					WHERE t.estado <> 0
					ORDER BY t.id_tipo_llamada DESC 
					");
$rs1 = $db->GetAll($sql1);

$sql2 = $db->Prepare("SELECT *
					FROM tipos_moviles u
					WHERE u.estado <> 0
					ORDER BY u.id_tipo_movil DESC 
					");
$rs2 = $db->GetAll($sql2);

$smarty->assign("cliente", $rs);
$smarty->assign("tipo_llamada", $rs1);
$smarty->assign("tipo_de_movil", $rs2);
$smarty->assign("direc_css", $direc_css);
$smarty->display("registro_llamada_nuevo.tpl");
?>