<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../../resaltarBusqueda.inc.php");

$lugar = strip_tags(stripslashes($_POST["lugar"]));
$una_persona = strip_tags(stripslashes($_POST["una_persona"]));
$dos_personas = strip_tags(stripslashes($_POST["dos_personas"]));
$tres_personas = strip_tags(stripslashes($_POST["tres_personas"]));

//$db->debug=true;

if ($lugar or $una_persona or $dos_personas or $tres_personas){
	$sql3 = $db->Prepare("SELECT *
						FROM tarif_urbano
						WHERE lugar LIKE ?
						AND una_persona LIKE ?
						AND dos_personas LIKE ?
						AND tres_personas LIKE ?
						AND estado <> 0
						");
	$rs3 = $db->GetAll($sql3, array($lugar."%", $una_persona."%", $dos_personas."%", $tres_personas."%"));
	if($rs3){
		echo"<center>
				<table class='listado' border='1'>
					<tr>
						<th>LUGAR</th><th>UNA PERSONA</th><th>DOS PERSONAS</th><th>TRES PERSONAS</th>
						<th><img src='../../img/modificar.png'></th><th><img src='../../img/borrar.png'></th>
					</tr>";
			foreach ($rs3 as $k => $fila) {
						$str = $fila["lugar"];
						$str1 = $fila["una_persona"];
						$str2 = $fila["dos_personas"];
						$str3 = $fila["tres_personas"];
					echo"<tr>
							<td>".resaltar($lugar, $str)."</td>
							<td align='center'>".resaltar($una_persona, $str1)."</td>
							<td align='center'>".resaltar($dos_personas, $str2)."</td>
							<td align='center'>".resaltar($tres_personas, $str3)."</td>
							<td align='center'>
								<form name='formModif".$fila["id_tar_urb"]."' method='post' action='tarif_urbano_modificar.php'>
									<input type='hidden' name='id_tar_urb' value='".$fila['id_tar_urb']."'>
									<a href='javascript:document.formModif".$fila['id_tar_urb'].".submit();' title='Modificar Tarifario Urbano Sistema'>
										Modificar
									</a>
								</form>
							</td>
							<td align='center'>
								<form name='formElimi".$fila["id_tar_urb"]."' method='post' action='tarif_urbano_eliminar.php'>
									<input type='hidden' name='id_tar_urb' value='".$fila["id_tar_urb"]."'>
									<a href='javascript:document.formElimi".$fila['id_tar_urb'].".submit();' title='Elminar El Tarifario Urbano del Sistema'
										onclick='javascript:return(confirm( Desea realmente Eliminar el tarifario urbano...?))';
										location.href='tarif_urbano_eliminar.php''>
										Eliminar
									</a>
								</form>
							</td>
						</tr>";
			}
			echo "</table>
			</center>";
	} else {
		echo"<center><b> EL TARIFARIO URBANO NO EXISTE !!!</b></center><br>";
	}
}
?>