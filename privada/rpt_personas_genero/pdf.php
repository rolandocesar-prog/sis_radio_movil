<?php ob_start();
require_once("../../conexion.php");

$sql = $db->Prepare("SELECT *
					FROM clientes c, llamadas l, tipo_llamada t
					WHERE c.id_cliente = l.id_cliente
					AND t.id_tipo_llamada = l.id_tipo_llamada
					AND c.estado <> 0
					AND l.estado <> 0
					AND t.estado <> 0
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
				<td align="center" width="80%"><h1> CLIENTES - LLAMADAS </h1></td>
			</tr>
		</table>
		<br>
		<center>
			<table border="1" cellspacing="0">
				<tr>
					<th>NRO</th><th>NOMBRES</th><th>APELLIDOS</th><th>DIRECCION CLIENTE</th><th>TELEFONO</th><th>DIRECCION LLAMADA</th><th>HORA LLAMADA - FECHA LLAMADA</th><th>OBSERVACIONES</th><th>TIPO LLAMADA</th>
				</tr> ';
				if ($rs){
					$b = 1;
					foreach	($rs as $k => $fila)
						$codigo_html.='<tr>
							<td>'.$b++.'</td>
							<td>'.$fila['nombres'].'</td>
							<td>'.$fila['apellidos'].'</td>
							<td>'.$fila['direc_cliente'].'</td>
							<td>'.$fila['telefono'].'</td>
							<td>'.$fila['direccion'].'</td>
							<td>'.$fila['hora_llamada'].' '.$fila['fecha_llamada'].'</td>
							<td>'.$fila['observaciones'].'</td>
							<td>'.$fila['descripcion'].'</td>
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
/*$filename = "./archivos/reporte".date(' Y-n-d  G-i-s').".pdf";*/
$filename = "./archivos/reporte".date(" d")." de ".date("m")." de ".date("Y")."  h ".date("G")." m ".date("i")." s ".date("s").".pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($pdf);
?>