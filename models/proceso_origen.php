<?php
class proceso_origen{
	

	public function getallprocesoorig(){
		include('dbinsert.php');

		$sql = "SELECT * FROM proceso_origen";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta);
			$fila=0;
			if($Row_Fila>0){
				while ($record=mysqli_fetch_assoc($consulta)){
					$V_datosprocesoorig[$fila]=array('id_procesoorigen'=>$record["id_procesoorigen"],'descripcion'=>$record["descripcion"]);
					$fila++;
				}
			}
			return $V_datosprocesoorig;
		}
		else{
			return 0;
		}
			mysqli_close($conectar);

	}

	public function getprocesoorig($var_idprocesoorigen){
		include('dbinsert.php');

		$var_idprocesoorigen=mysqli_real_escape_string($conectar,$var_idprocesoorigen);

		$sql = "SELECT * FROM proceso_origen WHERE(id_procesoorigen=$var_idprocesoorigen)";
			if($consulta = mysqli_query($conectar,$sql)){

				$V_datosprocesoorig = mysqli_fetch_assoc($consulta);
	 		    return $V_datosprocesoorig;
			}
			else{
				return 0;
			}
			mysqli_close($conectar);

	}

	public function insert_procesoorig($var_idprocesoorigen,$var_descripcion){
		include('dbinsert.php');

		$var_idprocesoorigen=mysqli_real_escape_string($conectar,$var_idprocesoorigen);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);

		$sql = "INSERT INTO proceso_origen(id_procesoorigen,descripcion) VALUES($var_idprocesoorigen,'$var_descripcion')";
			
		if ($consulta=mysqli_query($conectar,$sql)){
			return mysqli_insert_id($conectar);
		}else{
			return 0;
		}
		mysqli_close($conectar);
	}

	public function editar_procesoorig($var_idprocesoorigen,$var_descripcion){
		include('dbinsert.php');

		$var_idprocesoorigen=mysqli_real_escape_string($conectar,$var_idprocesoorigen);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);

		$sql = "UPDATE proceso_origen SET id_procesoorigen=$var_idprocesoorigen, descripcion='$var_descripcion' WHERE(id_procesoorigen=$var_idprocesoorigen)";
		if ($consulta=mysqli_query($conectar,$sql)){
			return 1;
			}else{
				return 0;
			}
			mysqli_close($conectar);
	}
}
?>