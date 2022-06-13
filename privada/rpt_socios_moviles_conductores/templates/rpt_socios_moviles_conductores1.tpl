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
				<td align="center" width="80%"><h1> SOCIOS - MOVILES - CONDUCTORES</h1></td>
			</tr>
		</table>
		<br>
		<center>
			<table border="1" cellspacing="0">
				<tr bgcolor="#00ff00">
					<th>NRO</th><th>CI SOCIO</th><th>NOMBRES SOCIO</th><th>APELLIDOS SOCIO</th><th>DIRECCION SOCIO</th><th>TELEFONO SOCIO</th><th>FECHA ALTA</th><th>NUMERO MOVIL</th><th>PLACA</th><th>TIPO MOVIL</th><th>NOMBRES CONDUCTOR</th><th>APELLIDOS CONDUCTOR</th><th>CI CONDUCTOR</th><th>LICENCIA</th><th>DIRECCION CONDUCTOR</th><th>TELEFONO CONDUCTOR</th>
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
					<td>{$r.num_movil}</td>
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
		</center>
	</body>
</html>