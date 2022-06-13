<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_telefonista_operadora.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>MODIFICAR TELEFONISTA-OPERADORA</h1>
		<br>
		<form action="telefonista_operadora_modificar1.php" method="post" name="formu">
			<table border="1" class="listado">
				{foreach item=r from=$telefonista_operadora}
				<tr>
					<th align="right">Nombres (*)</th><th>:</th>
					<td><input type="text" name="nombres" onkeyup="this.value=this.value.toUpperCase()" value="{$r.nombres}">  </td>
				</tr>
				<tr>
					<th align="right">Apellidos (*)</th><th>:</th>
					<td><input type="text" name="apellidos" onkeyup="this.value=this.value.toUpperCase()" value="{$r.apellidos}">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_telefonista_operadora" value="{$r.id_telefonista_operadora}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='telefonistas_operadoras.php';">
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