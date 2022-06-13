<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_tarif_servicio.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>MODIFICAR TARIFARIO SERVICIO</h1>
		<br>
		<form action="tarif_servicio_modificar1.php" method="post" name="formu">
			<table border="1" class="listado">
				{foreach item=r from=$tarifario_servicio}
				<tr>
					<th align="right">Tipo (*)</th><th>:</th>
					<td><input type="text" name="tipo" onkeyup="this.value=this.value.toUpperCase()" value="{$r.tipo}">  </td>
				</tr>
				<tr>
					<th align="right">Tarifa (*)</th><th>:</th>
					<td><input type="text" name="tarifa" onkeyup="this.value=this.value.toUpperCase()" value="{$r.tarifa}">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_tar_serv" value="{$r.id_tar_serv}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='tarif_servicios.php';">
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