<?php ob_start();
require_once("../../conexion.php");

$sql = $db->Prepare("SELECT *
					FROM telefonistas_operadoras t, contratos c, funciones f, turnos u
					WHERE t.id_telefonista_operadora = c.id_telefonista_operadora
					AND t.id_telefonista_operadora = f.id_telefonista_operadora
					AND t.id_telefonista_operadora = u.id_telefonista_operadora
					AND t.estado <> 0
					AND c.estado <> 0
					AND f.estado <> 0
					AND t.estado <> 0
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
				<td align="center" width="80%"><h1><font color="green">REPORTE TELEFONISTAS - OPERADORAS </font></h1></td>
			</tr>
		</table>
		<br>
		<center>
			<table border="1" cellspacing="0">
				<tr>
					<th>NRO</th><th>NOMBRES</th><th>APELLIDOS</th><th>INCIO CONTRATO- FIN CONTRATO</th><th>SALARIO</th><th>FUNCION</th><th>INICIO FUNCION - FIN FUNCION</th><th>TURNO</th><th>INICIO TURNO - FIN TURNO</th>
				</tr> ';
				if ($rs){
					$b = 1;
					foreach	($rs as $k => $fila)
						$codigo_html.='<tr>
							<td>'.$b++.'</td>
							<td>'.$fila['nombres'].'</td>
							<td>'.$fila['apellidos'].'</td>
							<td>'.$fila['fecha_inicio'].' / '.$fila['fecha_fin'].'</td>
							<td>'.$fila['salario'].'</td>
							<td>'.$fila['funcion'].'</td>
							<td>'.$fila['fecha_inicio_fu'].' / '.$fila['fecha_fin_fu'].'</td>
							<td>'.$fila['turno'].'</td>
							<td>'.$fila['fecha_inicio_tu'].' / '.$fila['fecha_fin_tu'].'</td>
						</tr>';
				}
				$codigo_html.='</table>' ;
?>
<?php
require_once("../../dompdf/dompdf_config.inc.php");

$dompdf = new DOMPDF();
//$dompdf->set_paper("a4", "landscape");
//$dompdf->set_paper("a4", "portrait");
$codigo_html=utf8_decode($codigo_html);
$dompdf->load_html($codigo_html);
$dompdf->render();
$pdf = $dompdf->output();
/*$filename = "./archivos/ejemplo".date('Y-m-d_H-i-s').".pdf";*/
$filename = "./archivos/reporte".date(" d")." de ".date("m")." de ".date("Y")."  h ".date("G")." m ".date("i")." s ".date("s").".pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($pdf);
?>