<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_tarif_urbano.js"></script>
</head>
<body class="fondo">
	<br><br>
	<h1>REGISTRAR TARIFARIO URBANO</h1>
	<br>
	<center>
		<form action="tarif_urbano_nuevo1.php" method="post" name="formu">
			<table border="1" class="listado">
				<tr>
					<th align="right">Empresa (*)</th>
					<th>:</th>
					<td>
						<select name="id_empresa">
							<option value="">---seleccione---</option>
							{foreach item=r from=$empresa}
							<option value="{$r.id_empresa}">{$r.nombre}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Zonas (*)</th>
					<th>:</th>
					<td>
						<select name="id_zona">
							<option value="">---seleccione---</option>
							{foreach item=r from=$zona}
							<option value="{$r.id_zona}">{$r.zona}-</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Lugar (*)</th>
					<th>:</th>
					<td><input type="text" name="lugar"></td>
				</tr>
				<tr>
					<th align="right">1 persona (*)</th>
					<th>:</th>
					<td><input type="text" name="una"></td>
				</tr>
				<tr>
					<th align="right">2 personas (*)</th>
					<th>:</th>
					<td><input type="text" name="dos"></td>
				</tr>
				<tr>
					<th align="right">3 personas (*)</th>
					<th>:</th>
					<td><input type="text" name="tres"></td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='tarif_urbano.php';">
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td colspan="3" class="obligatorio" align="center"><b>(*)Campos Obligatorios</b></td>
				</tr>
			</table>	
		</form>
	</center>
</body>
</html>