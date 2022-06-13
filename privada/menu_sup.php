	<?php
	session_start();
	require_once("../smarty/Smarty.class.php");
	require_once("../conexion.php");

	$smarty = new Smarty;

	//$DB->DEBUG=TRUE;
	if (isset($_SESSION["sesion_id_usuario"])) {
		$sesion = array ("id_usuario" => $_SESSION["sesion_id_usuario"],
						"usuario" => $_SESSION["sesion_usuario"],
						"id_rol" => $_SESSION["sesion_id_rol"],
						"rol" => $_SESSION["sesion_rol"],
						);
		$login = "NO";
	} else {
		$sesion = array ("id_usuario" => "-",
						"usuario" => "-",
						"id_rol" => "-",
						"rol" => "-",
						);
		$login = "SI";
	}

	/*PARA QUE EL NOMBRE Y LOGO DE LA EMPRESA SEAN AUTOGESTIONABLE*/
	$sql1 = $db->Prepare("SELECT *
						FROM empresa
						WHERE id_empresa = 1
						AND estado <> 0
						");
	$rs1 = $db->GetAll($sql1);
	$nombre = $rs1[0]["nombre"];
	$logo_empresa = $rs1[0]["logo_empresa"];
	$smarty->assign("nombre", $nombre);
	$smarty->assign("logo_empresa", $logo_empresa);

	/*--------------------------FIN AUTOGESTION--------------------------------*/

	$smarty->assign("sesion", $sesion);
	$smarty->assign("login", $login);
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("menu_sup.tpl");
	?>