<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_empresa.js"> </script>
</head>
<body class="fondo">
	<br>
	<center>
		<h1> EMPRESA </h1>
		<form action="empresa1.php" method="post" name="formu" enctype="multipart/form-data">
			<table border="1" class="listado">
				{foreach item=r from=$empresa}
				<tr>
					<th>Nombre (*)</th><th>:</th>
					<td><input type="text" name="nombre" onkeyup="this.value=this.value.toUpperCase()" value="{$r.nombre}"> </td>
				</tr>
				<tr>
					<th align="right">Direccion</th><th>:</th>
					<td><input type="text" name="direccion" onkeyup="this.value=this.value.toUpperCase()" value="{$r.direccion}"> </td>
				</tr>
				<tr>
					<th align="right">Telefono 1</th><th>:</th>
					<td><input type="text" name="telefono1" onkeyup="this.value=this.value.toUpperCase()" value="{$r.telefono1}"> </td>
				</tr>
				<tr>
					<th align="right">Telefono 2</th><th>:</th>
					<td><input type="text" name="telefono2" onkeyup="this.value=this.value.toUpperCase()" value="{$r.telefono2}"> </td>
				</tr>
				<tr>
					<th>Logo (*)</th><th>:</th>
					<td>

						<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
						<input type="file" name="logo_empresa">
						<input type="hidden" name="logo_empresa1" value="{$r.logo_empresa}">
						<br><b>{$r.logo_empresa}</b>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_empresa" value="{$r.id_empresa}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
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