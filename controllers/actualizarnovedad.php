<meta charset="UTF-8">
<?php
session_start();
$ruta="../models/";
include($ruta . 'novedad.php');
$obj_novedad = new novedad();

		if (isset($_POST['accion'])){
            switch($_POST['accion']) {
                
               case "1" :

				$var_fecha=$_POST['txt_fecha'];
				$var_idtiponovedad=$_POST['rad_tiponovedad'];
				$var_idseccionreporta=$_POST['sel_sreporta'];
				$var_idprocesoorigen=$_POST['sel_porigen'];
				$var_idseccionorigen=$_POST['sel_sorigen'];
				$var_idcausanovedad=$_POST['sel_cnovedad'];
				$var_descripcion=$_POST['txt_descripcion'];
				$var_idreferenciaequipo=$_POST['sel_requipo'];
				$var_numpiezas=$_POST['txt_npiezas'];
				$var_ordenproduccion=$_POST['txt_oproduccion'];
				$var_idtratamiento=$_POST['sel_tratamiento'];
				$var_idcausadetallada=$_POST['sel_cdetallada'];
				$var_observaciones=$_POST['observaciones'];
				$var_dia=$_POST['txt_dia'];
				$var_hora=$_POST['txt_hora'];
				$var_min=$_POST['txt_min'];

				$var_idnovedad=$obj_novedad -> insert_novedad(0,$var_fecha,$var_idtiponovedad,$var_idseccionreporta,$var_idprocesoorigen,$var_idseccionorigen,$var_idcausanovedad,$var_idreferenciaequipo,$var_descripcion,$var_numpiezas,$var_ordenproduccion,$var_idtratamiento,$var_idcausadetallada,$var_observaciones,$_SESSION["ses_idusuario"],$var_dia,$var_hora,$var_min);

				header('Location: ../views/novedad/index.php');
				break;

				case "2":
				
				$var_idnovedad=$_POST['id_novedad'];
				$var_fecha=$_POST['txt_fecha'];
				$var_idtiponovedad=$_POST['rad_tiponovedad'];
				$var_idseccionreporta=$_POST['sel_sreporta'];
				$var_idprocesoorigen=$_POST['sel_porigen'];
				$var_idseccionorigen=$_POST['sel_sorigen'];
				$var_idcausanovedad=$_POST['sel_cnovedad'];
				$var_descripcion=$_POST['txt_descripcion'];
				$var_idreferenciaequipo=$_POST['sel_requipo'];
				$var_numpiezas=$_POST['txt_npiezas'];
				$var_ordenproduccion=$_POST['txt_oproduccion'];
				$var_idtratamiento=$_POST['sel_tratamiento'];
				$var_idcausadetallada=$_POST['sel_cdetallada'];
				$var_observaciones=$_POST['observaciones'];
				$var_dia=$_POST['txt_dia'];
				$var_hora=$_POST['txt_hora'];
				$var_min=$_POST['txt_min'];

				$obj_novedad -> editar_novedad($var_idnovedad,$var_fecha,$var_idtiponovedad,$var_idseccionreporta,$var_idprocesoorigen,$var_idseccionorigen,$var_idcausanovedad,$var_idreferenciaequipo,$var_descripcion,$var_numpiezas,$var_ordenproduccion,$var_idtratamiento,$var_idcausadetallada,$var_observaciones,$_SESSION["ses_idusuario"],$var_dia,$var_dia,$var_min);

			
				header('Location: ../views/novedad/index.php');
				break;
				case "3":

				$var_idnovedad=$_POST['idnovedad'];

				$obj_novedad -> eliminar_producto($var_idnovedad);

				header('Location: ../views/novedad/index.php');
				break;

			}
		}

?>