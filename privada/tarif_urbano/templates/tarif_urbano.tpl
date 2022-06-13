<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	<!-----------------------BUSCADOR AJAX--------------------------->
	<script type="text/javascript" src="../../ajax.js"></script>
	<script type="text/javascript">
		function buscar(){
		var d1, d2, d3, d4, contenedor, url;
			contenedor = document.getElementById('tarif_urbano1');
			d1 = document.formu.lugar.value;
			d2 = document.formu.una_persona.value;
			d3 = document.formu.dos_personas.value;
			d4 = document.formu.tres_personas.value;
			ajax = nuevoAjax();
			url = "ajax_buscar_tarif_urbano.php"
			param = "lugar="+d1+"&una_persona="+d2+"&dos_personas="+d3+"&tres_personas="+d4;
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
	<!---------------------END BUSCADOR AJAX----------------------------->
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
				<h1>TARIFARIO URBANO</h1>
			</td>
			<td align="left" width="33%">
				<form name="formNuevo" method="post" action="tarif_urbano_nuevo.php">
					<a href="javascript:document.formNuevo.submit();">
						<img src="../../img/logo_nuevo.png" class="zoom" title="Registrar Nuevo Tarifario Urbano">
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
						<b>Lugar</b><br />
						<input type="text" name="lugar" value="" size="10" onKeyUp="buscar()">
					</th>
					<th>
						<b>Una Persona</b><br />
						<input type="text" name="una_persona" value="" size="10" onKeyUp="buscar()">
					</th>
					<th>
						<b>Dos Persona</b><br />
						<input type="text" name="dos_personas" value="" size="10" onKeyUp="buscar()">
					</th>
					<th>
						<b>Tres Persona</b><br />
						<input type="text" name="tres_personas" value="" size="10" onKeyUp="buscar()">
					</th>
				</tr>
			</table>
		</form>
	</center>
	<!-----------END BUSCADOR--------------->
	<br><br>
	<center>
		<div id="tarif_urbano1">
		<table class="listado" border="1">
			<tr>
				<th>NRO</th><th>EMPRESA</th><th>ZONA</th><th>LUGAR</th><th>1 PERSONA</th><th>2 PERSONAS</th><th>3 PERSONAS</th>
				<th><img src="../../img/modificar.png"></th><th><img src="../../img/borrar.png"></th>
			</tr>
			{assign var="b" value="1"}
			{foreach item=r from=$tarifario_urbano}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.nombre}</td>
				<td>{$r.zona}</td>
				<td>{$r.lugar}</td>
				<td align="center">{$r.una_persona}</td>
				<td align="center">{$r.dos_personas}</td>
				<td align="center">{$r.tres_personas}</td>
				<td align="center">
					<form name="formModif{$r.id_tar_urb}" method="post" action="tarif_urbano_modificar.php">
						<input type="hidden" name="id_tar_urb" value="{$r.id_tar_urb}">
						<input type="hidden" name="id_empresa" value="{$r.id_empresa}">
						<input type="hidden" name="id_zona" value="{$r.id_zona}">
						<a href="javascript:document.formModif{$r.id_tar_urb}.submit();" title="Modificar Tarifario Urbano Sistema">
							Modificar
						</a>
					</form>
				</td>
				<td align="center">
					<form name="formElimi{$r.id_tar_urb}" method="post" action="tarif_urbano_eliminar.php">
						<input type="hidden" name="id_tar_urb" value="{$r.id_tar_urb}">
						<a href="javascript:document.formElimi{$r.id_tar_urb}.submit();" title="Eliminar Tarifario Urbano" onclick='javascript:return(confirm("Deseas relamente Eliminar el Tarifario Urbano :::{$r.lugar} de la zona {$r.zona} ?"));'>
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