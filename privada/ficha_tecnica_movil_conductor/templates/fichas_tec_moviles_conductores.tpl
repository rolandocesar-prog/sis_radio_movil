<!DOCTYPE html>
<html lang="esp">
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<meta charset="utf-8">
	<script type="text/javascript" src="../../ajax.js"></script>
	<script type="text/javascript">
		function buscar() {

		var d1, d2, contenedor, url;
			contenedor = document.getElementById('moviles1');
			d1 = document.formu.num_movil.value;
			d2 = document.formu.placa.value;
			d3 = document.formu.nombres.value;
			d4 = document.formu.apellidos.value;
			ajax = nuevoAjax();
			url = "ajax_buscar_movil_conductor.php"
			param = "num_movil="+d1+"&placa="+d2+"&nombres="+d3+"&apellidos="+d4;
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

		function mostrar(id_movil){
			d1 = id_movil; // valor que viene del onclick
			//alert(id_persona);
			ventanaCalendario = window.open("fichas_tec_moviles_conductores1.php?id_movil=" +d1 , "calendario","width=600,height=550,left=100,top=100,scrollbars=yes,menubars=no,statusbar=NO,status=NO,resizable=YES,location=NO")
		}
	</script>
</head>
<body class="fondo">
	<br><br>
	<h1>FICHAS TECNICAS DE MOVILES-CONDUCTORES</h1>
	<br>
	<!-----------------BUSCADOR--------------------->
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
					<th>
						<b>Nombres</b><br />
						<input type="text" name="nombres" value="" size="10" onKeyUp="buscar()">
					</th>
					<th>
						<b>Apellidos</b><br />
						<input type="text" name="apellidos" value="" size="10" onKeyUp="buscar()">
					</th>
				</tr>
			</table>
		</form>
	</center>
	<!------------------BUSCADOR--------------------->
	<center>
		<div id="moviles1">
		</div>

</body>
</html>