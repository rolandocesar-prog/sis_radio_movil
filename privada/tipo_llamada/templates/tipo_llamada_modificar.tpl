<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_tipo_llamada.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>MODIFICAR TIPO LLAMADA</h1>
		<br>
		<form action="tipo_llamada_modificar1.php" method="post" name="formu">
			<table border="1" class="listado">
				{foreach item=r from=$tipo_llamada}
				<tr>
					<th align="right">Descripcion (*)</th><th>:</th>
					<td><input type="text" name="descripcion" onkeyup="this.value=this.value.toUpperCase()" value="{$r.descripcion}">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_tipo_llamada" value="{$r.id_tipo_llamada}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='tipo_llamada.php';">
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