<?php
session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

//$db->debug=true;

$sql = $db->Prepare("SELECT *
					FROM socios s, moviles m, tipos_moviles t, moviles_conductores u, conductores c
					WHERE s.id_socio = m.id_socio
					AND t.id_tipo_movil = m.id_tipo_movil
					AND m.id_movil = u.id_movil
					AND c.id_conductor = u.id_conductor
					AND s.estado <> 0
					AND m.estado <> 0
					AND t.estado <> 0
					AND u.estado <> 0
					AND c.estado <> 0
					");
$rs = $db->GetAll($sql);

$smarty->assign("rpt_socio_movil_conductor", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("rpt_socios_moviles_conductores.tpl");
?>