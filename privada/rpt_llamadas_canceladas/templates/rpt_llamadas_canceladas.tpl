<!DOCTYPE html>
<html lang="esp">
	<head>
		<link rel="stylesheet" type="text/css" href="../{$direc_css}">
		<link rel="stylesheet" type="text/css" href="../calendario/tcal.css" />
		<script type="text/javascript" src="../calendario/tcal.js"></script>
		<meta charset="utf-8">
		{literal}
		<script type="text/javascript">
			function validar() {
				fecha1 = document.formu.date1.value;
				fecha2 = document.formu.date2.value;
				descripcion = document.formu.descripcion.value;
				if ((document.formu.date1.value =="")||(document.formu.date2.value =="")||(document.formu.date1.value > document.formu.date2.value)) {
					alert("Fechas incorrectas");
					document.formu.date1.focus();
					return;
				}
				if (document.formu.descripcion.value =="") {
					alert("Debe seleccinar un tipo de llamada");
					document.formu.descripcion.focus();
					return;
				}
				ventanaCalendario = window.open("rpt_llamadas_canceladas1.php?fecha1=" + fecha1 + "&fecha2=" +fecha2+ "&descripcion=" +descripcion , "calendario" , "width=600, height=550,left=100,top=100,scrollbars=yes,menubars=NO,statusbar=NO,status=NO,rezizable=YES,location=NO")
			}
		</script>
		{/literal}
	</head>
	<body class="fondo">
		<br><br>
		<h1>REPORTE DE LLAMADAS POR FECHA Y TIPO DE LLAMADA</h1>
		<br>
		<center>
			<form method="post" name="formu">
				<table border="1">
					<tr>
						<th>Tipo de Llamada</th><th>:</th>
						<td>
							<select name="descripcion">
								<option value="">--Seleccione--</option>
								<option value="T">Todas</option>
								<option value="L">Llamadas</option>
								<option value="S">Servicios</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>Fecha Inicio de Reporte</th><th>:</th>
						<td>
							<input type="text" name="date1" class="tcal" value="" size="10">
						</td>
						<th>Fecha Fin de Reporte</th><th>:</th>
						<td>
							<input type="text" name="date2" class="tcal" value="" size="10">
						</td>	
					</tr>
					<tr>
						<td align="center" colspan="6">
							<input type="hidden" name="accion" value="">
							<input type="button" class="boton" value="Aceptar" onclick="validar();">
						</td>
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>