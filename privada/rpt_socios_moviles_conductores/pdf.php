<?php ob_start();
require_once("../../conexion.php");

$sql = $db->Prepare("SELECT *
					FROM socios s, moviles m, tipos_moviles t, moviles_conductores u, conductores c
					WHERE s.id_socio = m.id_socio
					AND t.id_tipo_movil = m.id_tipo_movil
					AND m.id_movil = u.id_movil
					AND c.id_conductor = u.id_conductor
					AND s.estado <> 0
					AND m.estado <> 0
					AND t.estado <> 0
					AND u.estado <> 0
					AND c.estado <> 0
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
				<td><img src="../../img/logo_andaluz.gif" width="25%"></td>
				<td align="center" width="80%"><h1><font color="green">SOCIOS - MOVILES - CONDUCTORES </font></h1></td>
			</tr>
		</table>
		<br>
		<center>
			<table border="1" cellspacing="0">
				<tr>
					<th>NRO</th><th>CI SOCIO</th><th>NOMBRES SOCIO</th><th>APELLIDOS SOCIO</th><th>DIRECCION SOCIO</th><th>TELEFONO SOCIO</th><th>FECHA ALTA</th><th>NUMERO MOVIL</th><th>PLACA</th><th>TIPO MOVIL</th><th>NOMBRES CONDUCTOR</th><th>APELLIDOS CONDUCTOR</th><th>CI CONDUCTOR</th><th>LICENCIA</th><th>DIRECCION CONDUCTOR</th><th>TELEFONO CONDUCTOR</th>
				</tr> ';
				if ($rs){
					$b = 1;
					foreach	($rs as $k => $fila)
						$codigo_html.='<tr>
							<td>'.$b++.'</td>
							<td>'.$fila['ci_socio'].'</td>
							<td>'.$fila['nombres_socio'].'</td>
							<td>'.$fila['apellidos_socio'].'</td>
							<td>'.$fila['direc_socio'].'</td>
							<td>'.$fila['telefono_socio'].'</td>
							<td>'.$fila['fecha_alta'].'</td>
							<td>'.$fila['num_movil'].'</td>
							<td>'.$fila['placa'].'</td>
							<td>'.$fila['tipo_movil'].'</td>
							<td>'.$fila['nombres'].'</td>
							<td>'.$fila['apellidos'].'</td>
							<td>'.$fila['ci'].'</td>
							<td>'.$fila['licencia'].'</td>
							<td>'.$fila['direccion'].'</td>
							<td>'.$fila['telefono'].'</td>
						</tr>';
				}
				$codigo_html.='</table>' ;
?>
<?php
require_once("../../dompdf/dompdf_config.inc.php");

$dompdf = new DOMPDF();
$dompdf->set_paper("a4", "landscape");
$codigo_html=utf8_decode($codigo_html);
$dompdf->load_html($codigo_html);
$dompdf->render();
$pdf = $dompdf->output();
/*$filename = "./archivos/ejemplo".date('Y-m-d_H-i-s').".pdf";*/
$filename = "./archivos/reporte".date(" d")." de ".date("m")." de ".date("Y")."  h ".date("G")." m ".date("i")." s ".date("s").".pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($pdf);
?>