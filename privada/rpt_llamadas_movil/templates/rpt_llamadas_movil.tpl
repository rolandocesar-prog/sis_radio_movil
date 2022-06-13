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
				num_movil = document.formu.num_movil.value;
				if ((document.formu.date1.value =="")||(document.formu.date2.value =="")||(document.formu.date1.value > document.formu.date2.value)) {
					alert("Fechas incorrectas");
					document.formu.date1.focus();
					return;
				}
				if (document.formu.num_movil.value =="") {
					alert("Debe seleccinar un movil");
					document.formu.num_movil.focus();
					return;
				}
				ventanaCalendario = window.open("rpt_llamadas_movil1.php?fecha1=" + fecha1 + "&fecha2=" +fecha2+ "&num_movil=" +num_movil , "calendario" , "width=600, height=550,left=100,top=100,scrollbars=yes,menubars=NO,statusbar=NO,status=NO,rezizable=YES,location=NO")
			}
		</script>
		{/literal}
	</head>
	<body class="fondo">
		<br><br>
		<h1>REPORTE DE LLAMADAS POR MOVIL</h1>
		<br>
		<center>
			<form method="post" name="formu">
				<table border="1">
					<tr>
						<th>Numero de movil</th><th>:</th>
						<td>
							<select name="num_movil">
								<option value="">--Seleccione--</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
								<option value="32">32</option>
								<option value="33">33</option>
								<option value="34">34</option>
								<option value="35">35</option>
								<option value="36">36</option>
								<option value="37">37</option>
								<option value="38">38</option>
								<option value="39">39</option>
								<option value="40">40</option>
								<option value="41">41</option>
								<option value="42">42</option>
								<option value="43">43</option>
								<option value="44">44</option>
								<option value="45">45</option>
								<option value="46">46</option>
								<option value="47">47</option>
								<option value="48">48</option>
								<option value="49">49</option>
								<option value="50">50</option>
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