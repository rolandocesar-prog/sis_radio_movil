<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
</head>
<body class="fondo">
	<table width="100%" border="0">
		<tr>
			<td align="center" width="33%">
				<br>
				<h1>DESPACHO DE LLAMADAS</h1>
			</td>
		</tr>
	</table>
	<table width="100%" border="0">
		<tr>
			<td align="center" width="33%">
				<br>
				Estado de llamada (0=cancelada, 1=pendiente, 2=despachada)
			</td>
		</tr>
	</table>
	<center>
		<table class="listado" border="1">
			<tr>
				<th>NRO</th><th>ESTADO LLAMADA</th><th>CLIENTE</th><th>TIPO LLAMADA</th><th>TIPO MOVIL</th><th>OBSERVACIONES</th><th>MOVIL ASIGNADO</th>
				<th><img src="../../img/modificar.png"></th><th><img src="../../img/borrar.png"></th>
			</tr>
			{assign var="b" value="1"}
			{foreach item=r from=$despacho_llamada}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.estado}</td>
				<td>{$r.id_cliente}</td>
				<td>{$r.id_tipo_llamada}</td>
				<td>{$r.id_tipo_movil}</td>
				<td>{$r.observaciones}</td>
				<td>{$r.movil_asignado}</td>
				{* <td align="center">
					<form name="formModif{$r.id_usuario}" method="post" action="usuario_modificar.php">
						<input type="hidden" name="id_usuario" value="{$r.id_usuario}">
						<input type="hidden" name="id_persona" value="{$r.id_persona}">
						<a href="javascript:document.formModif{$r.id_usuario}.submit();" title="Modificar Usuarios Sistema">
							Modificar
						</a>
					</form>
				</td>
				<td align="center">
					<form name="formElimi{$r.id_usuario}" method="post" action="usuario_eliminar.php">
						<input type="hidden" name="id_usuario" value="{$r.id_usuario}">
						<a href="javascript:document.formElimi{$r.id_usuario}.submit();" title="Eliminar Usuario" onclick='javascript:return(confirm("Deseas relamente Eliminar al usuario:::{$r.usuario1} {$r.ap} {$r.am} {$r.nombres}?"));'>
							Eliminar
						</a>
					</form>
				</td> *}
				{assign var="b" value="`$b+1`"}
				{/foreach}
			</tr>
		</table>
	</center>
</body>
</html>