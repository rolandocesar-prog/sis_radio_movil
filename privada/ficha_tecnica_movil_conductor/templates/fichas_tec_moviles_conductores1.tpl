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
				<td>
					<img src="../../img/logo_andaluz.png" width="50%" >
				</td>
				<td align="center" width="80%">
					<h1> FICHA TECNICA DE MOVIL-CONDUCTOR</h1>
				</td>
			</tr>
		</table>
		<br>
		<center>
			<table border="1" cellspacing="0">
				<tr bgcolor="#00ff00">
					<td>
						<table border="0">
							{foreach item=r from=$movil}
							<tr>
								<th align="right">Numero de Movil</th><th>:</th>
								<td><input type="text" name="num_movil" value="{$r.num_movil}" disabled=""></td>
							</tr>
							<tr>
								<th align="right">Placa</th><th>:</th>
								<td><input type="text" name="placa" value="{$r.placa}" disabled=""></td>
							</tr>
							<tr>
								<th align="right">Nombre Conductor</th><th>:</th>
								<td><input type="text" name="ap" value="{$r.nombres}" disabled=""></td>
							</tr>
							<tr>
								<th align="right">Apellido Conductor</th><th>:</th>
								<td><input type="text" name="am" value="{$r.apellidos}" disabled=""></td>
							</tr>
							<tr>
								<th align="right">Telefono Conductor</th><th>:</th>
								<td><input type="text" name="am" value="{$r.telefono}" disabled=""></td>
							</tr>
							<tr>
								<th align="right">Direccion Conductor</th><th>:</th>
								<td><input type="text" name="am" value="{$r.direccion}" disabled=""></td>
							</tr>
							{/foreach}
						</table>
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>