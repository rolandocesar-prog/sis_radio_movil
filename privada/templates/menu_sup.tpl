<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="{$direc_css}">
	</head>
	<body>
		<table border="0" align="center" width="100%" height="100%" cellspacing="0" bordercolor="black">
			<tr>
				<td width="8%" rowspan="2">
					<img src="empresa/logos/{$logo_empresa}" width="100%" class="logo_sombra">
				</td>
				<td colspan="4" align="center">
					<font><h2> "{$nombre}"</h2></font>
				</td>
			</tr>
			<tr>
				<th><h4>Usuario : {$sesion.usuario}</h4></th>
				<th><h4>Rol : {$sesion.rol}</h4></th>
			</tr>
		</table>
	</body>
</html>