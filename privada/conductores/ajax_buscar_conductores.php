<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../../resaltarBusqueda.inc.php");

$apellidos = strip_tags(stripslashes($_POST["apellidos"]));
$nombres = strip_tags(stripslashes($_POST["nombres"]));

//$db->debug=true;

if ($apellidos or $nombres){
	$sql3 = $db->Prepare("SELECT *
						FROM conductores
						WHERE apellidos LIKE ?
						AND nombres LIKE ?
						AND estado <> 0
						");
	$rs3 = $db->GetAll($sql3, array($apellidos."%", $nombres."%"));
	if($rs3){
		echo"<center>
				<table class='listado' border='1'>
					<tr>
						<th>APELLIDOS</th><th>NOMBRES</th>
						<th><img src='../../img/modificar.png'></th><th><img src='../../img/borrar.png'></th>
					</tr>";
			foreach ($rs3 as $k => $fila) {
						$str = $fila["apellidos"];
						$str1 = $fila["nombres"];
					echo"<tr>
							<td>".resaltar($apellidos, $str)."</td>
							<td>".resaltar($nombres, $str1)."</td>
							<td align='center'>
								<form name='formModif".$fila["id_conductor"]."' method='post' action='conductor_modificar.php'>
									<input type='hidden' name='id_conductor' value='".$fila['id_conductor']."'>
									<a href='javascript:document.formModif".$fila['id_conductor'].".submit();' title='Modificar Conductor Sistema'>
										Modificar
									</a>
								</form>
							</td>
							<td align='center'>
								<form name='formElimi".$fila["id_conductor"]."' method='post' action='conductor_eliminar.php'>
									<input type='hidden' name='id_conductor' value='".$fila["id_conductor"]."'>
									<a href='javascript:document.formElimi".$fila['id_conductor'].".submit();' title='Elminar Conductor Sistema'
										onclick='javascript:return(confirm( Desea realmente Eliminar al conductor...?))';
										location.href='conductor_eliminar.php''>
										Eliminar
									</a>
								</form>
							</td>
						</tr>";
			}
			echo "</table>
			</center>";
	} else {
		echo"<center><b> EL CONDUCTOR NO EXISTE !!!</b></center><br>";
	}
}
?>