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
			<td align="left" width="33%">
				<br>
				<h1>MOVILES-CARRERAS</h1>
			</td>
			<td align="left" width="33%">
				<form name="formNuevo" method="post" action="movil_carrera_nuevo.php">
					<a href="javascript:document.formNuevo.submit();">
						<img src="../../img/logo_nuevo.png" class="zoom" title="Registrar Nuevo Movil-Carrera">
					</a>
				</form>
			</td>
		</tr>
	</table>
	<center>
		<table class="listado" border="1">
			<tr>
				<th>NRO</th><th>CLIENTE</th><th>TIPO_LLAMADA</th><th>TIPO_MOVIL</th><th>DIRECCION</th><th>OBSERVACIONES</th><th>ESTADO LLAMADA</th><th>MOVIL ASIGNADO</th>
				<th><img src="../../img/modificar.png"></th><!--<th><img src="../../img/borrar.png"></th>-->
			</tr>
			{assign var="b" value="1"}
			{foreach item=r from=$moviles_carreras}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.apellidos} {$r.nombres}</td>
				<td align="center">{$r.descripcion}</td>
				<td align="center">{$r.tipo_movil}</td>
				<td>{$r.direc_cliente}</td>
				<td>{$r.observaciones}</td>
				<td align="center">{$r.estado}</td>
				<td align="center">{$r.movil_asignado}</td>
				<td align="center">
					<form name="formModif{$r.id_movil_carrera}" method="post" action="movil_carrera_modificar.php">
						<input type="hidden" name="id_movil_carrera" value="{$r.id_movil_carrera}">
						<input type="hidden" name="id_llamada" value="{$r.id_llamada}">
						<input type="hidden" name="id_telefonista_operadora" value="{$r.id_telefonista_operadora}">
						<a href="javascript:document.formModif{$r.id_movil_carrera}.submit();" title="Modificar Movil-Carrera Sistema">
							Modificar
						</a>
					</form>
				</td>
				{* <td align="center">
					<form name="formElimi{$r.id_movil_carrera}" method="post" action="movil_carrera_eliminar.php">
						<input type="hidden" name="id_movil_carrera" value="{$r.id_movil_carrera}">
						<a href="javascript:document.formElimi{$r.id_movil_carrera}.submit();" title="Eliminar Movil-Carrera" onclick='javascript:return(confirm("Deseas relamente Eliminar al socio:::{$r.direccion} ?"));'>
							Eliminar
						</a>
					</form>
				</td> *}
				{assign var="b" value="`$b+1`"}
				{/foreach}
			</tr>
		</table>
		<!--------------------------PAGINACION-------------------------------------->
		{* <table>
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
		</table> *}
	</center>
</body>
</html>