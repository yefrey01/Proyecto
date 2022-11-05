<?php
class referencia_equipo{
	

	public function getallrefequipo(){
		include('dbinsert.php');

		$sql = "SELECT * FROM referencia_equipo";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta);
			$fila=0;
			if($Row_Fila>0){
				while ($record=mysqli_fetch_assoc($consulta)){
					$V_datosrefequipo[$fila]=array('id_referenciaequipo'=>$record["id_referenciaequipo"],'descripcion'=>$record["descripcion"]);
					$fila++;
				}
			}
			return $V_datosrefequipo;
		}
		else{
			return 0;
		}
			mysqli_close($conectar);

	}

	public function getrefequipo($var_idreferenciaequipo){
		include('dbinsert.php');

		$var_idreferenciaequipo=mysqli_real_escape_string($conectar,$var_idreferenciaequipo);

		$sql = "SELECT * FROM referencia_equipo WHERE(id_referenciaequipo=$var_idreferenciaequipo)";
			if($consulta = mysqli_query($conectar,$sql)){

				$V_datosrefequipo = mysqli_fetch_assoc($consulta);
	 		    return $V_datosrefequipo;
			}
			else{
				return 0;
			}
			mysqli_close($conectar);

	}

	public function insert_refequipo($var_idreferenciaequipo,$var_descripcion){
		include('dbinsert.php');

		$var_idreferenciaequipo=mysqli_real_escape_string($conectar,$var_idreferenciaequipo);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);

		$sql = "INSERT INTO referencia_equipo(id_referenciaequipo,descripcion) VALUES($var_idreferenciaequipo,'$var_descripcion')";
			
		if ($consulta=mysqli_query($conectar,$sql)){
			return mysqli_insert_id($conectar);
		}else{
			return 0;
		}
		mysqli_close($conectar);
	}

	public function editar_refequipo($var_idreferenciaequipo,$var_descripcion){
		include('dbinsert.php');

		$var_idreferenciaequipo=mysqli_real_escape_string($conectar,$var_idreferenciaequipo);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);

		$sql = "UPDATE referencia_equipo SET id_referenciaequipo=$var_idreferenciaequipo, descripcion='$var_descripcion' WHERE(id_referenciaequipo=$var_idreferenciaequipo)";
		if ($consulta=mysqli_query($conectar,$sql)){
			return 1;
			}else{
				return 0;
			}
			mysqli_close($conectar);
	}
}
?>