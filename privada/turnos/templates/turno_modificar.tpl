<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_turno.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>MODIFICAR TURNO</h1>
		<form action="turno_modificar1.php" method="post" name="formu">
			<table class="listado" border="1">
				<tr>
					<th align="right">Telefonista-Operadora (*)</th><td valign="top">:</td>
					<td>
						<select name="id_telefonista_operadora">
							{foreach item=r from=$telefonista_operadora}
							<option value="{$r.id_telefonista_operadora}">{$r.nombres} - {$r.apellidos}</option>
							{/foreach}
							{foreach item=r from=$telefonistas_operadoras}
							<option value="{$r.id_telefonista_operadora}">{$r.nombres} - {$r.apellidos}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				{foreach item=r from=$turno}
				<tr>
					<th align="right">Turno (*)</th><th>:</th>
					<td><input type="text" name="turno" value="{$r.turno}">  </td>
				</tr>
				<tr>
					<th align="right">Fecha Inicio (*)</th><th>:</th>
					<td><input type="date" name="fecha_inicio_tu" value="{$r.fecha_inicio_tu}">  </td>
				</tr>
				<tr>
					<th align="right">Fecha Fin (*)</th><th>:</th>
					<td><input type="date" name="fecha_fin_tu" value="{$r.fecha_fin_tu}">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_turno" value="{$r.id_turno}">
						<input type="button" value="Aceptar" class="boton" onclick="validar();">
						<input type="button" value="Cancelar" class="boton" onclick="javascript:location.href='turnos.php';">
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