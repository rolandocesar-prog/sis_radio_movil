<?php
if (isset($_SESSION["sesion_id_rol"])){

	$sql = $db->Prepare("SELECT ac.*, op.id_opcion, op.orden, op.contenido, gr.id_grupo, gr.grupo, op.opcion
						FROM accesos ac, opciones op, grupos gr
						WHERE ac.id_rol = '".$_SESSION["sesion_id_rol"]."'
						AND ac.id_opcion = op.id_opcion
						AND op.id_grupo = gr.id_grupo
						AND ac.estado <> 0
						AND op.estado <> 0
						AND gr.estado <> 0
						ORDER BY op.id_grupo, op.orden
						");
	$rs = $db->Execute($sql);

	$sql2 = $db->Prepare("SELECT ac.*, op.id_opcion, op.orden, op.contenido, gr.id_grupo, gr.grupo, op.opcion
						FROM accesos ac, opciones op, grupos gr
						WHERE ac.id_rol = '".$_SESSION["sesion_id_rol"]."'
						AND ac.id_opcion = op.id_opcion
						AND op.id_grupo = gr.id_grupo
						AND ac.estado <> 0
						AND op.estado <> 0
						AND gr.estado <> 0
						ORDER BY op.id_grupo, op.orden
						");
	$rs2 = $db->Execute($sql2);
	$nick = $_SESSION["sesion_usuario"];
} else {
	$rs = "";
	$rs2 = "";
	$nick = "";
}
if ($nick != "") {
	echo"<div id='header'>
	<ul class='nav'>";
	$grup="";
	foreach ($rs as $r => $fila) {
		echo "<li>";
		if ($grup != $fila["grupo"]) {
			//echo "<a href=''>".$fila["grupo"]."</a>";
			echo "<a onclick='location.href=\"\"'>".$fila["grupo"]."</a>"; /*para ocultar el elnace del menu-grupo*/
			$grup = $fila["grupo"];
		}
		echo "<ul>";
		foreach ($rs2 as $t => $fila2) {
			if($grup == $fila2["grupo"]){
				$dir_php = $_SERVER["PHP_SELF"];
				$cuerp = strpos($dir_php, "cuerpo.php");
				if ($cuerp  == false)
					//echo "<li><a href='../".$fila2["contenido"]."'target='cuerpo'>".$fila2["opcion"]."</a></li>";
					echo "<li><a onclick='location.href=\"../".$fila2["contenido"]."\"' target='cuerpo' style='cursor:pointer;'>".$fila2["opcion"]."</a></li>";
				else
					//echo "<li><a href='".$fila2["contenido"]."' target='cuerpo'>".$fila2["opcion"]."</a></li>";
					echo "<li><a onclick='location.href=\"".$fila2["contenido"]."\"' target='cuerpo' style='cursor:pointer;'>".$fila2["opcion"]."</a></li>";
			}
		}
		echo "</ul>";
		echo "</li>";
	}
	echo"</ul>";

	if ($cuerp == false) {
		/*echo "<a href='../claves/'><input type='image'name='accion' class='zoom' src='../../img/cerrar.png' title='Cerrar Sesion'></a>";*/
		echo "<a onclick='location.href=\"../claves/\"'><input type='image'name='accion' class='zoom' src='../../img/cerrar.png' title='Cerrar Sesion' style='cursor:pointer;'></a>";
	}else{
		//echo "<a href='claves/'><input type='image'name='accion' value='CERRAR SESION' class='zoom1'></a>";
		echo "<a onclick='location.href=\"claves/\"'><input type='image'name='accion' value='CERRAR SESION' class='zoom1'
			style='corsor:pointer;'><a/>";

	}
	echo "</ul>
	</div>";
}
?>