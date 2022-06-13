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
						FROM clientes
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
								<form name='formModif".$fila["id_cliente"]."' method='post' action='cliente_modificar.php'>
									<input type='hidden' name='id_cliente' value='".$fila['id_cliente']."'>
									<a href='javascript:document.formModif".$fila['id_cliente'].".submit();' title='Modificar Cliente Sistema'>
										Modificar
									</a>
								</form>
							</td>
							<td align='center'>
								<form name='formElimi".$fila["id_cliente"]."' method='post' action='cliente_eliminar.php'>
									<input type='hidden' name='id_cliente' value='".$fila["id_cliente"]."'>
									<a href='javascript:document.formElimi".$fila['id_cliente'].".submit();' title='Elminar Cliente Sistema'
										onclick='javascript:return(confirm( Desea realmente Eliminar al cliente...?))';
										location.href='cliente_eliminar.php''>
										Eliminar
									</a>
								</form>
							</td>
						</tr>";
			}
			echo "</table>
			</center>";
	} else {
		echo"<center><b> EL CLIENTE NO EXISTE !!!</b></center><br>";
	}
}
?>