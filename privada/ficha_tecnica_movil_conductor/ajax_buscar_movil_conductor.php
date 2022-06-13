<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../../resaltarBusqueda.inc.php");

$num_movil = strip_tags(stripslashes($_POST["num_movil"]));
$placa = strip_tags(stripslashes($_POST["placa"]));
$nombres = strip_tags(stripslashes($_POST["nombres"]));
$apellidos = strip_tags(stripslashes($_POST["apellidos"]));

//$db->debug=true;
if ($num_movil or $placa or $nombres or $apellidos){
	$sql3 = $db->Prepare("SELECT *
						FROM moviles m, conductores c, moviles_conductores mc
						WHERE m.id_movil=mc.id_movil AND c.id_conductor=mc.id_conductor 
						AND num_movil LIKE ?
						AND placa LIKE ?
						AND nombres LIKE ?
						AND apellidos LIKE ?
						AND m.estado <> 0
						AND c.estado <> 0
						AND mc.estado <> 0
						");
	$rs3 = $db->GetAll($sql3, array($num_movil."%", $placa."%", $nombres."%", $apellidos."%"));
	if($rs3){
		echo"<center>
				<table class='listado' border='1'>
					<tr>
						<th>NUMERO DE MOVIL</th><th>PLACA</th><th>NOMBRES</th><th>APELLIDOS</th><th>SELECCIONE</th>
					</tr>";
			foreach ($rs3 as $k => $fila) {
						$str = $fila["num_movil"];
						$str1 = $fila["placa"];
						$str2 = $fila["nombres"];
						$str3 = $fila["apellidos"];
					echo"<tr>
							<td align='center'>".resaltar($num_movil, $str)."</td>
							<td>".resaltar($placa, $str1)."</td>
							<td>".resaltar($nombres, $str2)."</td>
							<td>".resaltar($apellidos, $str3)."</td>
							<td align='center'>
								<input type='radio' name='seleccione' value='".$fila['id_movil']."'onclick='mostrar(".$fila["id_movil"].")'> 
							</td>
						</tr>";
			}
			echo "</table>
			</center>";
	} else {
		echo"<center><b> EL MOVIL NO EXISTE !!!</b></center><br>";
	}
}
?>