<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../../resaltarBusqueda.inc.php");

$num_movil = strip_tags(stripslashes($_POST["num_movil"]));
$placa = strip_tags(stripslashes($_POST["placa"]));

//$db->debug=true;

if ($num_movil or $placa){
	$sql3 = $db->Prepare("SELECT *
						FROM moviles
						WHERE num_movil LIKE ?
						AND placa LIKE ?
						AND estado <> 0
						");
	$rs3 = $db->GetAll($sql3, array($num_movil."%", $placa."%"));
	if($rs3){
		echo"<center>
				<table class='listado' border='1'>
					<tr>
						<th>NUMERO DE MOVIL</th><th>PLACA</th>
						<th><img src='../../img/modificar.png'></th><th><img src='../../img/borrar.png'></th>
					</tr>";
			foreach ($rs3 as $k => $fila) {
						$str = $fila["num_movil"];
						$str1 = $fila["placa"];
					echo"<tr>
							<td>".resaltar($num_movil, $str)."</td>
							<td>".resaltar($placa, $str1)."</td>
							<td align='center'>
								<form name='formModif".$fila["id_movil"]."' method='post' action='movil_modificar.php'>
									<input type='hidden' name='id_movil' value='".$fila['id_movil']."'>
									<a href='javascript:document.formModif".$fila['id_movil'].".submit();' title='Modificar Movil Sistema'>
										Modificar
									</a>
								</form>
							</td>
							<td align='center'>
								<form name='formElimi".$fila["id_movil"]."' method='post' action='movil_eliminar.php'>
									<input type='hidden' name='id_movil' value='".$fila["id_movil"]."'>
									<a href='javascript:document.formElimi".$fila['id_movil'].".submit();' title='Elminar movil Sistema'
										onclick='javascript:return(confirm( Desea realmente Eliminar al movil...?))';
										location.href='movil_eliminar.php''>
										Eliminar
									</a>
								</form>
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