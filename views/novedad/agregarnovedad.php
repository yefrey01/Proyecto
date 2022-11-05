<?php
session_start();
include('../seguridad.php');
$ruta="../../models/";
include($ruta . 'tiponovedad.php');
include($ruta . 'tratamiento.php');
include($ruta . 'seccion_reporta.php');
include($ruta . 'seccion_origen.php');
include($ruta . 'referencia_equipo.php');
include($ruta . 'proceso_origen.php');
include($ruta . 'causa_novedad.php');
include($ruta . 'causa_detallada.php');

$obj_tiponovedad=new tiponovedad();
$obj_tratamiento= new tratamiento();
$obj_seccionreporta= new seccion_reporta();
$obj_seccionorigen= new seccion_origen();
$obj_referenciaequipo= new referencia_equipo();
$obj_procesoorigen= new proceso_origen();
$obj_causanovedad= new causa_novedad();
$obj_causadetallada= new causa_detallada();


$V_datostnovedad=$obj_tiponovedad->getalltiponovedad();
$tamtiponovedad=count($V_datostnovedad);

$V_datossreporta=$obj_seccionreporta->getallseccreporta();
$tamsecreporta=count($V_datossreporta);

$V_datosporigen=$obj_procesoorigen->getallprocesoorig();
$tamporigen=count($V_datosporigen);

$V_datostratamiento=$obj_tratamiento->getalltratamiento();
$tamtratamiento=count($V_datostratamiento);

$V_datoscdetallada=$obj_causadetallada->getallcausadet();
$tamcdetallada=count($V_datoscdetallada);

$V_datosrequipo=$obj_referenciaequipo->getallrefequipo();
$tamrequipo=count($V_datosrequipo);

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Agregar Novedad</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- Estilos Globales -->
	<link rel="stylesheet" href="../../dist/css/global.css">

	<!-- Estilos para las tablas -->
	<link rel="stylesheet" href="../../dist/js/datatables/datatables.css">

	<!-- Estilos jQuery UI para fechas -->
	<link rel="stylesheet" href="../../dist/js/jquery.ui/jquery-ui.min.css">

	<!-- Fancy -->
	<link rel="stylesheet" type="text/css" href="../../dist/fancy/source/jquery.fancybox.css?v=2.1.5" media="screen" />

		<script language="javascript" src="../../dist/js/jquery-3.2.1.min.js"></script>
		<script language="javascript">
			$(document).ready(function(){
	   		$("#sel_porigen").change(function () {
	           //$("#sel_porigen option:selected").each(function () {
				Sorigen( $( this ).val() );            
			});
	   	});

		function Sorigen( $id_procesoorigen ){
			var Parametros = new FormData();
			var sorigen = $('#sel_sorigen');

			Parametros.append( "id_procesoorigen", $id_procesoorigen );

			$.ajax( {
				data: Parametros,
				url: "../../controllers/sorigen.php",
				dataType: "json",
				type: "POST",
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function(){
					//Antes de Ejecutar Accion PHP
				}, 
				success: function( Respuesta ){

					console.log(Respuesta);

					//Limpiamos el combo
					sorigen.find('option').remove();

        			sorigen.append('<option value="">-</option>');

					$(Respuesta).each(function(i, v){ // indice, valor
                        sorigen.append('<option value="' + v.id_seccionorigen + '">' + v.descripcion + '</option>');
                    })
				}
			} );
		}


		$(document).ready(function(){
   		$("#sel_sorigen").change(function () {
   				Cnovedad( $( this ).val() ); 
		   });
		});

		function Cnovedad( $idseccionorigen ){
			var Parametros = new FormData();
			var cnovedad = $('#sel_cnovedad');

			Parametros.append( "idseccionorigen", $idseccionorigen );

			$.ajax( {
				data: Parametros,
				url: "../../controllers/cnovedad.php",
				dataType: "json",
				type: "POST",
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function(){
					//Antes de Ejecutar Accion PHP
				}, 
				success: function( Respuesta ){
					console.log(Respuesta);

        			cnovedad.find('option').remove();
        			cnovedad.append('<option value="">-</option>');

					$(Respuesta).each(function(i, v){ // indice, valor
                        cnovedad.append('<option value="' + v.id_causanovedad + '">' + v.descripcion + '</option>');
                    })
				}
			} );
		}


	</script>	

</head>

<body>
		<header>
			<div class="banner">
				<div class="container">
					
					<a href="../../index.php" class="logo">
						<img src="../../dist/css/images/logopenagos.png" alt="Logo">
					</a>

					<div class="itemsMenu">
						<div id="saludo" class="item">¡Bienvenido! <?php echo $_SESSION["ses_nombreuser"]; ?></div>
						<div class="item"><a class="close" href="../../finsesion.php">Cerrar Sesión <i class="icon-cerrar"></i></a></div>
					</div>

				</div>

				<img class="bannerMovil" src="../../dist/css/images/bg-banner-movil.jpg" alt="Banner">

			</div>	
		</header>

		<div class="container mb40">

			<div class="row mb20">
				<div id="saludo2" class="col-xs-6 visible-xs"></div>
				<div class="col-xs-6 hidden-xs">
					<div class="row">
						<div class="col-sm-9 col-md-6 mt10">
							<h3 class="titulo">Agregar Novedad</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<a href="index.php" class="logo">
						<img class="logoapp" src="../../dist/css/images/logo-innove.png" alt="Logo Innova" border="0" >
					</a>	
				</div>			
			</div>

			<div class="row formu">

				
				<form class="frmnormal" id="datosficha" action="../../controllers/actualizarnovedad.php" method="post" autocomplete="off">
				<input type="hidden" name="accion" value="1">
					<a id="errores"></a>
					<!-- ERRORES -->
					<div  class="errores clearfix" style="margin-bottom: 25px;">
						<div class="revisar">
							<p>Por favor revisar los siguientes campos:</p>
							<ul></ul>
						</div>
					</div>
					<!-- / ERRORES -->

					<section>

					<div class="row">

						<!-- Linea 1: Grupo 1 -->
								<div class="col-lg-6 col-sm-12">
									<div class="grupo">
										<div class="row">

											<!-- Linea 1: Grupo 1: Nombre campo -->
											<div class="col-sm-4">
												<div class="n_grupo"><span>Tipo Novedad</span></div>
											</div>

											<?php for($j=0;$j<$tamtiponovedad;$j++){ ?>
												
											<div class="col-sm-4">
													<div class="item">
														<label>
															<input type="radio" name="rad_tiponovedad" value="<?php echo $V_datostnovedad[$j]['id_tiponovedad']; ?>" <?php if($j == 1 ){ ?> id="tipo_novedad" class="check activar" <?php }else{ ?> class="check" <?php }?> title="Tipo Novedad es obligatorio" required ><!-- Falta el Cheked aqui checked -->
														</label>
														<span class="info"><?php echo $V_datostnovedad[$j]['descripcion']; ?></span>
													</div>
											</div>

											<?php }	?>												

										</div>
									</div>
								</div>
							<!-- / Linea 1: Grupo 1 -->

							
								<div class="col-lg-3 col-sm-6">
									<div class="grupo">
										<div class="row">

											<div class="col-sm-4">
												<div class="n_grupo"><span>Sección Reporta</span></div>
											</div>

											<div class="col-sm-8">
												   <div class="item">
													<label>
														<div class="combo">
															<select name="sel_sreporta" class="selec" tittle="Sección Reporta es obligatorio" required>
																	<option value="" selected>-</option>
																	<?php for($i=0;$i<$tamsecreporta;$i++){ ?>
																	<option value="<?php echo $V_datossreporta[$i]['id_seccionreporta']; ?>" ><?php echo $V_datossreporta[$i]['descripcion']; ?></option>
																<?php } ?>
															</select>
														</div>	
												    </label>
												   </div>
											</div>
										</div>
								   </div>
						   	</div>

							<div class="col-lg-3 col-sm-6">
									<div class="grupo">
										<div class="row">
											<div class="col-sm-4">
												<div class="n_grupo"><span>Fecha</span></div>
											</div>
											
											<div class="col-sm-8">
												<div class="item">
													<label>
														<input type="text" name="txt_fecha" class="fechaInd" value="<?php echo date('Y-m-d'); ?>" title="Fecha es obligatoria" required ><!--readonly-->
													</label>
												</div>
											</div>
										
										</div>
									</div>
							</div>
					</div>
					

					<div class="row">

						
					 	<div class="col-lg-4 col-sm-6">
									<div class="grupo">
										<div class="row">

											<!-- Item -->
											<div class="col-sm-3">
												<div class="n_grupo"><span>Proceso Origen</span></div>
											</div>

											<!-- Linea 3: Grupo 3: Nombre campo -->
												<div class="col-sm-8">
													   <div class="item">
														<label>
															<div class="combo">
																<select id="sel_porigen" name="sel_porigen" class="selec" tittle="Proceso Origen es obligatorio" required>
																		<option value="" selected>-</option>
																		<?php for($i=0;$i<$tamporigen;$i++){ ?>
																		<option value="<?php echo $V_datosporigen[$i]['id_procesoorigen']; ?>" ><?php echo $V_datosporigen[$i]['descripcion']; ?></option>
																	<?php } ?>
																</select>
															</div>	
													    </label>
													   </div>
												</div>
										</div>
								   </div>
					 	</div>

					 	<div class="col-lg-4 col-sm-6">
									<div class="grupo">
										<div class="row">

											<!-- Item -->
											<div class="col-sm-3">
												<div class="n_grupo"><span>Seccion Origen</span></div>
											</div>

											<!-- Linea 3: Grupo 3: Nombre campo -->
												<div class="col-sm-8">
													   <div class="item">
														<label>
															<div class="combo">
																<select id="sel_sorigen" name="sel_sorigen" class="selec" tittle="Seccion Origen es obligatorio" required>
																	<option value="" selected>-</option>
																		<?php foreach ($Respuesta as $datossorigen):?>
																		<option value="<?php echo $datossorigen->id_seccionorigen; ?>"><?php echo $datossorigen->descripcion; ?></option>
																	<?php endforeach;?>
																</select>
															</div>	
													    </label>
													   </div>
												</div>
										</div>
								   </div>
					 	</div>

					 	<div class="col-lg-4 col-sm-6">
									<div class="grupo">
										<div class="row">

											<!-- Item -->
											<div class="col-sm-3">
												<div class="n_grupo"><span>Causa Novedad</span></div>
											</div>

											<!-- Linea 3: Grupo 3: Nombre campo -->
												<div class="col-sm-8">
													   <div class="item">
														<label>
															<div class="combo">
																<select name="sel_cnovedad" id="sel_cnovedad" class="selec" tittle="Causa Novedad es obligatorio" required>
																	<option value="" selected>-</option>
																		<?php foreach ($Respuesta as $datoscnovedad):?>
																		<option value="<?php echo $datoscnovedad->id_causanovedad; ?>"><?php echo $datoscnovedad->descripcion;?></option>
																	<?php endforeach;?>
																</select>
															</div>	
													    </label>
													   </div>
												</div>
										</div>
								   </div>
					 	</div>

					</div>

					<div class="row">
							
								<!-- Linea 1: Grupo 1 -->
								<div class="col-lg-12 col-sm-12">
									<div class="grupo">
										<div class="row">

											<div class="col-sm-2">
												<div class="n_grupo"><span>Descripción</span></div>
											</div>
											<!-- Linea 1: Grupo 1: Nombre campo -->
											<div class="col-sm-10">
											   <div class="item">
												<label>
													<input type="text" name="txt_descripcion"  tittle="Descripción es obligatorio" required>
												</label>
												</div>
											</div>

										</div>
									</div>
								</div>
								<!-- / Linea 1: Grupo 1 -->							
								
					</div>	

					<div class="row">

						<div class="col-lg-4 col-sm-6">
									<div class="grupo">
										<div class="row">

											<!-- Item -->
											<div class="col-sm-3">
												<div class="n_grupo"><span>Referencia Equipo</span></div>
											</div>

											<!-- Linea 3: Grupo 3: Nombre campo -->
											<div class="col-sm-7">
												   <div class="item">
														<label>
															<div class="combo">
																<select name="sel_requipo" class="selec" tittle="Referencia Equipo es obligatorio" required>
																		<option value="" selected>-</option>
																		<?php for($i=0;$i<$tamrequipo;$i++){ ?>
																		<option value="<?php echo $V_datosrequipo[$i]['id_referenciaequipo']; ?>" ><?php echo $V_datosrequipo[$i]['descripcion']; ?></option>
																	<?php } ?>
																</select>
															</div>	
													    </label>
												   </div>								  
												   
											</div>

											<div class="col-sm-2">
												<label>
													<div class="item">
														<a class="fancybox-ajax fancybox.ajax normal" href="../referencia/agregarreferencia.php"><span><img src="../../dist/css/images/icon-add.png" alt="Agregar"></span></a>
													</div>
												</label>
									   		</div>


										</div>

									 	
								   </div>
					 	</div>

					 	<div class="col-lg-4 col-sm-6">
								<div class="grupo">
									<div class="row">
										<!-- Linea 4: Grupo 1: Nombre campo -->
										<div class="col-sm-3">
											<div class="n_grupo"><span>Número Piezas</span></div>
										</div>							
										<!-- Linea 4: Grupo 1: Nombre campo: Item 1 -->
										<div class="col-sm-9">
											   <div class="item">
												<label>
													<input type="number" name="txt_npiezas" max="999999999">
												</label>
												</div>
										</div>
									</div>
								</div>
						</div>

						<div class="col-lg-4 col-sm-6">
							<div class="grupo">
								<div class="row">
									<!-- Linea 4: Grupo 1: Nombre campo -->
									<div class="col-sm-3">
										<div class="n_grupo"><span>Orden Producción</span></div>
									</div>							
									<!-- Linea 4: Grupo 1: Nombre campo: Item 1 -->
									<div class="col-sm-9">
										   <div class="item">
											<label>
												<input type="number" name="txt_oproduccion" max="999999999"  tittle="Este campo es obligatorio" required>
											</label>
											</div>
									</div>
								</div>
							</div>
						</div>


					</div>	
						
						<div class="row">
		
								<div class="col-lg-4 col-sm-12">
									<div class="grupo">
										<div class="row">

											<!-- Item -->
											<div class="col-sm-4">
												<div class="n_grupo"><span>Tratamiento</span></div>
											</div>

											<!-- Linea 3: Grupo 3: Nombre campo -->
												<div class="col-sm-8">
												   <div class="item">
													<label>
														<div class="combo">
															<select name="sel_tratamiento" class="selec" tittle="Tratamiento es obligatorio" required>
																<option value="" selected>-</option>
																<?php for($i=0;$i<$tamtratamiento;$i++){ ?>
																<option value="<?php echo $V_datostratamiento[$i]['id_tratamiento']; ?>"><?php echo $V_datostratamiento[$i]['descripcion']; ?></option>
																<?php } ?>
															</select>
														</div>	
												    </label>
												   </div>
												</div>
										</div>
								   </div>
					 			</div>

								<div class="col-lg-8 col-sm-12">
									<div class="grupo">
										<div class="row">

											<!-- Item -->
											<div class="col-sm-4">
												<div class="n_grupo"><span>Causa Detallada</span></div>
											</div>

											<!-- Linea 3: Grupo 3: Nombre campo -->
												<div class="col-sm-8">
												   <div class="item">
													<label>
														<div class="combo">
															<select name="sel_cdetallada" class="selec" tittle="Causa Detallada es obligatorio" required>
																	<option value="" selected>-</option>
																	<?php for($i=0;$i<$tamcdetallada;$i++){ ?>
																	<option value="<?php echo $V_datoscdetallada[$i]['id_causadetallada']; ?>"><?php echo $V_datoscdetallada[$i]['descripcion']; ?></option>
																<?php } ?>
															</select>
														</div>	
												    </label>
												   </div>
												</div>
										</div>
								   </div>
					 			</div>

					 	</div>

					 	<div class="row">

					 		<div class="col-lg-12 col-sm-12">					 			
						 		<div class="row">
									<div class="col-md-2">
										<h3 class="titulo">Tiempo Perdido</h3>
									</div>
								</div>
					 		</div>
					 		
					 		<div class="col-lg-4 col-sm-12">
									<div class="grupo">
										<div class="row">
											<!-- Linea 4: Grupo 1: Nombre campo -->
											<div class="col-sm-4">
												<div class="n_grupo"><span>Días</span></div>
											</div>							
											<!-- Linea 4: Grupo 1: Nombre campo: Item 1 -->
											<div class="col-sm-8">
												   <div class="item">
													<label>
														<input type="number" name="txt_dia" max="999999999">
													</label>
													</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-sm-12">
									<div class="grupo">
										<div class="row">
											<!-- Linea 4: Grupo 1: Nombre campo -->
											<div class="col-sm-4">
												<div class="n_grupo"><span>Horas</span></div>
											</div>							
											<!-- Linea 4: Grupo 1: Nombre campo: Item 1 -->
											<div class="col-sm-8">
											   <div class="item">
												<label>
													<input type="number" name="txt_hora" max="999999999">
												</label>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-sm-12">
									<div class="grupo">
										<div class="row">
											<!-- Linea 4: Grupo 1: Nombre campo -->
											<div class="col-sm-4">
												<div class="n_grupo"><span>Minutos</span></div>
											</div>							
											<!-- Linea 4: Grupo 1: Nombre campo: Item 1 -->
											<div class="col-sm-8">
											   <div class="item">
												<label>
													<input type="number" name="txt_min" max="999999999">
												</label>
												</div>
											</div>
										</div>
									</div>
								</div>

					 	</div>


						<div class="row">
												
						<!-- Linea 1: Grupo 1 -->
							<div class="col-lg-12 col-sm-12">

								<div class="row">
									<div class="col-md-2">
										<h3 class="titulo">Observaciones</h3>
									</div>
								</div>

								<div class="grupo">
									<div class="row">

										<!-- Linea 1: Grupo 1: Item 1 -->
										<div class="col-sm-12 observaciones">
												<div class="item pl15">
													<label class="pr15">
														<textarea name="observaciones"></textarea>
													</label>
													
												</div>

										</div>

									</div>
								</div>
							</div>						<!-- / Linea 1: Grupo 1 -->
												
						</div>	
						

						<div class="col-lg-12 col-sm-12">						
						<div class="row">
								<div class="col-sm-2 filtrar">
									<label class="btnFull">
										<input type="submit" value="Guardar" name="Guardar">
									</label>
								</div>
						</div>
						</div>

					</section>
				</form>
			</div>
		</div>

		<p class="derechos">UTS</p>
	
		<!-- Scripts -->
		<script src="../../dist/js/jquery-1.7.1.min.js"></script>
		<script src="../../dist/js/scripts.min.js"></script>
		<script src="../../dist/js/jquery-ui.min.js"></script>
		<script src="../../dist/js/printThis.js"></script>
		<script type="text/javascript" src="../../dist/fancy/source/jquery.fancybox.js?v=2.1.5"></script>
</body>

</html>