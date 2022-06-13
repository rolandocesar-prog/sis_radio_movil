<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_socio.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>MODIFICAR SOCIO</h1>
		<br>
		<form action="socio_modificar1.php" method="post" name="formu">
			<table border="1" class="listado">
				{foreach item=r from=$socio}
				<tr>
					<th align="right">Ci (*)</th><th>:</th>
					<td><input type="text" name="ci_socio" onkeyup="this.value=this.value.toUpperCase()" value="{$r.ci_socio}">  </td>
				</tr>
				<tr>
					<th align="right">Nombres (*)</th><th>:</th>
					<td><input type="text" name="nombres_socio" onkeyup="this.value=this.value.toUpperCase()" value="{$r.nombres_socio}">  </td>
				</tr>
				<tr>
					<th align="right">Apellidos</th><th>:</th>
					<td><input type="text" name="apellidos_socio" onkeyup="this.value=this.value.toUpperCase()" value="{$r.apellidos_socio}">  </td>
				</tr>
				<tr>
					<th align="right">Direccion Socio</th><th>:</th>
					<td><input type="text" name="direc_socio" onkeyup="this.value=this.value.toUpperCase()" value="{$r.direc_socio}">  </td>
				</tr>
				<tr>
					<th align="right">Fecha de Alta</th><th>:</th>
					<td><input type="date" name="fecha_alta" onkeyup="this.value=this.value.toUpperCase()" value="{$r.fecha_alta}">  </td>
				</tr>
				<tr>
					<th align="right">Telefono</th><th>:</th>
					<td><input type="text" name="telefono_socio" onkeyup="this.value=this.value.toUpperCase()" value="{$r.telefono_socio}">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_socio" value="{$r.id_socio}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='socios.php';">
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