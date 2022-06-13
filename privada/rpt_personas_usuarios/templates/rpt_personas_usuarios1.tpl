<!DOCTYPE html>
<html>
	<head>
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
				<td align="center" width="80%"><h1> PERSONAS - USUARIOS</h1></td>
			</tr>
		</table>
		<br>
		<center>
			<table border="1" cellspacing="0">
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
					<td>{$r.genero}</td>
					<td>{$r.usuario1}</td>
					<td>{$r.clave}</td>
					{assign var="b" value="`$b+1`"}
					{/foreach}
				</tr>
			</table>
			<br><br>
		</center>
	</body>
</html>