<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_llamada.js"></script>
</head>
<body class="fondo">
	<br><br>
	<h1>DESPACHAR LLAMADA</h1>
	<br>
	<center>
		<form action="llamada_modificar1.php" method="post" name="formu">
			<table class="listado" border="1">
				<tr>
					<th align="right">Cliente (*)</th><td valign="top">:</td>
					<td>
						<select name="id_cliente">
							{foreach item=r from=$cliente}
							<option value="{$r.id_cliente}">{$r.apellidos} - {$r.nombres}</option>
							{/foreach}
							{* {foreach item=r from=$clientes}
							<option value="{$r.id_cliente}">{$r.apellidos} - {$r.nombres}</option>
							{/foreach} *}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Tipo Llamada (*)</th><td valign="top">:</td>
					<td>
						<select name="id_tipo_llamada">
							{foreach item=r from=$tipo_llamada}
							<option value="{$r.id_tipo_llamada}">{$r.descripcion}</option>
							{/foreach}
							{foreach item=r from=$tipos_llamadas}
							<option value="{$r.id_tipo_llamada}">{$r.descripcion}</option>
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
				{foreach item=r from=$llamada}
				<tr>
					<th align="right" class="obligatorio">Movil Asignado (*)</th><th>:</th>
					<td><input type="text" name="movil_asignado" value="{$r.movil_asignado}" size=5>  </td>
				</tr>
				<tr>
					<th align="right">Estado de Llamada (*)</th><th>:</th>
					<td><select name="estado_llamada">
							<option value="DESPACHADA">DESPACHADA</option>
						</select></td>
				</tr>
				<tr>
					<th align="right">Observaciones (*)</th><th>:</th>
					<td><input type="text" name="observaciones" value="{$r.observaciones}">  </td>
				</tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_llamada" value="{$r.id_llamada}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='llamadas.php';">
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