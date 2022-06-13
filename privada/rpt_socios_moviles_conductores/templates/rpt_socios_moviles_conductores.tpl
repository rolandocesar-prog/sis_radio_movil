<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../{$direc_css}">
		<script type="text/javascript">
			var ventanaCalendario=false

				function imprimir() {
					ventanaCalendario = window.open("rpt_socios_moviles_conductores1.php", "calendario", "width=600,height=550,left=100,top=100,scrollbars=yes,menubars=no,statusbar=NO,status=NO,resizable=YES,location=NO")
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
					<h1> SOCIOS - MOVILES - CONDUCTORES</h1>
				</td>
				<td align="right" width="33%">
					
				</td>
			</tr>
		</table>
		<br>
		<center>
			<table class="listado" border="1">
				<tr>
					<th>NRO</th><th>CI SOCIO</th><th>NOMBRES SOCIO</th><th>APELLIDOS SOCIO</th><th>DIRECCION SOCIO</th><th>TELEFONO SOCIO</th><th>FECHA DE ALTA</th><th>NUMERO MOVIL</th><th>PLACA</th><th>TIPO MOVIL</th><th>NOMBRES CONDUCTOR</th><th>APELLIDOS CONDUCTOR</th><th>CI CONDUCTOR</th><th>LICENCIA</th><th>DIRECCION CONDUCTOR</th><th>TELEFONO CONDUCTOR</th>
				</tr>
				{assign var="b" value="1"}
				{foreach item=r from=$rpt_socio_movil_conductor}
				<tr>
					<td align="center">{$b}</td>
					<td>{$r.ci_socio}</td>
					<td>{$r.nombres_socio}</td>
					<td>{$r.apellidos_socio}</td>
					<td>{$r.direc_socio}</td>
					<td>{$r.telefono_socio}</td>
					<td>{$r.fecha_alta}</td>
					<td align="center">{$r.num_movil}</td>
					<td>{$r.placa}</td>
					<td>{$r.tipo_movil}</td>
					<td>{$r.nombres}</td>
					<td>{$r.apellidos}</td>
					<td>{$r.ci}</td>
					<td>{$r.licencia}</td>
					<td>{$r.direccion}</td>
					<td>{$r.telefono}</td>
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