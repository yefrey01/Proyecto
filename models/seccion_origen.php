<?php
class seccion_origen{
	

	public function getallsecorigen(){
		include('dbinsert.php');

		$sql = "SELECT * FROM seccion_origen";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta);
			$fila=0;
			if($Row_Fila>0){
				while ($record=mysqli_fetch_assoc($consulta)){
					$V_datosseccionorig[$fila]=array('id_seccionorigen'=>$record["id_seccionorigen"],'descripcion'=>$record["descripcion"]);
					$fila++;
				}
			}
			return $V_datosseccionorig;
		}
		else{
			return 0;
		}
			mysqli_close($conectar);

	}

	public function getallsecorigenporigen(){

		include('dbinsert.php');

		$sql = "SELECT so.*,po.id_procesoorigen, po.descripcion as proceso FROM seccion_origen so, proceso_origen po where(po.id_procesoorigen = so.id_procesoorigen) ";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta);
			$fila=0;
			if($Row_Fila>0){
				while ($record=mysqli_fetch_assoc($consulta)){
					$V_datosseccionorig[$fila]=array('id_seccionorigen'=>$record["id_seccionorigen"],'descripcion'=>$record["descripcion"],'id_procesoorigen'=>$record["id_procesoorigen"],'rutadash'=>$record["rutadash"],'proceso'=>$record["proceso"]);
					$fila++;
				}
			}
			return $V_datosseccionorig;
		}
		else{
			return 0;
		}
			mysqli_close($conectar);

	}


	public function getsecorigen($var_idseccionorigen){
		include('dbinsert.php');

		$var_idseccionorigen=mysqli_real_escape_string($conectar,$var_idseccionorigen);

		$sql = "SELECT * FROM seccion_origen WHERE(id_seccionorigen=$var_idseccionorigen)";
			if($consulta = mysqli_query($conectar,$sql)){

				$V_datosseccionorig = mysqli_fetch_assoc($consulta);
	 		    return $V_datosseccionorig;
			}
			else{
				return 0;
			}
			mysqli_close($conectar);

	}

	public function insert_secorigen($var_idseccionorigen,$var_descripcion,$var_idprocesoorigen){
		include('dbinsert.php');

		$var_idseccionorigen=mysqli_real_escape_string($conectar,$var_idseccionorigen);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);
		$var_idprocesoorigen=mysqli_real_escape_string($conectar,$var_idprocesoorigen);

		$sql = "INSERT INTO seccion_origen(id_seccionorigen,descripcion,id_procesoorigen) VALUES($var_idseccionorigen,'$var_descripcion',var_idprocesoorigen)";
			
		if ($consulta=mysqli_query($conectar,$sql)){
			return mysqli_insert_id($conectar);
		}else{
			return 0;
		}
		mysqli_close($conectar);
	}

	public function editar_secorigen($var_idseccionorigen,$var_descripcion,$var_idprocesoorigen){
		include('dbinsert.php');

		$var_idseccionorigen=mysqli_real_escape_string($conectar,$var_idseccionorigen);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);
		$var_idprocesoorigen=mysqli_real_escape_string($conectar,$var_idprocesoorigen);

		$sql = "UPDATE seccion_origen SET id_seccionorigen=$var_idseccionorigen, descripcion='$var_descripcion',id_procesoorigen=$var_idprocesoorigen WHERE(id_seccionorigen=$var_idseccionorigen)";
		if ($consulta=mysqli_query($conectar,$sql)){
			return 1;
			}else{
				return 0;
			}
			mysqli_close($conectar);
	}
}
?>