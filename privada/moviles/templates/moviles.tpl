<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	<script type="text/javascript" src="../../ajax.js"></script>
	<script type="text/javascript">
		function buscar(){
		var d1,d2, contenedor, url;
			contenedor = document.getElementById('moviles1');
			d1 = document.formu.num_movil.value;
			d2 = document.formu.placa.value;
			ajax = nuevoAjax();
			url = "ajax_buscar_moviles.php"
			param = "num_movil="+d1+"&placa="+d2;
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
				<h1>MOVILES</h1>
			</td>
			<td align="left" width="33%">
				<form name="formNuevo" method="post" action="movil_nuevo.php">
					<a onclick="location.href='javascript:document.formNuevo.submit()'";>
						<img src="../../img/logo_nuevo.png" class="zoom" title="Registrar Nuevo Movil" style="cursor: pointer;">
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
						<b>Numero de Movil</b><br />
						<input type="text" name="num_movil" value="" size="10" onKeyUp="buscar()">
					</th>
					<th>
						<b>Placa</b><br />
						<input type="text" name="placa" value="" size="10" onKeyUp="buscar()">
					</th>
				</tr>
			</table>
		</form>
	</center>
	<!-----------END BUSCADOR--------------->
	<br><br>
	<center>
		<div id="moviles1">
		<table class="listado" border="1">
			<tr>
				<th>NRO</th><th>SOCIO</th><th>TIPO MOVIL</th><th>NUMERO MOVIL</th><th>PLACA</th>
				<th><img src="../../img/modificar.png"></th><th><img src="../../img/borrar.png"></th>
			</tr>
			{assign var="b" value="0"}
			{assign var="total" value="`$pagina-1`"}
			{assign var="a" value="`$numreg*$total`"}
			{assign var="b" value="`$b+1+$a`"}
			{foreach item=r from=$movil}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.nombres_socio} {$r.apellidos_socio}</td>
				<td>{$r.tipo_movil}</td>
				<td align="center">{$r.num_movil}</td>
				<td>{$r.placa}</td>
				<td align="center">
					<form name="formModif{$r.id_movil}" method="post" action="movil_modificar.php">
						<input type="hidden" name="id_movil" value="{$r.id_movil}">
						<input type="hidden" name="id_socio" value="{$r.id_socio}">
						<input type="hidden" name="id_tipo_movil" value="{$r.id_tipo_movil}">
						<a onclick="location.href='javascript:document.formModif{$r.id_movil}.submit()'"; title="Modificar Movil Sistema" style="cursor: pointer;">
							Modificar
						</a>
					</form>
				</td>
				<td align="center">
					<form name="formElimi{$r.id_movil}" method="post" action="movil_eliminar.php">
						<input type="hidden" name="id_movil" value="{$r.id_movil}">
						<a href="javascript:document.formElimi{$r.id_movil}.submit();" title="Eliminar Movil" onclick='javascript:return(confirm("Deseas relamente Eliminar al movil:::{$r.num_movil} del socio {$r.nombres_socio} {$r.apellidos_socio}?"));'>
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