<?php
/* Smarty version 3.1.29, created on 2021-07-22 01:30:31
  from "C:\wamp64\www\sis_movil_andaluz_prototipo\privada\usuarios\ajax_buscar_persona1.php" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_60f8ca376dd920_59787758',
  'file_dependency' => 
  array (
    'ac8050cea975462d95e56b0d30eef7450c4b268e' => 
    array (
      0 => 'C:\\wamp64\\www\\sis_movil_andaluz_prototipo\\privada\\usuarios\\ajax_buscar_persona1.php',
      1 => 1626746182,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60f8ca376dd920_59787758 ($_smarty_tpl) {
echo '<?php
';?>session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../../resaltarBusqueda.inc.php");

$id_persona = $_POST['id_persona'];

//$db->debug=true;
$sql3 = $db->Prepare("SELECT *
					FROM personas
					WHERE id_persona = ?
					AND estado <> 0
					");
$rs3 = $db->GetAll($sql3, array($id_persona));

echo"<center>
		<table width='60%' border='1'>
			<tr>
				<th colspan='4'>Datos Persona</th>
			</tr>
	";
foreach($rs3 as $k => $fila){
	echo"<tr>
			<td align='center'>".$fila["ci"]."</td>
			<td>".$fila["ap"]."</td>
			<td>".$fila["am"]."</td>
			<td>".$fila["nombres"]."</td>
		</tr>";
}
echo"</table>
	</center>";
	
<?php echo '?>';
}
}
