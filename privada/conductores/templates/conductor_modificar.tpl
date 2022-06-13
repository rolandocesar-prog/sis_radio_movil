<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_conductor.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>MODIFICAR CONDUCTOR</h1>
		<br>
		<form action="conductor_modificar1.php" method="post" name="formu">
			<table border="1" class="listado">
				{foreach item=r from=$conductor}
				<tr>
					<th align="right">Ci (*)</th><th>:</th>
					<td><input type="text" name="ci" onkeyup="this.value=this.value.toUpperCase()" value="{$r.ci}">  </td>
				</tr>
				<tr>
					<th align="right">Nombres (*)</th><th>:</th>
					<td><input type="text" name="nombres" onkeyup="this.value=this.value.toUpperCase()" value="{$r.nombres}">  </td>
				</tr>
				<tr>
					<th align="right">Apellidos (*)</th><th>:</th>
					<td><input type="text" name="apellidos" onkeyup="this.value=this.value.toUpperCase()" value="{$r.apellidos}">  </td>
				</tr>
				<tr>
					<th align="right">Licencia (*)</th><th>:</th>
					<td><input type="text" name="licencia" onkeyup="this.value=this.value.toUpperCase()" value="{$r.licencia}">  </td>
				</tr>
				<tr>
					<th align="right">Direccion (*)</th><th>:</th>
					<td><input type="text" name="direccion" onkeyup="this.value=this.value.toUpperCase()" value="{$r.direccion}">  </td>
				</tr>
				<tr>
					<th align="left">Telefono (*)</th><th>:</th>
					<td><input type="text" name="telefono" onkeyup="this.value=this.value.toUpperCase()" value="{$r.telefono}">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_conductor" value="{$r.id_conductor}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='conductores.php';">
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