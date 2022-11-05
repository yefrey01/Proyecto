<?php
class tiponovedad{
	

	public function getalltiponovedad(){
		include('dbinsert.php');

		$sql = "SELECT * FROM tipo_novedad";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta);
			$fila=0;
			if($Row_Fila>0){
				while ($record=mysqli_fetch_assoc($consulta)){
					$V_datostiponovedad[$fila]=array('id_tiponovedad'=>$record["id_tiponovedad"],'descripcion'=>$record["descripcion"]);
					$fila++;
				}
			}
			return $V_datostiponovedad;
		}
		else{
			return 0;
		}
			mysqli_close($conectar);

	}

	public function gettiponovedad($var_idtiponovedad){
		include('dbinsert.php');

		$var_idtiponovedad=mysqli_real_escape_string($conectar,$var_idtiponovedad);

		$sql = "SELECT * FROM tipo_novedad WHERE(id_tiponovedad=$var_idtiponovedad)";
			if($consulta = mysqli_query($conectar,$sql)){

				$V_datostiponovedad = mysqli_fetch_assoc($consulta);
	 		    return $V_datostiponovedad;
			}
			else{
				return 0;
			}
			mysqli_close($conectar);

	}

	public function insert_tiponovedad($var_idtiponovedad,$var_descripcion){
		include('dbinsert.php');

		$var_idtiponovedad=mysqli_real_escape_string($conectar,$var_idtiponovedad);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);

		$sql = "INSERT INTO tipo_novedad(id_tiponovedad,descripcion) VALUES($var_idtiponovedad,'$var_descripcion')";
			
		if ($consulta=mysqli_query($conectar,$sql)){
			return mysqli_insert_id($conectar);
		}else{
			return 0;
		}
		mysqli_close($conectar);
	}

	public function editar_tiponovedad($var_idtiponovedad,$var_descripcion){
		include('dbinsert.php');

		$var_idtiponovedad=mysqli_real_escape_string($conectar,$var_idtiponovedad);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);

		$sql = "UPDATE tipo_novedad SET id_tiponovedad=$var_idtiponovedad, descripcion='$var_descripcion' WHERE(id_tiponovedad=$var_idtiponovedad)";
		if ($consulta=mysqli_query($conectar,$sql)){
			return 1;
			}else{
				return 0;
			}
			mysqli_close($conectar);
	}
}
?>