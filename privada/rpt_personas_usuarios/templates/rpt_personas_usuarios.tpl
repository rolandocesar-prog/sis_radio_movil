<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../{$direc_css}">
		<script type="text/javascript">
			var ventanaCalendario=false

				function imprimir() {
					ventanaCalendario = window.open("rpt_personas_usuarios1.php", "calendario", "width=600,height=550,left=100,top=100,scrollbars=yes,menubars=no,statusbar=NO,status=NO,resizable=YES,location=NO")
				}
				function pdf() {
					ventanaCalendario = window.open("pdf.php", "calendario", "width=600, height=550,left=100,top=100,scrollbars=yes,menubars=no,statusbar=NO,status=NO,resizable=YES,location=NO")
				}
		</script>
	</head>
	<body class="fondo">
		<table width="100%" border="0">
			<tr>
				<td width="33%">
					<table border="0">
						<tr>
						</tr>
					</table>
				</td>
				<td align="center" width="33%">
					<br>
					<h1> PERSONAS - USUARIOS</h1>
				</td>
				<td align="right" width="33%">
					
				</td>
			</tr>
		</table>
		<br>
		<center>
			<table class="listado" border="1">
				<tr>
					<th>NRO</th><th>PERSONA</th><th>CI</th><th>TELEFONO</th><th>GENERO</th><th>USUARIO</th><th>CLAVE</th>
				</tr>
				{assign var="b" value="1"}
				{foreach item=r from=$rpt_persona_usuario}
				<tr>
					<td align="center">{$b}</td>
					<td>{$r.nombres} {$r.ap} {$r.am}</td>
					<td>{$r.ci}</td>
					<td>{$r.telefono}</td>
					<td align="center">{$r.genero}</td>
					<td>{$r.usuario1}</td>
					<td>{$r.clave}</td>
					{assign var="b" value="`$b+1`"}
					{/foreach}
				</tr>
			</table>
			<br><br>
			<table align="center" border="1">
				<tr>
					<td><input type="radio" name="seleccionar" onclick="javascript:imprimir()">Imprimir</td>
					<td><input type="radio" name="seleccionar" onclick="javascript:pdf()">Exportar a PDF </td>
				</tr>
			</table>
		</center>
	</body>
</html>