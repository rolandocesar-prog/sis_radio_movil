<?php ob_start();
require_once("../../conexion.php");

$sql = $db->Prepare("SELECT *
					FROM clientes c, llamadas l, tipo_llamada t, tipos_moviles m
					WHERE c.id_cliente = l.id_cliente
					AND t.id_tipo_llamada = l.id_tipo_llamada
					AND m.id_tipo_movil = l.id_tipo_movil
					AND c.estado <> 0
					AND l.estado <> 0
					AND t.estado <> 0
					AND m.estado <> 0
					");
$rs = $db->GetAll($sql);
$codigo_html ='
<!DOCTYPE html>
<html>
	<head>
		<link href="../../css/pdf.css" rel="stylesheet">
	</head>
	<body>
		<table width="100%" border="0">
			<tr>
				<td><img src="../../img/logo_andaluz.gif" width="25%" ></td>
				<td align="center" width="80%"><h1><font color="green">CLIENTES - LLAMADAS</font></h1></td>
			</tr>
		</table>
		<br>
		<center>
			<table border="1" cellspacing="0">
				<tr>
				<th>NRO</th><th>NOMBRES</th><th>APELLIDOS</th><th>DIRECCION CLIENTE</th><th>TELEFONO</th><th>OBSERVACIONES</th>
				<th>RECOMENDACIONES</th><th>TIPO LLAMADA</th><th>TIPO MOVIL</th><th>MOVIL ASIGNADO</th><th>ESTADO DE LLAMADA</th>
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
							<td>'.$fila['observaciones'].'</td>
							<td>'.$fila['recomendaciones'].'</td>
							<td>'.$fila['descripcion'].'</td>
							<td>'.$fila['tipo_movil'].'</td>
							<td>'.$fila['movil_asignado'].'</td>
							<td>'.$fila['estado_llamada'].'</td>
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