<!DOCTYPE html>
<html>
	<head>
		<link href="../../css/imprimir.css" rel="stylesheet">
		<script type="text/javascript">
			var ventanaCalendario=false
			function imprimir() {
				if (confirm(' Desea Imprimir ?')){
					window.print();
				}
			}
		</script>
	</head>
	<body style='cursor:pointer;cursor:hand' onClick='imprimir();'>
		<table width="100%" border="0">
			<tr>
				<td>
					<img src="../../img/logo_andaluz.png" width="50%" title="Imprimir">
				</td>
				<td align="center" width="80%">
					<h1>REPORTE DE MOVILES POR TIPO DE MOVIL</h1>
				</td>
			</tr>
		</table>
		<br>
		<center>
			<table border="1" cellspacing="0">
				<tr bgcolor="#00ff00">
					<th>NRO</th><th>SOCIO</th><th>CI</th><th>DIRECCION SOCIO</th><th>FECHA DE ALTA</th><th>TELEFONO SOCIO</th>
					<th>Nº DE MOVIL</th><th>PLACA</th><th>TIPO_MOVIL</th>
				{assign var="b" value="1"}
				{foreach item=r from=$tipos_movil1}
				<tr>
					<td align="center">{$b}</td>
					<td>{$r.nombres_socio} {$r.apellidos_socio}</td>
					<td>{$r.ci_socio}</td>
					<td>{$r.direc_socio}</td>
					<td align="center">{$r.fecha_alta}</td>
					<td align="center">{$r.telefono_socio}</td>
					<td align="center">{$r.num_movil}</td>
					<td align="center">{$r.placa}</td>
					<td align="center">{$r.tipo_movil}</td>
					{assign var="b" value="`$b+1`"}
					{/foreach}
				</tr>
			</table>
			<br><br>
			<b>Fecha:</b> {$fecha}
		</center>
	</body>
</html>