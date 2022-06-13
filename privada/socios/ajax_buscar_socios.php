<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../../resaltarBusqueda.inc.php");

$apellidos = strip_tags(stripslashes($_POST["apellidos"]));
//$paterno = $_POST["paterno"];
//echo$paterno;
$nombres = strip_tags(stripslashes($_POST["nombres"]));

//$db->debug=true;

if ($apellidos or $nombres){
	$sql3 = $db->Prepare("SELECT *
						FROM socios
						WHERE apellidos_socio LIKE ?
						AND nombres_socio LIKE ?
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
						$str = $fila["apellidos_socio"];
						$str1 = $fila["nombres_socio"];
					echo"<tr>
							<td>".resaltar($apellidos, $str)."</td>
							<td>".resaltar($nombres, $str1)."</td>
							<td align='center'>
								<form name='formModif".$fila["id_socio"]."' method='post' action='socio_modificar.php'>
									<input type='hidden' name='id_socio' value='".$fila['id_socio']."'>
									<a href='javascript:document.formModif".$fila['id_socio'].".submit();' title='Modificar Socio Sistema'>
										Modificar
									</a>
								</form>
							</td>
							<td align='center'>
								<form name='formElimi".$fila["id_socio"]."' method='post' action='socio_eliminar.php'>
									<input type='hidden' name='id_socio' value='".$fila["id_socio"]."'>
									<a href='javascript:document.formElimi".$fila['id_socio'].".submit();' title='Elminar Socio Sistema'
										onclick='javascript:return(confirm( Desea realmente Eliminar al socio...?))';
										location.href='socio_eliminar.php''>
										Eliminar
									</a>
								</form>
							</td>
						</tr>";

			}
			echo "</table>
			</center>";
	} else {
		echo"<center><b> EL SOCIO NO EXISTE !!!</b></center><br>";
	}
}
?>