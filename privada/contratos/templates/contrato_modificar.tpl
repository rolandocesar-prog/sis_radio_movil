<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_contrato.js"></script>
</head>
<body class="fondo">
	<br><br>
	<h1>MODIFICAR CONTRATO</h1>
	<br>
	<center>
		<form action="contrato_modificar1.php" method="post" name="formu">
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
				{foreach item=r from=$contrato}
				<tr>
					<th align="right">Fecha Inicio (*)</th><th>:</th>
					<td><input type="date" name="fecha_inicio" value="{$r.fecha_inicio}">  </td>
				</tr>
				<tr>
					<th align="right">Fecha Fin (*)</th><th>:</th>
					<td><input type="date" name="fecha_fin" value="{$r.fecha_fin}">  </td>
				</tr>
				<tr>
					<th align="right">Salario (*)</th><th>:</th>
					<td><input type="text" name="salario" value="{$r.salario}">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_contrato" value="{$r.id_contrato}">
						<input type="button" value="Aceptar" class="boton" onclick="validar();">
						<input type="button" value="Cancelar" class="boton" onclick="javascript:location.href='contratos.php';">
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