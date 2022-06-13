<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	<script type="text/javascript" src="../../ajax.js"></script>
	<script type="text/javascript">
		function buscar(){
		var d1, contenedor, url;
			contenedor = document.getElementById('personas1');
			d1 = document.formu.paterno.value;
			d2 = document.formu.materno.value;
			d3 = document.formu.nombres.value;
			d4 = document.formu.ci.value;
			ajax = nuevoAjax();
			url = "ajax_buscar_personas.php"
			param = "paterno="+d1+"&materno="+d2+"&nombres="+d3+"&ci="+d4;
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
				<h1>PERSONAS</h1>
			</td>
			<td align="left" width="33%">
				<form name="formNuevo" method="post" action="persona_nuevo.php">
					<a onclick="location.href='javascript:document.formNuevo.submit();'">
						<img src="../../img/logo_nuevo.png" class="zoom" title="Registrar Nueva Persona" style="cursor: pointer;">
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
						<b>Paterno</b><br />
						<input type="text" name="paterno" value="" size="10" onKeyUp="buscar()">
					</th>
					<th>
						<b>Materno</b><br />
						<input type="text" name="materno" value="" size="10" onKeyUp="buscar()">
					</th>
					<th>
						<b>Nombre</b><br />
						<input type="text" name="nombres" value="" size="10" onKeyUp="buscar()">
					</th>
					<th>
						<b>C.I.</b><br />
						<input type="text" name="ci" value="" size="10" onKeyUp="buscar()">
					</th>
				</tr>
			</table>
		</form>
	</center>
	<!-----------END BUSCADOR--------------->
	<br><br>
	<center>
		<div id="personas1">
		<table class="listado" border="1">
			<tr>
				<th>NRO</th><th>CI</th><th>NOMBRES</th><th>APELLIDO PATERNO</th><th>APELLIDO MATERNO</th><th>DIRECCION</th><th>TELEFONO</th><th>GENERO</th>
				<th><img src="../../img/modificar.png"></th><th><img src="../../img/borrar.png"></th>
			</tr>
			{assign var="b" value="0"}
			{assign var="total" value="`$pagina-1`"}
			{assign var="a" value="`$numreg*$total`"}
			{assign var="b" value="`$b+1+$a`"}
			{foreach item=r from=$personas}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.ci}</td>
				<td>{$r.nombres}</td>
				<td>{$r.ap}</td>
				<td>{$r.am}</td>
				<td>{$r.direccion}</td>
				<td>{$r.telefono}</td>
				<td align="center">{$r.genero}</td>
				<td align="center">
					<form name="formModif{$r.id_persona}" method="post" action="persona_modificar.php">
						<input type="hidden" name="id_persona" value="{$r.id_persona}">
						<a onclick="location.href='javascript:document.formModif{$r.id_persona}.submit();'" style="cursor: pointer;" title="Modificar Persona Sistema" class="zoom1">
							Modificar
						</a>
					</form>
				</td>
				<td align="center">
					<form name="formElimi{$r.id_persona}" method="post" action="persona_eliminar.php">
						<input type="hidden" name="id_persona" value="{$r.id_persona}">
						<a href="javascript:document.formElimi{$r.id_persona}.submit();" title="Eliminar Persona Sistema" onclick='javascript:return(confirm("Deseas relamente Eliminar a la persona..{$r.nombres} {$r.ap} {$r.am}?"));'>
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
		<!--<a href="../../index.php"><img src="../../img/principal.png" title="Pagina principal"></a>-->
	</center>
</body>
</html>