	<meta charset="UTF-8">
<?php
session_start();
include('seguridadprincindex.php');
$ruta="../models/";
include($ruta . 'novedad.php');
include($ruta . 'tiponovedad.php');
include($ruta . 'tratamiento.php');
include($ruta . 'seccion_reporta.php');
include($ruta . 'seccion_origen.php');
include($ruta . 'referencia_equipo.php');
include($ruta . 'proceso_origen.php');
include($ruta . 'causa_novedad.php');
include($ruta . 'causa_detallada.php');

$obj_novedad=new novedad();
$obj_tiponovedad=new tiponovedad();
$obj_tratamiento= new tratamiento();
$obj_seccionreporta= new seccion_reporta();
$obj_seccionorigen= new seccion_origen();
$obj_referenciaequipo= new referencia_equipo();
$obj_procesoorigen= new proceso_origen();
$obj_causanovedad= new causa_novedad();
$obj_causadetallada= new causa_detallada();

$var_idnovedad=$_GET['idnv'];
$V_datosnovedad=$obj_novedad->getnovedad($var_idnovedad);

$V_datostnovedad=$obj_tiponovedad->getalltiponovedad();
$tamtiponovedad=count($V_datostnovedad);

$V_datossreporta=$obj_seccionreporta->getallseccreporta();
$tamsecreporta=count($V_datossreporta);

$V_datosporigen=$obj_procesoorigen->getallprocesoorig();
$tamporigen=count($V_datosporigen);

$V_datossorigen=$obj_seccionorigen->getallsecorigen();
$tamsorigen=count($V_datossorigen);

$V_datosrequipo=$obj_referenciaequipo->getallrefequipo();
$tamrequipo=count($V_datosrequipo);

$V_datoscnovedad=$obj_causanovedad->getallcausanov();
$tamcnovedad=count($V_datoscnovedad);

$V_datostratamiento=$obj_tratamiento->getalltratamiento();
$tamtratamiento=count($V_datostratamiento);

$V_datoscdetallada=$obj_causadetallada->getallcausadet();
$tamcdetallada=count($V_datoscdetallada);

?>
<div class="box">
	<i class="cerrar">Cerrar</i>
	<div class="container">

		
		<div class="row">
			<div class="col-md-12">
	
				<form id="datos2" class="pasos pasos--box" method="post">
	
				<a id="errores"></a>
	
				<!-- ERRORES -->
				<div  class="errores clearfix">
					<div class="revisar">
						<p>Por favor revisar los siguientes campos:</p>
						<ul></ul>
					</div>
				</div>
				<!-- / ERRORES -->
	
	

				<h2><span></span></h2>


				<section>
					
					<div id="areaImpresion">

					<div class="row">
						<div class="col-md-12">
							<h3 class="titulo">Novedad Nº: <?php echo $var_idnovedad; ?></h3>
						</div>
					</div>
	
					<div class="row  mb20">
	
						<!-- Columna -->
						<div class="col-lg-5 col-sm-12">

							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Fecha: </div>
								</div>
								<div class="col-sm-6 col-xs-12">
									<div class="label  label--info"><?php echo $V_datosnovedad['fecha']; ?></div> 
								</div>
							</div>

						</div>	


						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Tipo Novedad: </div>
								</div>
								<?php for($i=0;$i<$tamtiponovedad;$i++){
										if($V_datostnovedad[$i]['id_tiponovedad']==$V_datosnovedad['id_tiponovedad']){
								?>
								<div class="col-sm-6 col-xs-12">
									<div class="label  label--info"><?php echo $V_datostnovedad[$i]['descripcion'];?></div> 
								</div>
								<?php 
									} 
								}
								?>
							</div>
						</div>

						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">LEF/Proceso que reporta: </div>
								</div>
								<?php for($i=0;$i<$tamsecreporta;$i++){
										if($V_datossreporta[$i]['id_seccionreporta']==$V_datosnovedad['id_seccionreporta']){
								?>
								<div class="col-sm-6 col-xs-12">
									<div class="label  label--info"><?php echo $V_datossreporta[$i]['descripcion']; ?></div> 
								</div>
								<?php 
									} 
								}
								?>
							</div>
						</div>

						<div class="col-lg-5 col-sm-12" >
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">LEF/Proceso a quien reporta: </div>
								</div>
								<?php for($i=0;$i<$tamporigen;$i++){
										if($V_datosporigen[$i]['id_procesoorigen']==$V_datosnovedad['id_procesoorigen']){
								?>
								<div class="col-sm-6 col-xs-12">
									<div class="label  label--info"><?php echo $V_datosporigen[$i]['descripcion']; ?></div> 
								</div>								
								<?php 
									} 
								}
								?>
							</div>								
						</div>	

						<div class="col-lg-12 col-sm-12">

							<div class="row">
								<div class="col-sm-2 col-xs-12 ">
									<div class="label">Sección Origen: </div>
								</div>
								<?php for($i=0;$i<$tamsorigen;$i++){
										if($V_datossorigen[$i]['id_seccionorigen']==$V_datosnovedad['id_seccionorigen']){
								?>
								<div class="col-sm-10 col-xs-12">
									<div class="label  label--info"><?php echo $V_datossorigen[$i]['descripcion']; ?></div> 
								</div>
								<?php 
									} 
								}
								?>
							</div>
						</div>

						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Referencia Equipo: </div>
								</div>
								<?php for($i=0;$i<$tamrequipo;$i++){
										if($V_datosrequipo[$i]['id_referenciaequipo']==$V_datosnovedad['id_referenciaequipo']){
								?>
								<div class="col-sm-6 col-xs-12">
									<div class="label  label--info"><?php echo $V_datosrequipo[$i]['descripcion']; ?></div> 
								</div>
								<?php 
									} 
								}
								?>
							</div>
						</div>

						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Núm. Piezas: </div>
								</div>
								<div class="col-sm-6 col-xs-12">
									<div class="label  label--info"><?php echo $V_datosnovedad['num_piezas']; ?></div> 
								</div>
							</div>
						</div>

						<div class="col-lg-12 col-sm-12">


							<div class="row">
								<div class="col-sm-2 col-xs-12">
									<div class="label">Defecto: </div>
								</div>
								<?php for($i=0;$i<$tamcnovedad;$i++){
										if($V_datoscnovedad[$i]['id_causanovedad']==$V_datosnovedad['id_causanovedad']){
								?>
								<div class="col-sm-10 col-xs-12">
									<div class="label  label--info"><?php echo $V_datoscnovedad[$i]['descripcion']; ?></div> 
								</div>
								<?php 
									} 
								}
								?>
							</div>

							<div class="row">
								<div class="col-sm-2 col-xs-12">
									<div class="label">Descripcion: </div>
								</div>
								<div class="col-sm-10 col-xs-12">
									<div class="label  label--info"><?php echo $V_datosnovedad['descripcion']; ?></div> 
								</div>
							</div>	
						</div>

						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Lote: </div>
								</div>
								<div class="col-sm-6 col-xs-12">
									<div class="label  label--info"><?php echo $V_datosnovedad['ordenproduccion']; ?></div> 
								</div>
							</div>
						</div>		
							
						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Tratamiento: </div>
								</div>
								<?php for($i=0;$i<$tamtratamiento;$i++){
										if($V_datostratamiento[$i]['id_tratamiento']==$V_datosnovedad['id_tratamiento']){
								?>
								<div class="col-sm-6 col-xs-12">
									<div class="label  label--info"><?php echo $V_datostratamiento[$i]['descripcion']; ?></div> 
								</div>								
								<?php 
									} 
								}
								?>
							</div>							
						</div>

						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Tiempo Perdido: </div>
								</div>
								<div class="col-sm-6 col-xs-12">
									<?php $var_tperdido=(($V_datosnovedad['dias']*24)+$V_datosnovedad['horas']+($V_datosnovedad['minutos']/60)); ?>
									<div class="label  label--info"><?php echo number_format($var_tperdido,1); ?> horas.</div> 
								</div>
							</div>
						</div>

						<div class="col-lg-12 col-sm-12">
							<div class="row">
								<div class="col-sm-2 col-xs-12">
									<div class="label">Empleado/Operario: </div>
								</div>
								<?php for($i=0;$i<$tamcdetallada;$i++){
										if($V_datoscdetallada[$i]['id_causadetallada']==$V_datosnovedad['id_causadetallada']){
								?>
								<div class="col-sm-10 col-xs-12">
									<div class="label  label--info"><?php echo $V_datoscdetallada[$i]['descripcion']; ?></div> 
								</div>																
								<?php 
									} 
								}
								?>
							</div>
						</div>	

						<div class="col-lg-12 col-sm-12">
							<div class="row">
								<div class="col-sm-2 col-xs-12 ">
									<div class="label">Observaciones: </div>
								</div>
								<div class="col-sm-10 col-xs-12">
									<div class="label  label--info"><?php echo $V_datosnovedad['observaciones']; ?></div> 
								</div>
							</div>
						</div>					

						<!-- / Columna -->
					</div>
				</div>

				<div class="row">
						<div class="col-md-12">
						<a href="novedad/imprimir.php?idnv=<?php echo $V_datosnovedad['id_novedad']; ?>" alt="Imprimir"><img src="../dist/css/images/imprimir.png" alt="Imprimir"></a>
						</div>
					</div>

				</section>
	
				
			</div>
		</div>
	
	</div>
</div>