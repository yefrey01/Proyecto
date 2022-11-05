<?php
class tratamiento{
	

	public function getalltratamiento(){
		include('dbinsert.php');

		$sql = "SELECT * FROM tratamiento";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta);
			$fila=0;
			if($Row_Fila>0){
				while ($record=mysqli_fetch_assoc($consulta)){
					$V_datostratamiento[$fila]=array('id_tratamiento'=>$record["id_tratamiento"],'descripcion'=>$record["descripcion"]);
					$fila++;
				}
			}
			return $V_datostratamiento;
		}
		else{
			return 0;
		}
			mysqli_close($conectar);

	}

	public function gettratamiento($var_idtratamiento){
		include('dbinsert.php');

		$var_idtratamiento=mysqli_real_escape_string($conectar,$var_idtratamiento);

		$sql = "SELECT * FROM tratamiento WHERE(id_tratamiento=$var_idtratamiento)";
			if($consulta = mysqli_query($conectar,$sql)){

				$V_datostratamiento = mysqli_fetch_assoc($consulta);
	 		    return $V_datostratamiento;
			}
			else{
				return 0;
			}
			mysqli_close($conectar);

	}

	public function insert_tratamiento($var_idtratamiento,$var_descripcion){
		include('dbinsert.php');

		$var_idtratamiento=mysqli_real_escape_string($conectar,$var_idtratamiento);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);

		$sql = "INSERT INTO tratamiento(id_tratamiento,descripcion) VALUES($var_idtratamiento,'$var_descripcion')";
			
		if ($consulta=mysqli_query($conectar,$sql)){
			return mysqli_insert_id($conectar);
		}else{
			return 0;
		}
		mysqli_close($conectar);
	}

	public function editar_tratamiento($var_idtratamiento,$var_descripcion){
		include('dbinsert.php');

		$var_idtratamiento=mysqli_real_escape_string($conectar,$var_idtratamiento);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);

		$sql = "UPDATE tratamiento SET id_tratamiento=$var_idtratamiento, descripcion='$var_descripcion' WHERE(id_tiponovedad=$var_idtratamiento)";
		if ($consulta=mysqli_query($conectar,$sql)){
			return 1;
			}else{
				return 0;
			}
			mysqli_close($conectar);
	}
}
?>