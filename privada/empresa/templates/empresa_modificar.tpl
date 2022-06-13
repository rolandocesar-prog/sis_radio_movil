<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_empresa.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>MODIFICAR EMPRESA</h1>
		<br>
		<form action="empresa_modificar1.php" method="post" name="formu">
			<table border="1" class="listado">
				{foreach item=r from=$empresa1}
				<tr>
					<th align="right">Nombre (*)</th><th>:</th>
					<td><input type="text" name="nombre" onkeyup="this.value=this.value.toUpperCase()" value="{$r.nombre}">  </td>
				</tr>
				<tr>
					<th align="right">Direccion</th><th>:</th>
					<td><input type="text" name="direccion" onkeyup="this.value=this.value.toUpperCase()" value="{$r.direccion}">  </td>
				</tr>
				<tr>
					<th align="right">Telefono 1</th><th>:</th>
					<td><input type="text" name="telefono1" onkeyup="this.value=this.value.toUpperCase()" value="{$r.telefono1}">  </td>
				</tr>
				<tr>
					<th align="right">Telefono 2</th><th>:</th>
					<td><input type="text" name="telefono2" onkeyup="this.value=this.value.toUpperCase()" value="{$r.telefono2}">  </td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_empresa" value="{$r.id_empresa}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='empresa.php';">
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