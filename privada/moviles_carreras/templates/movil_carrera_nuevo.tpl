<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_movil_carrera.js"></script>
</head>
<body class="fondo">
	<br><br>
	<h1>REGISTRAR MOVIL-CARRERA</h1>
	<br>
	<center>
		<form action="movil_carrera_nuevo1.php" method="post" name="formu">
			<table border="1" class="listado">
				<tr>
					<th align="right">Direccion Llamada (*)</th>
					<th>:</th>
					<td>
						<select name="id_llamada">
							<option value="">---seleccione---</option>
							{foreach item=r from=$llamada}
							<option value="{$r.id_llamada}">{$r.direccion}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Telefonista-Operadora (*)</th>
					<th>:</th>
					<td>
						<select name="id_telefonista_operadora">
							<option value="">---seleccione---</option>
							{foreach item=r from=$telefonista_operadora}
							<option value="{$r.id_telefonista_operadora}">{$r.nombres} {$r.apellidos}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Hora Movil-Carrera (*)</th>
					<th>:</th>
					<td><input type="time" name="hora_movil_carrera"></td>
				</tr>
				<tr>
					<th align="right">Fecha Movil-Carrera (*)</th>
					<th>:</th>
					<td><input type="date" name="fecha_movil_carrera"></td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='moviles_carreras.php';">
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