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
				<td align="center" width="80%"><h1> TELEFONISTAS - OPERADORAS</h1></td>
			</tr>
		</table>
		<br>
		<center>
			<table border="1" cellspacing="0">
				<tr bgcolor="#00ff00">
					<th>NRO</th><th>NOMBRES</th><th>APELLIDOS</th><th>INCIO CONTRATO- FIN CONTRATO</th><th>SALARIO</th><th>FUNCION</th><th>INICIO FUNCION - FIN FUNCION</th><th>TURNO</th><th>INICIO TURNO - FIN TURNO</th>
				</tr>
				{assign var="b" value="1"}
				{foreach item=r from=$rpt_telefonista_operadora}
				<tr>
					<td align="center">{$b}</td>
					<td>{$r.nombres}</td>
					<td>{$r.apellidos}</td>
					<td align="center">{$r.fecha_inicio} / {$r.fecha_fin}</td>
					<td>{$r.salario}</td>
					<td>{$r.funcion}</td>
					<td align="center">{$r.fecha_inicio_fu} / {$r.fecha_fin_fu}</td>
					<td>{$r.turno}</td>
					<td align="center">{$r.fecha_inicio_tu} / {$r.fecha_fin_tu}</td>
					{assign var="b" value="`$b+1`"}
					{/foreach}
				</tr>
			</table>
			<br><br>
		</center>
	</body>
</html>