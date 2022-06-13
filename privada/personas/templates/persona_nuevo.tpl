<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_persona.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>REGISTRAR PERSONA SISTEMA</h1>
		<br>
		<form action="persona_nuevo1.php" method="post" name="formu">
			<table class="listado" border="1">
				<tr>
					<th align="right">Ci (*)</th>
					<th>:</th>
					<td><input type="text" name="ci" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Nombres (*)</th>
					<th>:</th>
					<td><input type="text" name="nombres" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Apellido Paterno</th>
					<th>:</th>
					<td><input type="text" name="ap" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Apellido Materno (*)</th>
					<th>:</th>
					<td><input type="text" name="am" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Direccion (*)</th>
					<th>:</th>
					<td><input type="text" name="direccion" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Telefono (*)</th>
					<th>:</th>
					<td><input type="text" name="telefono" onkeyup="this.value=this.value.toUpperCase()" maxlength="9">  </td>
				</tr>
				<tr>
					<th align="right">Genero (*)</th>
					<th>:</th>
					<td>
						<input type="radio" name="genero" value="M">Masculino
						<input type="radio" name="genero" value="F">Femenino
					</td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='personas.php';">
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