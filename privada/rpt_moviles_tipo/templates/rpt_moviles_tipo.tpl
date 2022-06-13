<!DOCTYPE html>
<html lang="esp">
	<head>
		<link rel="stylesheet" type="text/css" href="../{$direc_css}">
		<meta charset="utf-8">
		{literal}
		<script type="text/javascript">
			function validar() {
				tipo_movil = document.formu.tipo_movil.value;
				if (document.formu.tipo_movil.value == "") {
					alert("Por favor seleccione el tipo de movil");
					document.formu.tipo_movil.focus();
					return;
				}
				ventanaCalendario = window.open("rpt_moviles_tipo1.php?tipo_movil=" + tipo_movil , "calendario" , "width=600, height=550,left=100,top=100,scrollbars=yes,menubars=NO,statusbar=NO,status=NO,rezizable=YES,location=NO")
			}
		</script>
		{/literal}
	</head>
	<body class="fondo">
		<br><br>
		<h1>REPORTE DE MOVILES POR TIPO DE MOVIL</h1>
		<br>
		<center>
			<form method="post" name="formu">
				<table border="1">
					<tr>
						<th>Selecciona Tipo de Movil</th><th>:</th>
						<td>
							<select name="tipo_movil">
								<option value="">--Seleccione--</option>
								<option value="T">Todos</option>
								<option value="A">Auto</option>
								<option value="V">Vagoneta</option>
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