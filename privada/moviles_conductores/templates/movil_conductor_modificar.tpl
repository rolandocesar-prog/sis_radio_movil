<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_movil_conductor.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>MODIFICAR MOVIL-CONDUCTOR</h1>
		<br>
		<form action="movil_conductor_modificar1.php" method="post" name="formu">
			<table class="listado" border="1">
				<tr>
					<th align="right">Conductor (*)</th><td valign="top">:</td>
					<td>
						<select name="id_conductor">
							{foreach item=r from=$conductor}
							<option value="{$r.id_conductor}">{$r.nombres} - {$r.apellidos}</option>
							{/foreach}
							{foreach item=r from=$conductores}
							<option value="{$r.id_conductor}">{$r.nombres} - {$r.apellidos}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Movil (*)</th><td valign="top">:</td>
					<td>
						<select name="id_movil">
							{foreach item=r from=$movil}
							<option value="{$r.id_movil}">{$r.num_movil}</option>
							{/foreach}
							{foreach item=r from=$moviles}
							<option value="{$r.id_movil}">{$r.num_movil}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				{foreach item=r from=$movil_conductor}
				<tr>
					<th align="right">Fecha Inicio (*)</th><th>:</th>
					<td><input type="date" name="fecha_inicio" value="{$r.fecha_inicio}">  </td>
				</tr>
				<tr>
					<th align="right">Hora Inicio (*)</th><th>:</th>
					<td><input type="time" name="hora_inicio" value="{$r.hora_inicio}">  </td>
				</tr>
				<tr>
					<th align="right">Fecha Fin (*)</th><th>:</th>
					<td><input type="date" name="fecha_fin" value="{$r.fecha_fin}">  </td>
				</tr>
				<tr>
					<th align="right">Hora Fin (*)</th><th>:</th>
					<td><input type="time" name="hora_fin" value="{$r.hora_fin}">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_movil_conductor" value="{$r.id_movil_conductor}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='moviles_conductores.php';">
					</td>
				</tr>
				{/foreach}
			</table>
			<table>
				<tr>
					<td colspan="3" align="center" class="obligatorio"><b>(*)Campos Obligatorios</b></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>