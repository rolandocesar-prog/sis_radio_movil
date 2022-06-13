<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../../resaltarBusqueda.inc.php");

$apellidos = strip_tags(stripslashes($_POST["apellidos"]));
$nombres = strip_tags(stripslashes($_POST["nombres"]));
$direc_cliente = strip_tags(stripslashes($_POST["direc_cliente"]));
$telefono = strip_tags(stripslashes($_POST["telefono"]));

// $db->debug=true;

if ($apellidos or $nombres or $direc_cliente or $telefono){
	$sql3 = $db->Prepare("SELECT *
						FROM clientes
						WHERE apellidos LIKE ?
						AND nombres LIKE ?
						AND direc_cliente LIKE ?
						AND telefono LIKE ?
						AND estado <> 0
						");
	$rs3 = $db->GetAll($sql3, array($apellidos."%", $nombres."%", $direc_cliente."%", $telefono."%"));

	if($rs3){
		echo"<center>
				<table width='60%' class='listado' border='1'>
					<tr>
						<th>APELLIDOS</th><th>NOMBRES</th><th>DIRECCION</th><th>TELEFONO</th>
					</tr>";
					foreach ($rs3 as $k => $fila) {
						$str = $fila["apellidos"];
						$str1 = $fila["nombres"];
						$str2 = $fila["direc_cliente"];
						$str3 = $fila["telefono"];
					echo"<tr>
							<td align='center'>".resaltar($apellidos, $str)."</td>
							<td>".resaltar($nombres, $str1)."</td>
							<td>".resaltar($direc_cliente, $str2)."</td>
							<td>".resaltar($telefono, $str3)."</td>
							<td align='center'>
								<input type='radio' name='opcion' value='' onClick='buscar_cliente(".$fila["id_cliente"].")'>
							</td>
						</tr>";
			}
			echo "</table>
			</center>";
	} else {
		echo"<center><h1>EL CLIENTE NO EXISTE !!!</h1></center><br>";
		echo"<center>
				<table class='listado'>
					<tr>
						<td><b>Apellidos<b/></td>
						<td><input type='text' name='apellidos1' size='20' onkeyup='this.value=this.value.toUpperCase()'></td>
					</tr>
					<tr>
						<td><b>Nombres<b/></td>
						<td><input type='text' name='nombres1' size='20' onkeyup='this.value=this.value.toUpperCase()'></td>
					</tr>
					<tr>
						<td><b>Direccion<b/></td>
						<td><input type='text' name='direc_cliente1' size='20' onkeyup='this.value=this.value.toUpperCase()'>
						</td>
					</tr>
					<tr>
						<td><b>Telefono<b/></td>
						<td><input type='text' name='telefono1' size='20'>
						</td>
					</tr>
					<tr>
						<td align='center' colspan='2'>
							<input type='button' class='boton' value='Guardar' onClick='insertar_cliente()'>
						</td>
					</tr>
				</table>
				</center>
					";
	}
}
?>