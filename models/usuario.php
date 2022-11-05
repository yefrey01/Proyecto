<?php

class usuario{

	public function validariniciosesion($usuario,$contrasena){
			include('dbinsert.php');

			$usuario=mysqli_real_escape_string($conectar,$usuario);
			$contrasena=mysqli_real_escape_string($conectar,$contrasena);

			$sql = "SELECT * FROM usuario where (contrasena = CONCAT(MD5(CONCAT('$contrasena',right('$contrasena',16))),':',right(MD5('$contrasena'),16)) and usuario = '$usuario' and estado = 1)";

				if($consulta = mysqli_query($conectar,$sql)){

					$V_Datosusuario = mysqli_fetch_assoc($consulta);
		 		    return $V_Datosusuario;
				}
				else{
					return 0;
				}
			mysqli_close($conectar);
	}

	public function getallusuario(){
		include('dbinsert.php');

		$sql = "SELECT u.id_usuario,concat_ws(' ',u.nombres,u.apellidos) as nombrecompleto,u.usuario, u.estado,r.descripcion as nombrerol FROM usuario u, rol r where(r.id_rol=u.id_rol)";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta); 
			$fila=0;
				if($Row_Fila>0){
					while ($record=mysqli_fetch_assoc($consulta)){
						$V_Datosusuario[$fila]=array('id_usuario'=>$record["id_usuario"],'nombrecompleto'=>$record["nombrecompleto"],'usuario'=>$record["usuario"],'nombrerol'=>$record["nombrerol"],'estado'=>$record["estado"]);
						$fila++;
					}
				}
				return $V_Datosusuario;				
			}	
			else{
				return 0;
			}			
			
			mysqli_close($conectar);
	}

	public function getusuario($var_idusuario){
		include('dbinsert.php');

		$var_idusuario=mysqli_real_escape_string($conectar,$var_idusuario);

		$sql = "SELECT * FROM usuario WHERE(id_usuario=$var_idusuario)";
			if($consulta = mysqli_query($conectar,$sql)){

				$V_Datosusuario = mysqli_fetch_assoc($consulta);
	 		    return $V_Datosusuario;
			}
			else{
				return 0;
			}
			mysqli_close($conectar);

	}

	public function insert_usuario($var_idusuario,$var_nombres,$var_apellidos,$var_usuario,$var_contrasena,$var_estado, $var_idrol){
		include('dbinsert.php');

		$var_idusuario=mysqli_real_escape_string($conectar,$var_idusuario);
		$var_nombres=mysqli_real_escape_string($conectar,$var_nombres);
		$var_apellidos=mysqli_real_escape_string($conectar,$var_apellidos);
		$var_usuario=mysqli_real_escape_string($conectar,$var_usuario);
		$var_contrasena=mysqli_real_escape_string($conectar,$var_contrasena);
		$var_estado=mysqli_real_escape_string($conectar,$var_estado);
		$var_idrol=mysqli_real_escape_string($conectar,$var_idrol);

		$sql = "INSERT INTO usuario(id_usuario,nombres,apellidos,usuario,contrasena,estado,id_rol) VALUES($var_idusuario,'$var_nombres','$var_apellidos','$var_usuario',CONCAT(MD5(CONCAT('$var_contrasena',right('$var_contrasena',16))),':',right(MD5('$var_contrasena'),16)),$var_estado, $var_idrol)";
			
		if ($consulta=mysqli_query($conectar,$sql)){
			return mysqli_insert_id($conectar);
		}else{
			return 0;
			echo "Error al guardar";
		}
		mysqli_close($conectar);
	}

	public function editar_usuario($var_idusuario,$var_nombres,$var_apellidos,$var_usuario,$var_contrasena,$var_estado, $var_idrol){
		include('dbinsert.php');

		$var_idusuario=mysqli_real_escape_string($conectar,$var_idusuario);
		$var_nombres=mysqli_real_escape_string($conectar,$var_nombres);
		$var_apellidos=mysqli_real_escape_string($conectar,$var_apellidos);
		$var_usuario=mysqli_real_escape_string($conectar,$var_usuario);
		$var_contrasena=mysqli_real_escape_string($conectar,$var_contrasena);
		$var_estado=mysqli_real_escape_string($conectar,$var_estado);
		$var_idrol=mysqli_real_escape_string($conectar,$var_idrol);


		$sql = "UPDATE usuario SET id_usuario=$var_idusuario,nombres='$var_nombres',apellidos='$var_apellidos',usuario='$var_usuario',contrasena=CONCAT(MD5(CONCAT('$var_contrasena',right('$var_contrasena',16))),':',right(MD5('$var_contrasena'),16)),estado=$var_estado,id_rol=$var_idrol WHERE(id_usuario=$var_idusuario)";
		if ($consulta=mysqli_query($conectar,$sql)){
			return 1;
			}else{
				return 0;
			}
			mysqli_close($conectar);
	}

	public function cambio_contrasena($var_idusuario,$var_contrasena){
		include('dbinsert.php');

		$var_idusuario=mysqli_real_escape_string($conectar,$var_idusuario);
		$var_contrasena=mysqli_real_escape_string($conectar,$var_contrasena);


		$sql = "UPDATE usuario SET contrasena=CONCAT(MD5(CONCAT('$var_contrasena',right('$var_contrasena',16))),':',right(MD5('$var_contrasena'),16)) WHERE(id_usuario=$var_idusuario)";
		if ($consulta=mysqli_query($conectar,$sql)){
			return 1;
			}else{
				return 0;
			}
			mysqli_close($conectar);
	}
		
}


?>