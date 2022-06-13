<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../../resaltarBusqueda.inc.php");

$id_cliente = $_POST['id_cliente'];

//$db->debug=true;

$sql3 = $db->Prepare("SELECT *
					FROM clientes
					WHERE id_cliente = ?
					AND estado <> 0
					");
$rs3 = $db->GetAll($sql3, array($id_cliente));

echo"<center>
		<table width='60%' border='1'>
			<tr>
				<th colspan='8'><h1>Datos Cliente</h1></th>
			</tr>
	";
foreach($rs3 as $k => $fila){
	echo"<tr>
			<th>Apellidos</th>			
			<th>Nombres</th>
			<th>Direccion</th>
			<th>Telefono</th>
		</tr>
		<tr>
			<td align='center'>".$fila["apellidos"]."</td>
			<td>".$fila["nombres"]."</td>
			<td>".$fila["direc_cliente"]."</td>
			<td>".$fila["telefono"]."</td>
		</tr>
		";
}
echo"</table>
	</center>";
	
?>