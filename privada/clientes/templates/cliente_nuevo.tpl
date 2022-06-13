<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_cliente.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>REGISTRAR CLIENTE SISTEMA</h1>
		<br>
		<form action="cliente_nuevo1.php" method="post" name="formu">
			<table border="1" class="listado">
				<tr>
					<th align="right">Nombres (*)</th>
					<th>:</th>
					<td><input type="text" name="nombres" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Apellidos (*)</th>
					<th>:</th>
					<td><input type="text" name="apellidos" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Direccion Cliente (*)</th>
					<th>:</th>
					<td><input type="text" name="direc_cliente" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Telefono (*)</th>
					<th>:</th>
					<td><input type="text" name="telefono" maxlength="9">  </td>
				</tr>
				<tr>
					<th align="right">Recomendaciones (*)</th>
					<th>:</th>
					<td><input type="text" name="recomendaciones" onkeyup="this.value=this.value.toUpperCase()" >  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='clientes.php';">
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