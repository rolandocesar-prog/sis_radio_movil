<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_tarif_urbano.js"></script>
</head>
<body class="fondo">
	<br><br>
	<h1>MODIFICAR TARIFARIO URBANO</h1>
	<br>
	<center>
		<form action="tarif_urbano_modificar1.php" method="post" name="formu">
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
				{foreach item=r from=$tarifario_urbano}
				<tr>
					<th align="right">Lugar (*)</th><th>:</th>
					<td><input type="text" name="lugar" value="{$r.lugar}">  </td>
				</tr>
				<tr>
					<th align="right">1 persona (*)</th><th>:</th>
					<td><input type="text" name="una" value="{$r.una_persona}">  </td>
				</tr>
				<tr>
					<th align="right">2 personas (*)</th><th>:</th>
					<td><input type="text" name="dos" value="{$r.dos_personas}">  </td>
				</tr>
				<tr>
					<th align="right">3 personas (*)</th><th>:</th>
					<td><input type="text" name="tres" value="{$r.tres_personas}">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_tar_urb" value="{$r.id_tar_urb}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='tarif_urbano.php';">
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