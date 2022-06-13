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
		<h1>MODIFICAR MOVIL</h1>
		<br>
		<form action="movil_modificar1.php" method="post" name="formu">
			<table class="listado" border="1">
				<tr>
					<th align="right">Socio (*)</th><td valign="top">:</td>
					<td>
						<select name="id_socio">
							{foreach item=r from=$socio}
							<option value="{$r.id_socio}">{$r.apellidos_socio} - {$r.nombres_socio}</option>
							{/foreach}
							{foreach item=r from=$socios}
							<option value="{$r.id_socio}">{$r.apellidos_socio} - {$r.nombres_socio}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Tipo Movil (*)</th><td valign="top">:</td>
					<td>
						<select name="id_tipo_movil">
							{foreach item=r from=$tipo_movil}
							<option value="{$r.id_tipo_movil}">{$r.tipo_movil}</option>
							{/foreach}
							{foreach item=r from=$tipos_moviles}
							<option value="{$r.id_tipo_movil}">{$r.tipo_movil}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				{foreach item=r from=$movil}
				<tr>
					<th align="right">Numero de Movil (*)</th><th>:</th>
					<td><input type="text" name="num_movil" value="{$r.num_movil}">  </td>
				</tr>
				<tr>
					<th align="right">Placa (*)</th><th>:</th>
					<td><input type="text" name="placa" value="{$r.placa}">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_movil" value="{$r.id_movil}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='moviles.php';">
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