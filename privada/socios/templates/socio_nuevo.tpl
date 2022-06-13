<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_socio.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>REGISTRAR SOCIO SISTEMA</h1>
		<br>
		<form action="socio_nuevo1.php" method="post" name="formu">
			<table border="1" class="listado">
				<tr>
					<th align="right">Ci (*)</th>
					<th>:</th>
					<td><input type="text" name="ci_socio" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Nombres (*)</th>
					<th>:</th>
					<td><input type="text" name="nombres_socio" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Apellidos (*)</th>
					<th>:</th>
					<td><input type="text" name="apellidos_socio" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Direccion Socio (*)</th>
					<th>:</th>
					<td><input type="text" name="direc_socio" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Fecha de Alta (*)</th>
					<th>:</th>
					<td><input type="date" name="fecha_alta" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Telefono (*)</th>
					<th>:</th>
					<td><input type="text" name="telefono_socio" onkeyup="this.value=this.value.toUpperCase()" maxlength="9">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='socios.php';">
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