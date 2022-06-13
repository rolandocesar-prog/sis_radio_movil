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
				<td> <img src="../../img/logo_andaluz.png" width="50%" ></td>
				<td align="center" width="80%"><h1> CLIENTES - LLAMADAS</h1></td>
			</tr>
		</table>
		<br>
		<center>
			<table border="1" cellspacing="0">
				<tr bgcolor="#00ff00">
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
		</center>
	</body>
</html>