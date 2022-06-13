<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
		{literal}
			<script>
				function refrescar(){
					var p = window.parent;
					p.location.href='../';
				}
			</script>
		{/literal}
	</head>
	<body ONLOAD="self.setTimeout('refrescar()',2000);" class="fondo">
		<center>
			<br><br>
			<h1><h3>{$mensage}</h3></h1>
			<br>
			<h1><h3>{$mensage1}</h3></h1>
		</center>
	</body>
</html>