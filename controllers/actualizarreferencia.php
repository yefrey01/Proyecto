<meta charset="UTF-8">
<?php
session_start();

$ruta="../models/";
include($ruta . 'referencia_equipo.php');
$obj_refequipo=new referencia_equipo();

		if (isset($_POST['accion'])){
            switch($_POST['accion']) {
                
                case "1" :

				$var_descripcion=$_POST['txt_descripcion'];

				$var_idreferenciaequipo=$obj_refequipo -> insert_refequipo(0,$var_descripcion);

				header('Location: ../views/novedad/agregarnovedad.php');
				break;

				case "2":
				
				$var_idreferenciaequipo=$_POST['idreferenciaequipo'];
				$var_descripcion=$_POST['txt_descripcion'];

				$obj_refequipo -> editar_refequipo();

				header('Location: ../views/novedad/index.php');
				break;

				case "3":

				$var_idreferenciaequipo=$_POST['idreferenciaequipo'];

				$obj_novedad -> eliminar_refequipo($var_idreferenciaequipo);

				header('Location: ../views/novedad/index.php');
				break;

			}
		}

?>