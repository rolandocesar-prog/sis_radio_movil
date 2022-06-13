<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_llamada.js"></script>
	<script type="text/javascript" src="../../ajax.js"></script>
	<script type="text/javascript">
		function buscar(){
			var d1, contenedor, url;
			contenedor = document.getElementById('clientes');
			contenedor2 = document.getElementById('cliente_seleccionado');
			contenedor3 = document.getElementById('cliente_insertado');
			d1 = document.formu.nombres.value;
			d2 = document.formu.apellidos.value;
			d3 = document.formu.direc_cliente.value;
			d4 = document.formu.telefono.value;
			d5 = document.formu.recomendaciones.value;
			ajax = nuevoAjax();
			url = "ajax_buscar_cliente.php";
			param = "nombres="+d1+"&apellidos="+d2+"&direc_cliente="+d3+"&telefono="+d4+"&recomendaciones="+d5;
			ajax.open("POST", url, true);
			ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4){
					contenedor.innerHTML = ajax.responseText;
					contenedor2.innerHTML = "";
					contenedor3.innerHTML = "";
				}
			}
			ajax.send(param);
		}
		function buscar_cliente(id_cliente){
			var d1, contenedor, url;
			contenedor = document.getElementById('cliente_seleccionado');
			contenedor2 = document.getElementById('clientes');
			document.formu.id_cliente.value = id_cliente;

			d1 = id_cliente;

			ajax = nuevoAjax();
			url = "ajax_buscar_cliente1.php"
			param = "id_cliente="+d1;
			ajax.open("POST", url, true);
			ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4){
					contenedor.innerHTML = ajax.responseText;
					contenedor2.innerHTML = "";
				}
			}
			ajax.send(param);
		}
		function insertar_cliente(){
			var d1, contenedor, url;
			contenedor = document.getElementById('cliente_seleccionado');
			contenedor2 = document.getElementById('clientes');
			contenedor3 = document.getElementById('cliente_insertado');
			d1 = document.formu.nombres1.value;
			d2 = document.formu.apellidos1.value;
			d3 = document.formu.direc_cliente1.value;
			d4 = document.formu.telefono1.value;
			d5 = document.formu.recomendaciones1.value;
		
			if (d1 == "") {
				alert("El nombre es incorrecto o esta vacio");
				document.formu.nombres1.focus();
				return;
			}
			if (d2 == "") {
				alert("Por favor introduzca un apellido");
				document.formu.apellidos1.focus();
				return;
			}
			if (d4 == "") {
				alert("EL telefono esta vacio");
				document.formu.telefono1.focus();
				return;
			}
			if (d5 == "") {
				alert("Recomendaciones esta vacio");
				document.formu.recomendaciones1.focus();
				return;
			}
			ajax = nuevoAjax();
			url = "ajax_inserta_cliente.php"
			param = "nombres1="+d1+"&apellidos1="+d2+"&direc_cliente1="+d3+"&telefono1="+d4+"&recomendaciones1="+d5;
			ajax.open("POST", url, true);
			ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4){
					contenedor.innerHTML = "";
					contenedor2.innerHTML = "";
					contenedor3.innerHTML = ajax.responseText;
				}
			}
			ajax.send(param);
		}
	</script>
</head>
<body class="fondo">
	<br><br>
	<h1>REGISTRAR LLAMADA</h1>
	<br>
	<center>
		<form action="llamada_nuevo1.php" method="post" name="formu">
			<table border="1" class="listado">
				<tr>
					<th align="right">Ingresar Datos (*)</th>
					<th>:</th>
					<td>
						<table>
							<tr>
								<td>
									<b>Nombres</b><br />
									<input type="text" name="nombres" value="" size="10" onkeyup="buscar()">
								</td>
								<td>
									<b>Apellidos</b><br />
									<input type="text" name="apellidos" value="" size="10" onkeyup="buscar()">
								</td>
								<td>
									<b>Direccion</b><br />
									<input type="text" name="direc_cliente" value="" size="10" onkeyup="buscar()">
								</td>
								<td>
									<b>Telefono</b><br />
									<input type="text" name="telefono" value="" size="10" onkeyup="buscar()">
								</td>
								<td>
									<b>Recomendaciones</b><br />
									<input type="text" name="recomendaciones" value="" size="10" onkeyup="buscar()">
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="6">
						<table width="100%">
							<tr>
								<td colspan="3">
									<div id="clientes"> </div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="6">
						<table width="100%">
							<tr>
								<td colspan="3">
									<div id="cliente_seleccionado"> </div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="6">
						<table width="100%">
							<tr>
								<td colspan="3">
									<input type="hidden" name="id_cliente">
									<div id="cliente_insertado"> </div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th align="right">Tipo Llamada (*)</th>
					<th>:</th>
					<td>
						<select name="id_tipo_llamada">
							<option value="">---seleccione---</option>
							{foreach item=r from=$tipo_llamada}
							<option value="{$r.id_tipo_llamada}">{$r.descripcion}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Tipo Movil (*)</th>
					<th>:</th>
					<td>
						<select name="id_tipo_movil">
							<option value="">---seleccione---</option>
							{foreach item=r from=$tipos_movil}
							<option value="{$r.id_tipo_movil}">{$r.tipo_movil}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<th align="right">Observaciones (*)</th>
					<th>:</th>
					<td><input type="text" name="observaciones" onkeyup="this.value=this.value.toUpperCase()"></td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='llamadas.php';">
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td colspan="3" align="center" class="obligatorio"><b>(*)Campos Obligatorios</b></td>
				</tr>
			</table>	
		</form>
	</center>
</body>
</html>