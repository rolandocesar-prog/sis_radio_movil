<?php ob_start();
require_once("../../conexion.php");

$sql = $db->Prepare("SELECT *
					FROM personas p, usuarios u
					WHERE p.id_persona =u.id_persona
					AND p.estado <> 0
					AND u.estado <> 0
					");
$rs = $db->GetAll($sql);
$codigo_html ='
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<table width="100%" border="0">
			<tr>
				<td><img src="../../imagenes/empleados7.jpg" width="70%" ></td>
				<td align="center" width="80%"><h1> TELEFONISTAS - OPERADORAS </h1></td>
			</tr>
		</table>
		<br>
		<center>
			<table border="1" cellspacing="0">
				<tr>
					<th>NRO</th><th>PERSONA</th><th>CI</th><th>TELEFONO</th><th>GENERO</th><th>USUARIO</th><th>CLAVE</th>
				</tr> ';
				if ($rs){
					$b = 1;
					foreach	($rs as $k => $fila)
						$codigo_html.='<tr>
							<td>'.$b++.'</td>
							<td>'.$fila['nombres'].' '.$fila['ap'].' '.$fila['am'].'</td>
							<td>'.$fila['ci'].'</td>
							<td>'.$fila['telefono'].'</td>
							<td>'.$fila['genero'].'</td>
							<td>'.$fila['usuario1'].'</td>
							<td>'.$fila['clave'].'</td>
						</tr>';
				}
				$codigo_html.='</table>' ;
?>
<?php
require_once("../../dompdf/dompdf_config.inc.php");

$dompdf = new DOMPDF();
$codigo_html=utf8_decode($codigo_html);
$dompdf->load_html($codigo_html);
$dompdf->render();
$pdf = $dompdf->output();
/*$filename = "./archivos/ejemplo".date('Y-m-d_H-i-s').".pdf";*/
$filename = "./archivos/reporte".date(" d")." de ".date("m")." de ".date("Y")."  h ".date("G")." m ".date("i")." s ".date("s").".pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($pdf);
?>