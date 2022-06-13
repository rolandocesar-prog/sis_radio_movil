<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_tarif_servicio.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>REGISTRAR TARIFARIO SERVICIO SISTEMA</h1>
		<br>
		<form action="tarif_servicio_nuevo1.php" method="post" name="formu">
			<table border="1" class="listado">
				<tr>
					<th align="right">Tipo (*)</th>
					<th>:</th>
					<td><input type="text" name="tipo" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<th align="right">Tarifa (*)</th>
					<th>:</th>
					<td><input type="text" name="tarifa" onkeyup="this.value=this.value.toUpperCase()">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='tarif_servicios.php';">
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