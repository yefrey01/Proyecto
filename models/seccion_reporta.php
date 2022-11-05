<?php
class seccion_reporta{
	

	public function getallseccreporta(){
		include('dbinsert.php');

		$sql = "SELECT * FROM seccion_reporta";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta);
			$fila=0;
			if($Row_Fila>0){
				while ($record=mysqli_fetch_assoc($consulta)){
					$V_datossecreporta[$fila]=array('id_seccionreporta'=>$record["id_seccionreporta"],'descripcion'=>$record["descripcion"]);
					$fila++;
				}
			}
			return $V_datossecreporta;
		}
		else{
			return 0;
		}
			mysqli_close($conectar);

	}

	public function getseccreporta($var_idseccionreporta){
		include('dbinsert.php');

		$var_idseccionreporta=mysqli_real_escape_string($conectar,$var_idseccionreporta);

		$sql = "SELECT * FROM seccion_reporta WHERE(id_seccionreporta=$var_idseccionreporta)";
			if($consulta = mysqli_query($conectar,$sql)){

				$V_datossecreporta = mysqli_fetch_assoc($consulta);
	 		    return $V_datossecreporta;
			}
			else{
				return 0;
			}
			mysqli_close($conectar);

	}

	public function insert_seccreporta($var_idseccionreporta,$var_descripcion){
		include('dbinsert.php');

		$var_idseccionreporta=mysqli_real_escape_string($conectar,$var_idseccionreporta);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);

		$sql = "INSERT INTO seccion_reporta(id_seccionreporta,descripcion) VALUES($var_idseccionreporta,'$var_descripcion')";
			
		if ($consulta=mysqli_query($conectar,$sql)){
			return mysqli_insert_id($conectar);
		}else{
			return 0;
		}
		mysqli_close($conectar);
	}

	public function editar_seccreporta($var_idseccionreporta,$var_descripcion){
		include('dbinsert.php');

		$var_idseccionreporta=mysqli_real_escape_string($conectar,$var_idseccionreporta);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);

		$sql = "UPDATE seccion_reporta SET id_seccionreporta=$var_idseccionreporta, descripcion='$var_descripcion' WHERE(id_seccionreporta=$var_idseccionreporta)";
		if ($consulta=mysqli_query($conectar,$sql)){
			return 1;
			}else{
				return 0;
			}
			mysqli_close($conectar);
	}
}
?>