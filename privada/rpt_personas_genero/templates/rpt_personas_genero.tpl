<!DOCTYPE html>
<html lang="esp">
	<head>
		<link rel="stylesheet" type="text/css" href="../{$direc_css}">
		<meta charset="utf-8">
		{literal}
		<script type="text/javascript">
			function validar() {
				genero = document.formu.genero.value;
				if (document.formu.genero.value == "") {
					alert("Por favor seleccione el genero");
					document.formu.genero.focus();
					return;
				}
				ventanaCalendario = window.open("rpt_personas_genero1.php?genero=" + genero , "calendario" , "width=600, height=550,left=100,top=100,scrollbars=yes,menubars=NO,statusbar=NO,status=NO,rezizable=YES,location=NO")
			}
		</script>
		{/literal}
	</head>
	<body class="fondo">
		<br><br>
		<h1>REPORTE DE PERSONAS POR GENERO</h1>
		<br>
		<center>
			<form method="post" name="formu">
				<table border="1">
					<tr>
						<th>Selecciona Genero</th><th>:</th>
						<td>
							<select name="genero">
								<option value="">--Seleccione--</option>
								<option value="T">Todos</option>
								<option value="F">Femenino</option>
								<option value="M">Masculino</option>
							</select>
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