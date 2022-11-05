<meta charset="UTF-8">
<?php
$ruta="../models/";
include($ruta . 'usuario.php');
$obj_usuario = new usuario();

		if (isset($_POST['accion'])){
            switch($_POST['accion']) {
                
                case "1" :

				$var_nombres=$_POST['txt_nombre'];
				$var_apellidos=$_POST['txt_apellidos'];
				$var_usuario=$_POST['txt_usuario'];
				$var_contrasena=$_POST['txt_contraseña'];
				$var_estado=$_POST['sel_estado'];
				$var_idrol=$_POST['sel_rol'];

				$var_idusuario=$obj_usuario -> insert_usuario(0,$var_nombres,$var_apellidos,$var_usuario,$var_contrasena,$var_estado, $var_idrol);

				header('Location: ../views/usuario/index.php');
				break;

				case "2":

				$var_idusuario=$_POST['idusuario'];
				$var_nombres=$_POST['txt_nombre'];
				$var_apellidos=$_POST['txt_apellidos'];
				$var_usuario=$_POST['txt_usuario'];
				$var_contrasena=$_POST['txt_contraseña'];
				$var_estado=$_POST['sel_estado'];
				$var_idrol=$_POST['sel_rol'];

				$obj_usuario -> editar_usuario($var_idusuario,$var_nombres,$var_apellidos,$var_usuario,$var_contrasena,$var_estado, $var_idrol);

				header('Location: ../views/usuario/index.php');
				break;

				case "3":

				$var_idusuario=$_POST['id_usuario'];
				$var_contrasena=$_POST['txt_cnueva2'];

				$obj_usuario -> cambio_contrasena($var_idusuario,$var_contrasena);

				header('Location: ../views/index.php');
				break;

			}
		}

?>