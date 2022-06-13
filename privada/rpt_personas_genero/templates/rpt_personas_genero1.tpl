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
					<h1> PERSONAS - GENERO</h1>
				</td>
			</tr>
		</table>
		<br>
		<center>
			<table border="1" cellspacing="0">
				<tr bgcolor="#00ff00">
					<th>NRO</th><th>NOMBRES</th><th>APELLIDO PATERNO</th><th>APELLIDO MATERNO</th><th>CARNET DE IDENTIDAD</th><th>DIRECCION</th><th>TELEFONO</th><th>GENERO</th>
				</tr>
				{assign var="b" value="1"}
				{foreach item=r from=$personas_genero1}
				<tr>
					<td align="center">{$b}</td>
					<td>{$r.nombres}</td>
					<td>{$r.ap}</td>
					<td>{$r.am}</td>
					<td>{$r.ci}</td>
					<td>{$r.direccion}</td>
					<td>{$r.telefono}</td>
					<td>{if $r.genero=='F'}FEMENINO{else}MASCULINO{/if}</td>
					{assign var="b" value="`$b+1`"}
					{/foreach}
				</tr>
			</table>
			<br><br>
			<b>Fecha:</b> {$fecha}
		</center>
	</body>
</html>