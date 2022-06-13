<?php
session_start();
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
				<th colspan='8'><h1>Datos Persona</h1></th>
			</tr>
	";
foreach($rs3 as $k => $fila){
	echo"<tr>
			<th>CI</th>			
			<th>Apellido Paterno</th>
			<th>Apellido Materno</th>
			<th>Nombres</th>
		</tr>
		<tr>
			<td align='center'>".$fila["ci"]."</td>
			<td>".$fila["ap"]."</td>
			<td>".$fila["am"]."</td>
			<td>".$fila["nombres"]."</td>
		</tr>
		";
}
echo"</table>
	</center>";
	
?>