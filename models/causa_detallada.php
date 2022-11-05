<?php
class causa_detallada{
	

	public function getallcausadet(){
		include('dbinsert.php');

		$sql = "SELECT * FROM causa_detallada";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta);
			$fila=0;
			if($Row_Fila>0){
				while ($record=mysqli_fetch_assoc($consulta)){
					$V_datoscausadet[$fila]=array('id_causadetallada'=>$record["id_causadetallada"],'descripcion'=>$record["descripcion"]);
					$fila++;
				}
			}
			return $V_datoscausadet;
		}
		else{
			return 0;
		}
			mysqli_close($conectar);

	}

	public function getseccreporta($var_idcausadetallada){
		include('dbinsert.php');

		$var_idcausadetallada=mysqli_real_escape_string($conectar,$var_idcausadetallada);

		$sql = "SELECT * FROM causa_detallada WHERE(id_causadetallada=$var_idcausadetallada)";
			if($consulta = mysqli_query($conectar,$sql)){

				$V_datoscausadet = mysqli_fetch_assoc($consulta);
	 		    return $V_datoscausadet;
			}
			else{
				return 0;
			}
			mysqli_close($conectar);

	}

	public function insert_causadet($var_idcausadetallada,$var_descripcion){
		include('dbinsert.php');

		$var_idcausadetallada=mysqli_real_escape_string($conectar,$var_idcausadetallada);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);

		$sql = "INSERT INTO causa_detallada(id_causadetallada,descripcion) VALUES($var_idcausadetallada,'$var_descripcion')";
			
		if ($consulta=mysqli_query($conectar,$sql)){
			return mysqli_insert_id($conectar);
		}else{
			return 0;
		}
		mysqli_close($conectar);
	}

	public function editar_causadet($var_idcausadetallada,$var_descripcion){
		include('dbinsert.php');

		$var_idcausadetallada=mysqli_real_escape_string($conectar,$var_idcausadetallada);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);

		$sql = "UPDATE causa_detallada SET id_causadetallada=$var_idcausadetallada, descripcion='$var_descripcion' WHERE(id_causadetallada=$var_idcausadetallada)";
		if ($consulta=mysqli_query($conectar,$sql)){
			return 1;
			}else{
				return 0;
			}
			mysqli_close($conectar);
	}
}
?>