<?php
session_start();
require_once("../../smarty/Smarty.class.php");
require_once("../../conexion.php");
require_once("../../resaltarBusqueda.inc.php");

$lugar = strip_tags(stripslashes($_POST["lugar"]));
//$paterno = $_POST["paterno"];
//echo$paterno;
//$nombres = strip_tags(stripslashes($_POST["nombres"]));

//$db->debug=true;

if ($lugar){
	$sql3 = $db->Prepare("SELECT *
						FROM tarif_rural
						WHERE lugar LIKE ?
						AND estado <> 0
						");
	$rs3 = $db->GetAll($sql3, array($lugar."%"));
	if($rs3){
		echo"<center>
				<table class='listado' border='1'>
					<tr>
						<th>lugar</th>
						<th><img src='../../img/modificar.png'></th><th><img src='../../img/borrar.png'></th>
					</tr>";
			foreach ($rs3 as $k => $fila) {
						$str = $fila["lugar"];
					echo"<tr>
							<td>".resaltar($lugar, $str)."</td>
							<td align='center'>
								<form name='formModif".$fila["id_tar_rur"]."' method='post' action='tarif_rural_modificar.php'>
									<input type='hidden' name='id_tar_rur' value='".$fila['id_tar_rur']."'>
									<a href='javascript:document.formModif".$fila['id_tar_rur'].".submit();' title='Modificar Tarifario Rural Sistema'>
										Modificar
									</a>
								</form>
							</td>
							<td align='center'>
								<form name='formElimi".$fila["id_tar_rur"]."' method='post' action='tarif_rural_eliminar.php'>
									<input type='hidden' name='id_tar_rur' value='".$fila["id_tar_rur"]."'>
									<a href='javascript:document.formElimi".$fila['id_tar_rur'].".submit();' title='Elminar El Tarifario Rural del Sistema'
										onclick='javascript:return(confirm( Desea realmente Eliminar el tarifario rural...?))';
										location.href='tarif_rural_eliminar.php''>
										Eliminar
									</a>
								</form>
							</td>
						</tr>";
			}
			echo "</table>
			</center>";
	} else {
		echo"<center><b> EL TARIFARIO RURAL NO EXISTE !!!</b></center><br>";
	}
}
?>