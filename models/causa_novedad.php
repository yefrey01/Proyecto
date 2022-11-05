<?php
class causa_novedad{
	

	public function getallcausanov(){
		include('dbinsert.php');

		$sql = "SELECT * FROM causa_novedad";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta);
			$fila=0;
			if($Row_Fila>0){
				while ($record=mysqli_fetch_assoc($consulta)){
				$V_datoscausanov[$fila]=array('id_causanovedad'=>$record["id_causanovedad"],'descripcion'=>$record["descripcion"],
					'id_seccionorigen'=>$record["id_seccionorigen"]);
				$fila++;
				}
			}
			return $V_datoscausanov;
		}
		else{
			return 0;
		}
			mysqli_close($conectar);

	}

	public function getallcausanovbyidseccion($var_idseccionorigen){
		include('dbinsert.php');

		$sql = "SELECT * FROM causa_novedad WHERE (id_seccionorigen=$var_idseccionorigen)";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta);
			$fila=0;
			if($Row_Fila>0){
				while ($record=mysqli_fetch_assoc($consulta)){
				$V_datoscausanov[$fila]=array('id_causanovedad'=>$record["id_causanovedad"],'descripcion'=>$record["descripcion"],
					'id_seccionorigen'=>$record["id_seccionorigen"]);
				$fila++;
				}
			}
			return $V_datoscausanov;
		}
		else{
			return 0;
		}
			mysqli_close($conectar);

	}




	public function getallcausanovseccion(){
		include('dbinsert.php');

		$sql = "SELECT cn.*,so.descripcion as seccion FROM causa_novedad cn, seccion_origen so where(so.id_seccionorigen = cn.id_seccionorigen) ";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta);
			$fila=0;
			if($Row_Fila>0){
				while ($record=mysqli_fetch_assoc($consulta)){
				$V_datoscausanov[$fila]=array('id_causanovedad'=>$record["id_causanovedad"],'descripcion'=>$record["descripcion"],
					'id_seccionorigen'=>$record["id_seccionorigen"],'seccion'=>$record["seccion"]);
				$fila++;
				}
			}
			return $V_datoscausanov;
		}
		else{
			return 0;
		}
			mysqli_close($conectar);

	}

	public function getcausanov($var_idcausanovedad){
		include('dbinsert.php');

		$var_idcausanovedad=mysqli_real_escape_string($conectar,$var_idcausanovedad);

		$sql = "SELECT * FROM causa_novedad WHERE(id_causanovedad=$var_idcausanovedad)";
			if($consulta = mysqli_query($conectar,$sql)){

				$V_datoscausanov = mysqli_fetch_assoc($consulta);
	 		    return $V_datoscausanov;
			}
			else{
				return 0;
			}
			mysqli_close($conectar);

	}

	public function insert_causanov($var_idcausanovedad,$var_descripcion,$var_idseccionorigen){
		include('dbinsert.php');

		$var_idcausanovedad=mysqli_real_escape_string($conectar,$var_idcausanovedad);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);
		$var_idseccionorigen=mysqli_real_escape_string($conectar,$var_idseccionorigen);

		$sql = "INSERT INTO causa_novedad(id_causanovedad,descripcion,id_seccionorigen) VALUES($var_idcausanovedad,'$var_descripcion',$var_idseccionorigen)";
			
		if ($consulta=mysqli_query($conectar,$sql)){
			return mysqli_insert_id($conectar);
		}else{
			return 0;
		}
		mysqli_close($conectar);
	}

	public function editar_causanov($var_idcausanovedad,$var_descripcion,$var_idseccionorigen){
		include('dbinsert.php');

		$var_idcausanovedad=mysqli_real_escape_string($conectar,$var_idcausanovedad);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);
		$var_idseccionorigen=mysqli_real_escape_string($conectar,$var_idseccionorigen);

		$sql = "UPDATE causa_novedad SET id_causanovedad=$var_idcausanovedad, descripcion='$var_descripcion',id_seccionorigen=$var_idseccionorigen WHERE(id_causanovedad=$var_idcausanovedad)";
		if ($consulta=mysqli_query($conectar,$sql)){
			return 1;
			}else{
				return 0;
			}
			mysqli_close($conectar);
	}
}
?>