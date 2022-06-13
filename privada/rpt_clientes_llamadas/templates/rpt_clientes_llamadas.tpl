<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../{$direc_css}">
		<script type="text/javascript">
			var ventanaCalendario=false

				function imprimir() {
					ventanaCalendario = window.open("rpt_clientes_llamadas1.php", "calendario", "width=600,height=550,left=100,top=100,scrollbars=yes,menubars=no,statusbar=NO,status=NO,resizable=YES,location=NO")
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
					<h1> CLIENTES - LLAMADAS</h1>
				</td>
				<td align="right" width="33%">
					
				</td>
			</tr>
		</table>
		<br>
		<center>
			<table class="listado" border="1">
				<tr>
					<th>NRO</th><th>NOMBRES</th><th>APELLIDOS</th><th>DIRECCION CLIENTE</th><th>TELEFONO</th><th>OBSERVACIONES</th>
					<th>RECOMENDACIONES</th><th>TIPO LLAMADA</th><th>TIPO MOVIL</th><th>MOVIL ASIGNADO</th><th>ESTADO DE LLAMADA</th>
				</tr>
				{assign var="b" value="1"}
				{foreach item=r from=$rpt_cliente_llamada}
				<tr>
					<td align="center">{$b}</td>
					<td>{$r.nombres}</td>
					<td>{$r.apellidos}</td>
					<td>{$r.direc_cliente}</td>
					<td>{$r.telefono}</td>
					<td>{$r.observaciones}</td>
					<td>{$r.recomendaciones}</td>
					<td align="center">{$r.descripcion}</td>
					<td align="center">{$r.tipo_movil}</td>
					<td align="center">{$r.movil_asignado}</td>
					<td align="center">{$r.estado_llamada}</td>
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