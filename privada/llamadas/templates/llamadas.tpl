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
				<h1>LLAMADAS</h1>
				<br><br>
			</td>
			<td align="left" width="33%">
				<form name="formNuevo" method="post" action="llamada_nuevo.php">
					<a href="javascript:document.formNuevo.submit();">
						<img src="../../img/logo_nuevo.png" class="zoom" title="Registrar Nueva Lllamada">
					</a>
				</form>
			</td>
		</tr>
	</table>
	<center>
		<table class="listado" border="1">
			<tr>
				<th>NRO</th><th>CLIENTE</th><th>TIPO LLAMADA</th><th>TIPO MOVIL</th><th>DIRECCION</th><th>MOVIL ASIGNADO</th>
				<th>ESTADO DE LLAMADA</th><th>OBSERVACIONES</th><th>RECOMENDACIONES</th>
				<th><img src="../../img/modificar.png"></th><th><img src="../../img/borrar.png"></th>
			</tr>
			{assign var="b" value="1"}
			{foreach item=r from=$llamada}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.apellidos} {$r.nombres}</td>
				<td align="center">{$r.descripcion}</td>
				<td>{$r.tipo_movil}</td>
				<td align="center">{$r.direc_cliente}</td>
				<td align="center">{$r.movil_asignado}</td>
				<td>{$r.estado_llamada}</td>
				<td>{$r.observaciones}</td>
				<td>{$r.recomendaciones}</td>
				<td align="center">
					<form name="formModif{$r.id_llamada}" method="post" action="llamada_modificar.php">
						<input type="hidden" name="id_llamada" value="{$r.id_llamada}">
						<input type="hidden" name="id_cliente" value="{$r.id_cliente}">
						<input type="hidden" name="id_tipo_llamada" value="{$r.id_tipo_llamada}">
						<input type="hidden" name="id_tipo_movil" value="{$r.id_tipo_movil}">
						<a href="javascript:document.formModif{$r.id_llamada}.submit();" title="Despachar o modificar llamada">
							Despachar/Modificar
						</a>
					</form>
				</td>
				<td align="center">
					<form name="formElimi{$r.id_llamada}" method="post" action="llamada_eliminar.php">
						<input type="hidden" name="id_llamada" value="{$r.id_llamada}">
						<a href="javascript:document.formElimi{$r.id_llamada}.submit();" title="Cancelar llamada" 
						onclick='javascript:return(confirm("Deseas cancelar la llamada del cliente {$r.apellidos} {$r.nombres} ?"));'>
							Cancelar
						</a>
					</form>
				</td>
				{assign var="b" value="`$b+1`"}
				{/foreach}
			</tr>
		</table>
		<!--------------------------PAGINACION-------------------------------------->
		<table>
			<tr align="center">
				<td>
					{if !empty($urlback)}
					<a onclick="location.href='{$urlback}'" class="paginacion1">
						<img src="../../img/anterior.png" width="30" height="30" title="Anterior" style="cursor: pointer;">
					</a>
					{/if}
					{if !empty($paginas)}
						{foreach from=$paginas item=pag}
							{if $pag.npag == $pagina}
								{if $pagina neq '1'}|{/if} <b class="paginacion2"> {$pag.npag}</b>
							{else}
							| <a onclick="location.href='{$pag.pagV}'" style="cursor: pointer;">{$pag.npag}</a>
							{/if}
						{/foreach}
					{/if}
					{if $numpaginas gt $numbotones and !empty($urlnext) and $pagina lt $numpaginas}
					| <a onclick="location.href='{$urlnext}'" class="paginacion1">
						<img src="../../img/siguiente.png" width="30" height="30" title="Siguiente" style="cursor: pointer;">
					</a>
					{/if}
				</td>
			</tr>
		</table>
	</center>
</body>
</html>