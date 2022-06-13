<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_telefonista_operadora.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>REGISTRAR TELEFONISTA-OPERADORA SISTEMA</h1>
		<br>
		<form action="telefonista_operadora_nuevo1.php" method="post" name="formu">
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
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='telefonistas_operadoras.php';">
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