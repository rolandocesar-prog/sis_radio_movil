<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../{$direc_css}">
		<script type="text/javascript">
			var ventanaCalendario=false

				function imprimir() {
					ventanaCalendario = window.open("rpt_telefonistas_operadoras1.php", "calendario", "width=600,height=550,left=100,top=100,scrollbars=yes,menubars=no,statusbar=NO,status=NO,resizable=YES,location=NO")
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
					<h1> TELEFONISTAS - OPERADORAS</h1>
				</td>
				<td align="right" width="33%">
					
				</td>
			</tr>
		</table>
		<br>
		<center>
			<table class="listado" border="1">
				<tr>
					<th>NRO</th><th>NOMBRES</th><th>APELLIDOS</th><th>INCIO CONTRATO- FIN CONTRATO</th><th>SALARIO</th><th>FUNCION</th><th>INICIO FUNCION - FIN FUNCION</th><th>TURNO</th><th>INICIO TURNO - FIN TURNO</th>
				</tr>
				{assign var="b" value="1"}
				{foreach item=r from=$rpt_telefonista_operadora}
				<tr>
					<td align="center">{$b}</td>
					<td>{$r.nombres}</td>
					<td>{$r.apellidos}</td>
					<td>{$r.fecha_inicio} // {$r.fecha_fin}</td>
					<td>{$r.salario}</td>
					<td>{$r.funcion}</td>
					<td>{$r.fecha_inicio_fu} // {$r.fecha_fin_fu}</td>
					<td>{$r.turno}</td>
					<td>{$r.fecha_inicio_tu} // {$r.fecha_fin_tu}</td>
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