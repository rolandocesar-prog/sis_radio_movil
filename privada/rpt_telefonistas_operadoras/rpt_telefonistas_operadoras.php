<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM telefonistas_operadoras t, contratos c, funciones f, turnos u
					WHERE t.id_telefonista_operadora=c.id_telefonista_operadora
					AND t.id_telefonista_operadora=f.id_telefonista_operadora
					AND t.id_telefonista_operadora=u.id_telefonista_operadora
					AND t.estado <> 0
					AND c.estado <> 0
					AND f.estado <> 0
					AND u.estado <> 0
					");
$rs = $db->GetAll($sql);

$smarty->assign("rpt_telefonista_operadora", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("rpt_telefonistas_operadoras.tpl");
?>