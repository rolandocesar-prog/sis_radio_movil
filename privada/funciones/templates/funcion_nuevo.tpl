<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_funcion.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>REGISTRAR FUNCION</h1>
		<br>
		<form action="funcion_nuevo1.php" method="post" name="formu">
			<table border="1" class="listado">
				<tr>
					<th align="right">Telefonista-Operadora (*)</th>
					<th>:</th>
					<td>
						<select name="id_telefonista_operadora">
							<option value="">---seleccione---</option>
							{foreach item=r from=$telefonistas_operadoras}
							<option value="{$r.id_telefonista_operadora}">{$r.nombres}-{$r.apellidos}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Funcion (*)</th>
					<th>:</th>
					<td><input type="text" name="funcion"></td>
				</tr>
				<tr>
					<th align="right">Fecha Inicio (*)</th>
					<th>:</th>
					<td><input type="date" name="fecha_inicio_fu"></td>
				</tr>
				<tr>
					<th align="right">Fecha Fin (*)</th>
					<th>:</th>
					<td><input type="date" name="fecha_fin_fu"></td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='funciones.php';">
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