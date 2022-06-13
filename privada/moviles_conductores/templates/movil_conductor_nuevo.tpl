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
		<h1>REGISTRAR MOVIL-CONDUCTOR</h1>
		<br>
		<form action="movil_conductor_nuevo1.php" method="post" name="formu">
			<table border="1" class="listado">
				<tr>
					<th align="right">Conductor (*)</th>
					<th>:</th>
					<td>
						<select name="id_conductor">
							<option value="">---seleccione---</option>
							{foreach item=r from=$conductor}
							<option value="{$r.id_conductor}">{$r.nombres}-{$r.apellidos}-</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Movil (*)</th>
					<th>:</th>
					<td>
						<select name="id_movil">
							<option value="">---seleccione---</option>
							{foreach item=r from=$movil}
							<option value="{$r.id_movil}">{$r.num_movil}-</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Fecha Inicio (*)</th>
					<th>:</th>
					<td><input type="date" name="fecha_inicio"></td>
				</tr>
				<tr>
					<th align="right">Hora Inicio (*)</th>
					<th>:</th>
					<td><input type="time" name="hora_inicio"></td>
				</tr>
				<tr>
					<th align="right">Fecha Fin (*)</th>
					<th>:</th>
					<td><input type="date" name="fecha_fin"></td>
				</tr>
				<tr>
					<th align="right">Hora Fin (*)</th>
					<th>:</th>
					<td><input type="time" name="hora_fin"></td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='moviles_conductores.php';">
					</td>
				</tr>
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