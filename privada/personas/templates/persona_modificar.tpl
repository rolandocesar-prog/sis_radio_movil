<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}" type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"> </script>
	<script type="text/javascript" src="js/validar_persona.js"></script>
</head>
<body class="fondo">
	<center>
		<br><br>
		<h1>MODIFICAR PERSONA</h1>
		<br>
		<form action="persona_modificar1.php" method="post" name="formu">
			<table class="listado" border="1">
				{foreach item=r from=$persona}
				<tr>
					<th align="right">Ci (*)</th><th>:</th>
					<td><input type="text" name="ci" onkeyup="this.value=this.value.toUpperCase()" value="{$r.ci}">  </td>
				</tr>
				<tr>
					<th align="right">Nombres (*)</th><th>:</th>
					<td><input type="text" name="nombres" onkeyup="this.value=this.value.toUpperCase()" value="{$r.nombres}">  </td>
				</tr>
				<tr>
					<th align="right">Apellido Paterno</th><th>:</th>
					<td><input type="text" name="ap" onkeyup="this.value=this.value.toUpperCase()" value="{$r.ap}">  </td>
				</tr>
				<tr>
					<th align="right">Apellido Materno (*)</th><th>:</th>
					<td><input type="text" name="am" onkeyup="this.value=this.value.toUpperCase()" value="{$r.am}">  </td>
				</tr>
				<tr>
					<th align="right">Direccion (*)</th><th>:</th>
					<td><input type="text" name="direccion" onkeyup="this.value=this.value.toUpperCase()" value="{$r.direccion}">  </td>
				</tr>
				<tr>
					<th align="right">Telefono (*)</th><th>:</th>
					<td><input type="text" name="telefono" onkeyup="this.value=this.value.toUpperCase()" value="{$r.telefono}">  </td>
				</tr>
				<tr>
					<th align="right">Genero (*)</th> <th>:</th>
					<td>
						<input type="radio" name="genero" value="M" {if $r.genero == 'M'} checked {/if}>Masculino 
						<input type="radio" name="genero" value="F" {if $r.genero == 'F'} checked {/if}>Femenino &nbsp;&nbsp;&nbsp;
					</td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<input type="hidden" name="accion" value="" ="">
						<input type="hidden" name="id_persona" value="{$r.id_persona}">
						<input type="button" class="boton" value="Aceptar" onclick="validar();">
						<input type="button" class="boton" value="Cancelar" onclick="javascript:location.href='personas.php';">
					</td>
				</tr>
				{/foreach}
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