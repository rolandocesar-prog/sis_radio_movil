<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_tarif_rural.js"></script>
</head>
<body class="fondo">
	<br><br>
	<h1>MODIFICAR TARIFARIO RURAL</h1>
	<br>
	<center>
		<form action="tarif_rural_modificar1.php" method="post" name="formu">
			<table class="listado" border="1">
				<tr>
					<th align="right">Empresa (*)</th><td valign="top">:</td>
					<td>
						<select name="id_empresa">
							{foreach item=r from=$empresa}
							<option value="{$r.id_empresa}">{$r.nombre}</option>
							{/foreach}
							{foreach item=r from=$empresas}
							<option value="{$r.id_empresa}">{$r.nombre}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Zona (*)</th><td valign="top">:</td>
					<td>
						<select name="id_zona">
							{foreach item=r from=$zona}
							<option value="{$r.id_zona}">{$r.zona}</option>
							{/foreach}
							{foreach item=r from=$zonas}
							<option value="{$r.id_zona}">{$r.zona}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				{foreach item=r from=$tarifario_rural}
				<tr>
					<th align="right">Lugar (*)</th><th>:</th>
					<td><input type="text" name="lugar" value="{$r.lugar}">  </td>
				</tr>
				<tr>
					<th align="right">Tarifa Carrera (*)</th><th>:</th>
					<td><input type="text" name="tarifa_carrera" value="{$r.tarifa_carrera}">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_tar_rur" value="{$r.id_tar_rur}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='tarif_rural.php';">
					</td>
				</tr>
				{/foreach}
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