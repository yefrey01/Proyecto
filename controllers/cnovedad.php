<?php 
$ruta="/../models/";
include($ruta.'dbinsert.php');

		//$var_idprocesoorigen=mysqli_real_escape_string($conectar,$var_idprocesoorigen);
		$idseccionorigen = $_REQUEST["idseccionorigen"];

		$sql = "SELECT * FROM causa_novedad WHERE id_seccionorigen='$idseccionorigen'";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta);
			$fila=0;
			if($Row_Fila>0){
				while ($record=mysqli_fetch_assoc($consulta)){
					$V_datosseccionorig[$fila]=array('id_causanovedad'=>$record["id_causanovedad"],'descripcion'=>$record["descripcion"],'id_seccionorigen'=>$record["id_seccionorigen"]);
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