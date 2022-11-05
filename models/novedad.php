<?php

class novedad{
	

	public function getallnovedad(){
		include('dbinsert.php');

		$sql = "SELECT nv.id_novedad,nv.fecha, tn.descripcion as tiponovedad, sr.descripcion as seccionreporta,po.descripcion as procesoorigen, so.descripcion as seccionorigen FROM novedad nv, tipo_novedad tn, seccion_reporta sr, proceso_origen po, seccion_origen so WHERE (po.id_procesoorigen=nv.id_procesoorigen AND sr.id_seccionreporta=nv.id_seccionreporta AND tn.id_tiponovedad = nv.id_tiponovedad AND so.id_seccionorigen=nv.id_seccionorigen)";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta); 
			$fila=0;
				if($Row_Fila>0){
					while ($record=mysqli_fetch_assoc($consulta)){
						$V_datosnovedad[$fila]=array('id_novedad'=>$record["id_novedad"],'fecha'=>$record["fecha"],'tiponovedad'=>$record["tiponovedad"],'seccionreporta'=>$record["seccionreporta"],'procesoorigen'=>$record["procesoorigen"],'seccionorigen'=>$record["seccionorigen"]);
						$fila++;
					}
				}
				return $V_datosnovedad;				
			}	
			else{
				return 0;
			}			
			
			mysqli_close($conectar);
	}

	public function getnovedadesxproceso($var_fechaini, $var_fechafin){
		include('dbinsert.php');

		$sql = "SELECT * FROM novedad WHERE (fecha BETWEEN '$var_fechaini' AND '$var_fechafin')";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta); 
			$fila=0;
				if($Row_Fila>0){
					while ($record=mysqli_fetch_assoc($consulta)){
						$V_datosnovedad[$fila]=array('id_novedad'=>$record["id_novedad"],'fecha'=>$record["fecha"],'id_tiponovedad'=>$record["id_tiponovedad"],'id_seccionreporta'=>$record["id_seccionreporta"],'id_procesoorigen'=>$record["id_procesoorigen"],'id_seccionorigen'=>$record["id_seccionorigen"],'id_causanovedad'=>$record["id_causanovedad"],'id_referenciaequipo'=>$record["id_referenciaequipo"],'descripcion'=>$record["descripcion"],'num_piezas'=>$record["num_piezas"],'ordenproduccion'=>$record["ordenproduccion"],'id_tratamiento'=>$record["id_tratamiento"],'dias'=>$record["dias"],'horas'=>$record["horas"],'minutos'=>$record["minutos"],'id_causadetallada'=>$record["id_causadetallada"],'observaciones'=>$record["observaciones"],'id_usuario'=>$record["id_usuario"]);
						$fila++;
					}
				}
				return $V_datosnovedad;				
			}	
			else{
				return 0;
			}			
			
			mysqli_close($conectar);
	}


	public function getnovprodxseccion($var_idseccionorigen,$var_fechaini, $var_fechafin){
		include('dbinsert.php');

		$sql = "SELECT * FROM novedad WHERE(id_procesoorigen=1 AND id_seccionorigen=$var_idseccionorigen AND fecha BETWEEN '$var_fechaini' AND '$var_fechafin')";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta); 
			$fila=0;
				if($Row_Fila>0){
					while ($record=mysqli_fetch_assoc($consulta)){
						$V_datosnovedad[$fila]=array('id_novedad'=>$record["id_novedad"],'fecha'=>$record["fecha"],'id_tiponovedad'=>$record["id_tiponovedad"],'id_seccionreporta'=>$record["id_seccionreporta"],'id_procesoorigen'=>$record["id_procesoorigen"],'id_seccionorigen'=>$record["id_seccionorigen"],'id_causanovedad'=>$record["id_causanovedad"],'id_referenciaequipo'=>$record["id_referenciaequipo"],'descripcion'=>$record["descripcion"],'num_piezas'=>$record["num_piezas"],'ordenproduccion'=>$record["ordenproduccion"],'id_tratamiento'=>$record["id_tratamiento"],'dias'=>$record["dias"],'horas'=>$record["horas"],'minutos'=>$record["minutos"],'id_causadetallada'=>$record["id_causadetallada"],'observaciones'=>$record["observaciones"]);
						$fila++;
					}
				}
				return $V_datosnovedad;				
			}	
			else{
				return 0;
			}			
			
			mysqli_close($conectar);
	}

	public function getnovxseccion($var_idseccionorigen,$var_fechaini, $var_fechafin){
		include('dbinsert.php');

		$sql = "SELECT * FROM novedad WHERE(id_seccionorigen=$var_idseccionorigen AND fecha BETWEEN '$var_fechaini' AND '$var_fechafin')";
			if($consulta=mysqli_query($conectar,$sql)){
			$Row_Fila = mysqli_num_rows($consulta); 
			$fila=0;
				if($Row_Fila>0){
					while ($record=mysqli_fetch_assoc($consulta)){
						$V_datosnovedad[$fila]=array('id_novedad'=>$record["id_novedad"],'fecha'=>$record["fecha"],'id_tiponovedad'=>$record["id_tiponovedad"],'id_seccionreporta'=>$record["id_seccionreporta"],'id_procesoorigen'=>$record["id_procesoorigen"],'id_seccionorigen'=>$record["id_seccionorigen"],'id_causanovedad'=>$record["id_causanovedad"],'id_referenciaequipo'=>$record["id_referenciaequipo"],'descripcion'=>$record["descripcion"],'num_piezas'=>$record["num_piezas"],'ordenproduccion'=>$record["ordenproduccion"],'id_tratamiento'=>$record["id_tratamiento"],'dias'=>$record["dias"],'horas'=>$record["horas"],'minutos'=>$record["minutos"],'id_causadetallada'=>$record["id_causadetallada"],'observaciones'=>$record["observaciones"]);
						$fila++;
					}
				}
				return $V_datosnovedad;				
			}	
			else{
				return 0;
			}			
			
			mysqli_close($conectar);
	}

	public function getnovedad($var_idnovedad){
		include('dbinsert.php');

		$var_idnovedad=mysqli_real_escape_string($conectar,$var_idnovedad);

		$sql = "SELECT * FROM novedad WHERE(id_novedad=$var_idnovedad)";
			if($consulta = mysqli_query($conectar,$sql)){

				$V_datosnovedad = mysqli_fetch_assoc($consulta);
	 		    return $V_datosnovedad;
			}
			else{
				return 0;
			}
			mysqli_close($conectar);

	}

	
	public function insert_novedad($var_idnovedad,$var_fecha,$var_idtiponovedad,$var_idseccionreporta,$var_idprocesoorigen,$var_idseccionorigen,$var_idcausanovedad,$var_idreferenciaequipo,$var_descripcion,$var_numpiezas,$var_ordenproduccion,$var_idtratamiento,$var_idcausadetallada,$var_observaciones,$var_idusuario,$var_dia,$var_hora,$var_min){
		include('dbinsert.php');

		$var_idnovedad=mysqli_real_escape_string($conectar,$var_idnovedad);
		$var_fecha=mysqli_real_escape_string($conectar,$var_fecha);
		$var_idtiponovedad=mysqli_real_escape_string($conectar,$var_idtiponovedad);
		$var_idseccionreporta=mysqli_real_escape_string($conectar,$var_idseccionreporta);
		$var_idprocesoorigen=mysqli_real_escape_string($conectar,$var_idprocesoorigen);
		$var_idseccionorigen=mysqli_real_escape_string($conectar,$var_idseccionorigen);
		$var_idcausanovedad=mysqli_real_escape_string($conectar,$var_idcausanovedad);
		$var_idreferenciaequipo=mysqli_real_escape_string($conectar,$var_idreferenciaequipo);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);
		$var_numpiezas=mysqli_real_escape_string($conectar,$var_numpiezas);
		$var_ordenproduccion=mysqli_real_escape_string($conectar,$var_ordenproduccion);
		$var_idtratamiento=mysqli_real_escape_string($conectar,$var_idtratamiento);
		$var_idcausadetallada=mysqli_real_escape_string($conectar,$var_idcausadetallada);		
		$var_observaciones=mysqli_real_escape_string($conectar,$var_observaciones);
		$var_idusuario=mysqli_real_escape_string($conectar,$var_idusuario);
		$var_dia=mysqli_real_escape_string($conectar,$var_dia);
		$var_hora=mysqli_real_escape_string($conectar,$var_hora);
		$var_min=mysqli_real_escape_string($conectar,$var_min);

		$sql = "INSERT INTO novedad(id_novedad,fecha,id_tiponovedad,id_seccionreporta,id_procesoorigen,id_seccionorigen,id_causanovedad,id_referenciaequipo,descripcion,num_piezas,ordenproduccion,id_tratamiento,id_causadetallada,observaciones,id_usuario,dias,horas,minutos) VALUES($var_idnovedad,'$var_fecha',$var_idtiponovedad,$var_idseccionreporta,$var_idprocesoorigen,$var_idseccionorigen,$var_idcausanovedad,$var_idreferenciaequipo,'$var_descripcion','$var_numpiezas',$var_ordenproduccion,$var_idtratamiento,$var_idcausadetallada,'$var_observaciones',$var_idusuario,'$var_dia','$var_hora','$var_min')";
			
		if ($consulta=mysqli_query($conectar,$sql)){
			return mysqli_insert_id($conectar);
		}else{
			return 0;
			echo "Error al guardar";
			echo mysqli_error();
		}
		mysqli_close($conectar);
	}

	public function editar_novedad($var_idnovedad,$var_fecha,$var_idtiponovedad,$var_idseccionreporta,$var_idprocesoorigen,$var_idseccionorigen,$var_idcausanovedad,$var_idreferenciaequipo,$var_descripcion,$var_numpiezas,$var_ordenproduccion,$var_idtratamiento,$var_idcausadetallada,$var_observaciones,$var_idusuario,$var_dia,$var_hora,$var_min){
		include('dbinsert.php');

		$var_idnovedad=mysqli_real_escape_string($conectar,$var_idnovedad);
		$var_fecha=mysqli_real_escape_string($conectar,$var_fecha);
		$var_idtiponovedad=mysqli_real_escape_string($conectar,$var_idtiponovedad);
		$var_idseccionreporta=mysqli_real_escape_string($conectar,$var_idseccionreporta);
		$var_idprocesoorigen=mysqli_real_escape_string($conectar,$var_idprocesoorigen);
		$var_idseccionorigen=mysqli_real_escape_string($conectar,$var_idseccionorigen);
		$var_idcausanovedad=mysqli_real_escape_string($conectar,$var_idcausanovedad);
		$var_idreferenciaequipo=mysqli_real_escape_string($conectar,$var_idreferenciaequipo);
		$var_descripcion=mysqli_real_escape_string($conectar,$var_descripcion);
		$var_numpiezas=mysqli_real_escape_string($conectar,$var_numpiezas);
		$var_ordenproduccion=mysqli_real_escape_string($conectar,$var_ordenproduccion);
		$var_idtratamiento=mysqli_real_escape_string($conectar,$var_idtratamiento);
		$var_idcausadetallada=mysqli_real_escape_string($conectar,$var_idcausadetallada);		
		$var_observaciones=mysqli_real_escape_string($conectar,$var_observaciones);
		$var_idusuario=mysqli_real_escape_string($conectar,$var_idusuario);
		$var_dia=mysqli_real_escape_string($conectar,$var_dia);
		$var_hora=mysqli_real_escape_string($conectar,$var_hora);
		$var_min=mysqli_real_escape_string($conectar,$var_min);


		$sql = "UPDATE novedad SET id_novedad=$var_idnovedad,fecha='$var_fecha',id_tiponovedad=$var_idtiponovedad,id_seccionreporta=$var_idseccionreporta,id_procesoorigen=$var_idprocesoorigen,id_seccionorigen=$var_idseccionorigen,id_causanovedad=$var_idcausanovedad,id_referenciaequipo=$var_idreferenciaequipo,descripcion='$var_descripcion',num_piezas='$var_numpiezas',ordenproduccion=$var_ordenproduccion,id_tratamiento=$var_idtratamiento,id_causadetallada=$var_idcausadetallada,observaciones='$var_observaciones',id_usuario=$var_idusuario,dias='$var_dia',horas='$var_hora',minutos='$var_min' WHERE (id_novedad=$var_idnovedad)";
		if ($consulta=mysqli_query($conectar,$sql)){
			return 1;
			}else{
				return 0;
			}
			mysqli_close($conectar);
	}


}
?>