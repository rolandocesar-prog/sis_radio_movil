<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../../resaltarBusqueda.inc.php");

$ap = strip_tags(stripslashes($_POST["ap"]));
$am = strip_tags(stripslashes($_POST["am"]));
$nombres = strip_tags(stripslashes($_POST["nombres"]));
$ci = strip_tags(stripslashes($_POST["ci"]));

// $db->debug=true;

if ($ap or $am or $nombres or $ci){
	$sql3 = $db->Prepare("SELECT *
						FROM personas
						WHERE ap LIKE ?
						AND am LIKE ?
						AND nombres LIKE ?
						AND ci LIKE ?
						AND estado <> 0
						");
	$rs3 = $db->GetAll($sql3, array($ap."%", $am."%", $nombres."%", $ci."%"));

	if($rs3){
		echo"<center>
				<table width='60%' class='listado' border='1'>
					<tr>
						<th>C.I.</th><th>PATERNO</th><th>MATERNO</th><th>NOMBRES</th>
					</tr>";
					foreach ($rs3 as $k => $fila) {
						$str = $fila["ci"];
						$str1 = $fila["ap"];
						$str2 = $fila["am"];
						$str3 = $fila["nombres"];
					echo"<tr>
							<td align='center'>".resaltar($ci, $str)."</td>
							<td>".resaltar($ap, $str1)."</td>
							<td>".resaltar($am, $str2)."</td>
							<td>".resaltar($nombres, $str3)."</td>
							<td align='center'>
								<input type='radio' name='opcion' value='' onClick='buscar_persona(".$fila["id_persona"].")'>
							</td>
						</tr>";
			}
			echo "</table>
			</center>";
	} else {
		echo"<center><h1>LA PERSONA NO EXISTE !!!</h1></center><br>";
		echo"<center>
				<table class='listado'>
					<tr>
						<td><b>C.I.<b/></td>
						<td><input type='text' name='ci1' size='20'></td>
					</tr>
					<tr>
						<td><b>Paterno<b/></td>
						<td><input type='text' name='ap1' size='20' onkeyup='this.value=this.value.toUpperCase()'></td>
					</tr>
					<tr>
						<td><b>Materno<b/></td>
						<td><input type='text' name='am1' size='20' onkeyup='this.value=this.value.toUpperCase()'>
						</td>
					</tr>
					<tr>
						<td><b>Nombres<b/></td>
						<td><input type='text' name='nombres1' size='20' onkeyup='this.value=this.value.toUpperCase()'>
						</td>
					</tr>
					<tr>
						<td><b>Direccion<b/></td>
						<td><input type='text' name='direccion1' size='20' onkeyup='this.value=this.value.toUpperCase()'>
						</td>
					</tr>
					<tr>
						<td><b>Telefono<b/></td>
						<td><input type='text' name='telefono1' size='20'></td>
					</tr>
					<tr>
						<td><b>Genero<b/></td>
						<td>
							<input type='radio' name='genero1' size='20'>Femenino
							<input type='radio' name='genero1' size='20'>Masculino<br>
						</td>
					</tr>
					<tr>
						<td align='center' colspan='2'>
							<input type='button' class='boton' value='Guardar' onClick='insertar_persona()'>
						</td>
					</tr>
				</table>
				</center>
					";
	}
}
?>