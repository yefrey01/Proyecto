<?php

class rol{

	public function getallroles(){
		include('dbinsert.php');

		$sql = "SELECT * FROM rol";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta); 
			$fila=0;
				if($Row_Fila>0){
					while ($record=mysqli_fetch_assoc($consulta)){
						$V_Datosrol[$fila]=array('id_rol'=>$record["id_rol"],'descripcion'=>$record["descripcion"]);
						$fila++;
					}
				}
				return $V_Datosrol;				
			}	
			else{
				return 0;
			}			
			
			mysqli_close($conectar);
	}
}

?>