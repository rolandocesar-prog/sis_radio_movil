<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	<script type="text/javascript" src="../../ajax.js"></script>
	<script type="text/javascript">
		function buscar(){
		var d1,d2, contenedor, url;
			contenedor = document.getElementById('clientes1');
			d1 = document.formu.apellidos.value;
			d2 = document.formu.nombres.value;
			ajax = nuevoAjax();
			url = "ajax_buscar_clientes.php"
			param = "apellidos="+d1+"&nombres="+d2;
			//alert(param);
			ajax.open("POST", url, true);
			ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			ajax.onreadystatechange = function(){
				if (ajax.readyState == 4){
					contenedor.innerHTML = ajax.responseText;
				}
			}
			ajax.send(param);
		}
	</script>
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
				<h1>CLIENTES</h1>
			</td>
			<td align="left" width="33%">
				<form name="formNuevo" method="post" action="cliente_nuevo.php">
					<a onclick="location.href='javascript:document.formNuevo.submit()'";>
						<img src="../../img/logo_nuevo.png" class="zoom" title="Registrar Nuevo Cliente" style="cursor: pointer;">
					</a>
				</form>
			</td>
		</tr>
	</table>
	<!--------------BUSCADOR---------------->
	<center>
		<form action="#" method="post" name="formu">
			<table border="1" class="listado">
				<tr>
					<th>
						<b>Apellidos</b><br />
						<input type="text" name="apellidos" value="" size="10" onKeyUp="buscar()">
					</th>
					<th>
						<b>Nombres</b><br />
						<input type="text" name="nombres" value="" size="10" onKeyUp="buscar()">
					</th>
				</tr>
			</table>
		</form>
	</center>
	<!-----------END BUSCADOR--------------->
	<br><br>
	<center>
		<div id="clientes1">
		<table class="listado" border="1">
			<tr>
				<th>NRO</th><th>NOMBRES</th><th>APELLIDOS</th><th>DIRECCION</th><th>TELEFONO</th><th>EMPRESA</th><th>RECOMENDACIONES</th>
				<th><img src="../../img/modificar.png"></th><th><img src="../../img/borrar.png"></th>
			</tr>
			{assign var="b" value="0"}
			{assign var="total" value="`$pagina-1`"}
			{assign var="a" value="`$numreg*$total`"}
			{assign var="b" value="`$b+1+$a`"}
			{foreach item=r from=$clientes}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.nombres}</td>
				<td>{$r.apellidos}</td>
				<td>{$r.direc_cliente}</td>
				<td>{$r.telefono}</td>
				<td>{$r.nombre}</td>
				<td>{$r.recomendaciones}</td>
				<td align="center">
					<form name="formModif{$r.id_cliente}" method="post" action="cliente_modificar.php">
						<input type="hidden" name="id_cliente" value="{$r.id_cliente}">
						<input type="hidden" name="id_empresa" value="{$r.id_empresa}">
						<a onclick="location.href='javascript:document.formModif{$r.id_cliente}.submit()'"; title="Modificar Cliente Sistema" style="cursor: pointer;">
							Modificar
						</a>
					</form>
				</td>
				<td align="center">
					<form name="formElimi{$r.id_cliente}" method="post" action="cliente_eliminar.php">
						<input type="hidden" name="id_cliente" value="{$r.id_cliente}">
						<a href="javascript:document.formElimi{$r.id_cliente}.submit();" title="Eliminar Cliente" onclick='javascript:return(confirm("Deseas relamente Eliminar al cliente:::{$r.nombres}?"));'>
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
	</div>
	</center>
</body>
</html>