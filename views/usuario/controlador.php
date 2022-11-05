<?php
session_start();

include('../seguridad.php');
$ruta="../../models/";
include($ruta . 'usuario.php');
$obj_usuario=new usuario();	

	$Accion=$_GET['accion'];
	
	header("Content-Type: text/html;charset=utf-8");
	switch(trim($Accion)) {
			
		// AQUI SE PINTAN LAS FASES DE ACUERDO AL PROYECTO
		case "1" : 
					$Var_pass=$_GET['pass1'];
					$Var_passnuevo1=$_GET['pass2'];
					$Var_passnuevo2=$_GET['pass3'];

					$v_resultado=$obj_usuario -> validariniciosesion($_SESSION["ses_username"],$Var_pass);
					$var_idusuario=$v_resultado["id_usuario"];

					if(trim($var_idusuario)!=""){
						if($Var_passnuevo1 == $Var_passnuevo2){
							echo"1111";// Listo se puede hacer el cambio
						}else{
							echo"2222"; // Los password nuevos no corresponden
						}
					}else{
							echo"3333"; // El pass anterior no corresponde
					}

			break;
	
	}
?>