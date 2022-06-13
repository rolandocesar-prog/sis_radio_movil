<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
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
				<h1>TIPOS MOVILES</h1>
			</td>
			<br>
			<td align="left" width="33%">
				<form name="formNuevo" method="post" action="tipo_movil_nuevo.php">
					<a href="javascript:document.formNuevo.submit();">
						<img src="../../img/logo_nuevo.png" class="zoom" title="Nuevo Tipo de Movil">
					</a>
				</form>
			</td>
		</tr>
	</table>
	<center>
		<table class="listado" border="1">
			<tr>
				<th>NRO</th><th>TIPO MOVIL</th>
				<th><img src="../../img/modificar.png"></th><th><img src="../../img/borrar.png"></th>
			</tr>
			{assign var="b" value="1"}
			{foreach item=r from=$tipos_moviles}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.tipo_movil}</td>
				<td align="center">
					<form name="formModif{$r.id_tipo_movil}" method="post" action="tipo_movil_modificar.php">
						<input type="hidden" name="id_tipo_movil" value="{$r.id_tipo_movil}">
						<a href="javascript:document.formModif{$r.id_tipo_movil}.submit();" title="Modificar Tipo Movil Sistema">
							Modificar
						</a>
					</form>
				</td>
				<td align="center">
					<form name="formElimi{$r.id_tipo_movil}" method="post" action="tipo_movil_eliminar.php">
						<input type="hidden" name="id_tipo_movil" value="{$r.id_tipo_movil}">
						<a href="javascript:document.formElimi{$r.id_tipo_movil}.submit();" title="Eliminar Tipo Movil Sistema" onclick='javascript:return(confirm("Deseas relamente Eliminar el tipo movil..{$r.tipo_movil}?"));'>
							Eliminar
						</a>
					</form>
				</td>
				{assign var="b" value="`$b+1`"}
				{/foreach}
			</tr>
		</table>
	</center>

</body>
</html>