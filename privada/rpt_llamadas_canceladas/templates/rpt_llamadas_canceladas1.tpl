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
		<center>
		<table width="100%" border="0">
			<tr>
				<td>
					<img src="../../img/logo_andaluz.png" width="50%" title="Imprimir">
				</td>
				<td align="center" width="80%">
					<h1>REPORTE DE LLAMADAS CANCELADAS</h1>
				</td>
			</tr>
		</table>
		</center>
		<br>
		<center>
			<table border="1" cellspacing="0">
				<tr bgcolor="#00ff00">
					<th>NRO</th><th>CLIENTE</th><th>DIRECCION</th><th>TIPO LLAMADA</th><th>MOVIL ASIGNADO</th><th>OBSERVACIONES</th>
					<th>RECOMENDACIONES</th><th>ESTADO LLAMADA</th><th>FECHA LLAMADA</th>
				</tr>
				{assign var="b" value="1"}
				{foreach item=r from=$llamadas_canceladas1}
				<tr>
					<td align="center">{$b}</td>
					<td>{$r.nombres} {$r.apellidos}</td>
					<td>{$r.direc_cliente}</td>
					<td align="center">{$r.descripcion}</td>
					<td align="center">{$r.movil_asignado}</td>
					<td>{$r.observaciones}</td>
					<td>{$r.recomendaciones}</td>
					<td align="center">{$r.estado_llamada}</td>
					<td align="center">{$r.fec_insercion}</td>
					{assign var="b" value="`$b+1`"}
					{/foreach}
				</tr>
			</table>
			<br><br>
			<b>Fecha:</b> {$fecha}
		</center>
	</body>
</html>