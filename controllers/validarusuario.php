<?php
    session_start();
	$ruta="../models/";
	include($ruta . 'usuario.php');
	include($ruta . 'seg_medio.php');

	$obj_usuario = new usuario();
	$obj_segmedio = new seg_medio();
		

	$var_usuario = $obj_segmedio ->limpiar_sql($_POST["usuario"]);
	$var_contrasena = $obj_segmedio ->limpiar_sql($_POST["contrasena"]);
	$v_datosusuario=$obj_usuario -> validariniciosesion($var_usuario,$var_contrasena);

	$var_idusuario=$v_datosusuario['id_usuario'];
	$var_nombrecompleto=$v_datosusuario['nombres'].' '.$v_datosusuario['apellidos'];
	$var_idrol=$v_datosusuario['id_rol'];
	$usuario=$v_datosusuario['usuario'];	


	if($var_usuario != '' && $var_nombrecompleto != '' && $usuario == $var_usuario){	
				   $_SESSION["autenticado"]= "SI";
				   $_SESSION["ses_username"]=$var_usuario;
				   $_SESSION["ses_nombreuser"]=$var_nombrecompleto;
				   $_SESSION["ses_idrol"]=$var_idrol;
				   $_SESSION["ses_idusuario"]=$var_idusuario;

				   $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
				   $_SESSION['IPaddress'] = $obj_segmedio ->getOriginIP();
				   $_SESSION['LastActivity'] = $_SERVER['REQUEST_TIME'];	

				   header ("Location: ../views/index.php");
			 } 
			 else {
				   header("Location: ../index.php?error=si");
			 }
?> 