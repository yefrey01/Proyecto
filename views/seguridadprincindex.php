<?php

	$ruta="../models/";
	include($ruta . 'seg_medio.php');

	$obj_segmedio = new seg_medio();
	
	$Autoriza = isset ($_SESSION["autenticado"]) ;
	$navegador = $_SERVER['HTTP_USER_AGENT'];
	$ip = $obj_segmedio ->getOriginIP();


	if ( $Autoriza != TRUE || $_SESSION["autenticado"] != "SI" || $_SESSION['IPaddress'] != $ip || $_SESSION['userAgent'] != $navegador) {			
				   session_unset(); 
				   session_destroy();

			   header('Location: ../../index.php');
			   exit();
			}
		else{

		}

?>