<?php
session_start();
include('../seguridad.php');
$ruta="../../models/";
include($ruta . 'novedad.php');

$obj_novedad=new novedad();

$V_misnovedades=$obj_novedad->getallnovedad();
$numnovedades=count($V_misnovedades);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Novedades</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- Estilos Globales -->
	<link rel="stylesheet" href="../../dist/css/global.css">

	<!-- Estilos para las tablas -->
	<link rel="stylesheet" href="../../dist/js/datatables/datatables.css">

	<!-- Estilos jQuery UI para fechas -->
	<link rel="stylesheet" href="../../dist/js/jquery.ui/jquery-ui.min.css">

	<!-- Fancy -->
	<link rel="stylesheet" type="text/css" href="../../dist/fancy/source/jquery.fancybox.css?v=2.1.5" media="screen" />	

</head>

<body>
	<header>
			<div class="banner">
				<div class="container">
					
					<a href="../index.php" class="logo">
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
								<h3 class="titulo">Novedades</h3>
							</div>
						</div>
					</div>
					<div class="col-xs-6">
						<a href="../index.php" class="logo">
							<img class="logoapp" src="../../dist/css/images/logo-innove.png" alt="Logo" border="0" >
						</a>	
					</div>			
				</div>

				
			<div class="row formu">

				<div class="col-sm-12 visible-xs">
					<div class="row">
						<div class="col-sm-4 col-md-3">
							<h3 class="titulo">Novedades</h3>
						</div>
					</div>
				</div>

				<div class="col-lg-10 col-sm-10">
					<div class="row">

						<!-- Grupo -->
						<div class="col-lg-10 col-sm-10">
							<div class="grupo">
								<div class="row">

									<!-- Item -->
									<div class="col-sm-2">
										<div class="n_grupo"><span>Buscar</span></div>
									</div>
									
									<!-- Item -->
									<div class="col-sm-8">
										<div class="item">
											<label>
												<input id="global_filter" class="global_filter" type="text">
											</label>
										</div>
									</div>	
								</div>
							</div>
						</div>
						<!-- / Grupo -->
						
						<div class="col-lg-1 col-sm-1">
							<div class="row">
								<div class="col-lg-1 col-sm-1">
									<div class="grupo">
										<div class="row">
											<div class="col-sm-12">
												<div class="item">
													<a  href="../reportes/index.php"><span><img src="../../dist/css/images/icon-reporte.png" alt="Reporte"></span></a>
												</div>
											</div>
										</div>
									</div>	
								</div>					
							</div>					
						</div>	

					</div>
				</div>


				
				
				<div class="col-lg-2 col-sm-2">
				<div class="row">
					
					<!-- Grupo -->
					<div class="col-lg-12 col-sm-12 mb10">
						<div class="grupo">
							<div class="row">

								<!-- Item -->
								<div class="col-sm-12 pr15">
									<label class="btnFull">
										<a id="BorrarFiltro" href="#" onclick="Borrarfiltro();" ><span><img src="../../dist/css/images/icon-borrar.png" alt="Borrar"></span></a>
									</label>
								</div>

							</div>
						</div>
					</div>
					<!-- / Grupo -->

				</div>
				</div>
				<?php if($_SESSION["ses_idrol"]!=2) { ?>
				<div class="col-sm-2 col-sm-offset-10">
					<div class="row">
						<!-- Grupo -->
						<div class="col-lg-12 col-sm-12">
							<div class="grupo">
								<div class="row">
									<!-- Item -->
									<div class="col-sm-12 pr15">
										<label class="btnFull">
											<a href="agregarnovedad.php"><span><img src="../../dist/css/images/icon-agregar.png" alt="Agregar"></span></a>
										</label>
									</div>
								</div>
							</div>
						</div>
						<!-- / Grupo -->
					</div>
				</div>
				<?php } ?>


				<?php if($_SESSION["ses_idrol"]!=2) { ?>
				<div class="col-sm-12 no-busqueda">
					<table id="tabla_cotizacion" class="display tabla cell-border" cellspacing="0" width="100%">
						 <thead>
						 	<tr>
						 		<th width="8%" class="all">Id</th>
						 		<th width="10%" class="all">Fecha</th>
						 		<th width="12%">Tipo Novedad</th>
						 		<th width="15%">Reporta</th>
						 		<th width="15%">Proceso Origen</th>
						 		<th width="5%" class="all">Editar</th>
						 		<th width="5%" class="all">Ver</th>
						 	</tr>
						 </thead>	
						 <tbody>
						 	<?php for($i=0;$i<$numnovedades;$i++){?>
						 	<tr>
						 		<td class="dt-center"><?php echo $V_misnovedades[$i]['id_novedad'];?></td>
						 		<td class="dt-center"><?php echo $V_misnovedades[$i]['fecha'];?></td>
						 		<td class="dt-left"><?php echo $V_misnovedades[$i]['tiponovedad'];?></td>
						 		<td class="dt-left"><?php echo $V_misnovedades[$i]['seccionreporta'];?></td>
						 		<td class="dt-left"><?php echo $V_misnovedades[$i]['procesoorigen'];?></td>
						 		<td class="dt-center">						 			
								<form class="editarficha" action="editarnovedad.php" method="post"><input type="hidden" name="id_novedad" value="<?php echo $V_misnovedades[$i]['id_novedad']; ?>">
						 		<a class="editar" href="#.">Editar</a>
						 		</form>
						 		</td>
						 		<td class="dt-center">
									<a class="fancybox-ajax fancybox.ajax preview normal" href="vistaprevia.php?idnv=<?php echo $V_misnovedades[$i]['id_novedad']; ?>">Vista Previa</a>
						 		</td>
						 	</tr>
						 	<?php
						 	  }	 		
						 	?>
						 </tbody>		
					</table>
				</div>
				<?php } 
					else{
				?>
				<div class="col-sm-12 no-busqueda">
					<table id="tabla_cotizacion" class="display tabla cell-border" cellspacing="0" width="100%">
						 <thead>
						 	<tr>
						 		<th width="10%" class="all">Id</th>
						 		<th width="10%" class="all">Fecha</th>
						 		<th width="18%">Tipo Novedad</th>
						 		<th width="10%">Reporta</th>
						 		<th width="10%">Proceso Origen</th>
						 		<th width="8%" class="all">Vista Previa</th>
						 	</tr>
						 </thead>	
						 <tbody>
						 	<?php for($i=0;$i<$numnovedades;$i++){?>
						 	<tr>
						 		<td class="dt-center"><?php echo $V_misnovedades[$i]['id_novedad'];?></td>
						 		<td class="dt-center"><?php echo $V_misnovedades[$i]['fecha'];?></td>
						 		<td class="dt-left"><?php echo $V_misnovedades[$i]['tiponovedad'];?></td>
						 		<td class="dt-left"><?php echo $V_misnovedades[$i]['seccionreporta'];?></td>
						 		<td class="dt-center"><?php echo $V_misnovedades[$i]['procesoorigen'];?></td>
						 		<td class="dt-center">
									<a class="fancybox-ajax fancybox.ajax preview normal" href="vistaprevia.php?idnv=<?php echo $V_misnovedades[$i]['id_novedad']; ?>">Vista Previa</a>
						 		</td>
						 	</tr>
						 	<?php
						 	  }	 		
						 	?>
						 </tbody>		
					</table>
				</div>
				<?php } ?>
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