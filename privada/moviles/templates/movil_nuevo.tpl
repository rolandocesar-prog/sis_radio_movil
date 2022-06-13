<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_movil.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>REGISTRAR MOVIL SISTEMA</h1>
		<br>
		<form action="movil_nuevo1.php" method="post" name="formu">
			<table border="1" class="listado">
				<tr>
					<th align="right">Socio (*)</th>
					<th>:</th>
					<td>
						<select name="id_socio">
							<option value="">---seleccione---</option>
							{foreach item=r from=$socio}
							<option value="{$r.id_socio}">{$r.nombres_socio} - {$r.apellidos_socio}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Tipo Movil (*)</th>
					<th>:</th>
					<td>
						<select name="id_tipo_movil">
							<option value="">---seleccione---</option>
							{foreach item=r from=$tipo_movil}
							<option value="{$r.id_tipo_movil}">{$r.tipo_movil}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Numero de Movil (*)</th>
					<th>:</th>
					<td><input type="text" name="num_movil"></td>
				</tr>
				<tr>
					<th align="right">Placa (*)</th>
					<th>:</th>
					<td><input type="text" name="placa"></td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='moviles.php';">
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