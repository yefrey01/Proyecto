<?php 
$ruta="/../models/";
include($ruta .'dbinsert.php');

		//$var_idprocesoorigen=mysqli_real_escape_string($conectar,$var_idprocesoorigen);
		$id_procesoorigen = $_REQUEST["id_procesoorigen"];

		$sql = "SELECT * FROM seccion_origen WHERE id_procesoorigen='$id_procesoorigen'";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta);
			$fila=0;
			if($Row_Fila>0){
				while ($record=mysqli_fetch_assoc($consulta)){
					$V_datosseccionorig[$fila]=array('id_seccionorigen'=>$record["id_seccionorigen"],'descripcion'=>$record["descripcion"],'id_procesoorigen'=>$record["id_procesoorigen"]);
					$fila++;
				}
			}
			echo json_encode( $V_datosseccionorig );
			}
			else{
				return 0;
			}
			mysqli_close($conectar);

?>