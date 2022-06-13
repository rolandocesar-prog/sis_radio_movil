<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_usuario.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>MODIFICAR USUARIO</h1>
		<br>
		<form action="usuario_modificar1.php" method="post" name="formu">
			<table class="listado" border="1">
				<tr>
					<th align="right">Persona (*)</th><td valign="top">:</td>
					<td>
						<select name="id_persona">
							{foreach item=r from=$persona}
							<option value="{$r.id_persona}">{$r.ap} - {$r.am} - {$r.nombres}</option>
							{/foreach}
							{foreach item=r from=$personas}
							<option value="{$r.id_persona}">{$r.ap} - {$r.am} - {$r.nombres}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				{foreach item=r from=$usuario}
				<tr>
					<th align="right">Usuario (*)</th><th>:</th>
					<td><input type="text" name="usuario1" value="{$r.usuario1}" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Clave (*)</th><th>:</th>
					<td><input type="text" name="clave" value="{$r.clave}">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_usuario" value="{$r.id_usuario}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='usuarios.php';">
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