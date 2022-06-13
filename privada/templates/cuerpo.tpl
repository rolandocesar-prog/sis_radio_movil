<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="{$direc_css}">
	</head>
	<body class="fondo">
	<br><br><br><br><br><br><br>
		<form action="claves/" method="post" target="cuerpo">
			<center>
			{if $nick == ""}
			<table width="20%" align="center" border="3">
				<tr>
					<th align="center" colspan="3"><h3>Login</h3></th>
				</tr>
				<tr>
					<td><b>Usuario:</b></td>
					<td><input type="text" name="nick" size="11" value="" class="limpiar"></td>
				</tr>
				<tr>
					<td><b>Clave:</b></td>
					<td><input type="password" name="password" size="11" value=""></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" class="boton" name="accion" value="Ingresar" size="5">
					</td>
				</tr>
			</table>
			{/if}
			{* <a href="../index.php"><img src="../img/principal.png" title="Pagina principal"></a> *}
		</center>
		</form>
	</body>
</html>