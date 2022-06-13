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
				<h1>TARIFARIO DE SERVICIOS</h1>
			</td>
			<td align="right" width="33%">
				<form name="formNuevo" method="post" action="tarif_servicio_nuevo.php">
					<a href="javascript:document.formNuevo.submit();">
						<img src="../../img/logo_nuevo.png" class="zoom" align="left" title="Registrar Tarifario de Servicios">
					</a>
				</form>
			</td>
		</tr>
	</table>
	<center>
		<table class="listado" border="1">
			<tr>
				<th>NRO</th><th>TIPO</th><th>TARIFA</th><th>EMPRESA</th>
				<th><img src="../../img/modificar.png"></th><th><img src="../../img/borrar.png"></th>
			</tr>
			{assign var="b" value="1"}
			{foreach item=r from=$tarif_servicios}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.tipo}</td>
				<td align="center">{$r.tarifa}</td>
				<td>{$r.nombre}</td>
				<td align="center">
					<form name="formModif{$r.id_tar_serv}" method="post" action="tarif_servicio_modificar.php">
						<input type="hidden" name="id_tar_serv" value="{$r.id_tar_serv}">
						<input type="hidden" name="id_empresa" value="{$r.id_empresa}">
						<a href="javascript:document.formModif{$r.id_tar_serv}.submit();" title="Modificar Tarifario de Servicio Sistema">
							Modificar
						</a>
					</form>
				</td>
				<td align="center">
					<form name="formElimi{$r.id_tar_serv}" method="post" action="tarif_servicio_eliminar.php">
						<input type="hidden" name="id_tar_serv" value="{$r.id_tar_serv}">
						<a href="javascript:document.formElimi{$r.id_tar_serv}.submit();" title="Eliminar Tarifario Servicio" onclick='javascript:return(confirm("Deseas relamente Eliminar el servicio:::{$r.tipo}?"));'>
							Eliminar
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