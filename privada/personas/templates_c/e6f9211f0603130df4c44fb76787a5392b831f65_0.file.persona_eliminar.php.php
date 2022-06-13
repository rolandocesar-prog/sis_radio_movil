<?php
/* Smarty version 3.1.29, created on 2020-04-08 12:10:05
  from "C:\wamp64\www\sis_movil_andaluz_1\privada\personas\persona_eliminar.php" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5e8dbf1d7e5e25_67032841',
  'file_dependency' => 
  array (
    'e6f9211f0603130df4c44fb76787a5392b831f65' => 
    array (
      0 => 'C:\\wamp64\\www\\sis_movil_andaluz_1\\privada\\personas\\persona_eliminar.php',
      1 => 1586347793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8dbf1d7e5e25_67032841 ($_smarty_tpl) {
echo '<?php
';?>session_start();

require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");

$__id_persona = $_REQUEST["id_persona"];

$smarty = new Smarty;

//$db->debug=true;

/*LAS CONSULTAS SE TIENEN QUE HACER CON TODAS LAS TABLAS EN LAS QUE ID_PERSONA ESTA COMO HERENCIA*/
$sql = $db->Prepare("SELECT *
					FROM usuarios
					WHERE id_persona = ?
					AND estado <> 0
					");
$rs = $db->GetAll($sql, array($__id_persona));

if (!$rs) {
	$reg = array();
	$reg["estado"] = 0;
	$reg["id_usuario"] = $_SESSION["sesion_id_usuario"];
	$rs1 = $db->AutoExecute("personas", $reg, "UPDATE", "id_persona='".$__id_persona."'");
	header("Location:personas.php");
	exit();
}else {
	$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron !!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("persona_eliminar.php");
}
<?php echo '?>';
}
}
