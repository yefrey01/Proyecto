<?php
session_start();
include('seguridadprincindex.php');
$ruta="../models/";
include($ruta . 'novedad.php');

$obj_novedad=new novedad();

$V_misnovedades=$obj_novedad->getallnovedad();
$numnovedades=count($V_misnovedades);

?>



<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Innove</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- Estilos Globales -->
	<link rel="stylesheet" href="../dist/css/global.css">

	<!-- Estilos para las tablas -->
	<link rel="stylesheet" href="../dist/js/datatables/datatables.css">

	<!-- Estilos jQuery UI para fechas -->
	<link rel="stylesheet" href="../dist/js/jquery.ui/jquery-ui.min.css">	
	<!-- Fancy -->
	<link rel="stylesheet" type="text/css" href="../dist/fancy/source/jquery.fancybox.css?v=2.1.5" media="screen" />	

</head>

<body>
	<header>
			<div class="banner">
				<div class="container">
					
					<a href="#." class="logo">
						<img src="../dist/css/images/logopenagos.png" alt="Logo">
					</a>

					<div class="itemsMenu">
						<div id="saludo" class="item">¡Bienvenido! <?php echo $_SESSION["ses_nombreuser"]; ?></div>
						<div class="item"><a class="close" href="../finsesion.php">Cerrar Sesión <i class="icon-cerrar"></i></a></div>
					</div>

				</div>


			</div>	
		</header>

		<div class="container mb40">

			<div class="row mb20">
				<div id="saludo2" class="col-xs-6"></div>
				<div class="col-xs-6">
					<a href="#." class="logo">
					<img class="logoapp" src="../dist/css/images/logo-innove.png" alt="Logo"></a>
				</div>
			</div>

			<div class="row">

				<div class="col-lg-7 col-lg-push-5 col-md-6 col-md-push-6 mb20">
					<div class="col-sm-12 no-busqueda">
						<table id="tabla_cotizacion" class="display tabla cell-border" cellspacing="0" width="100%">
							 <thead>
							 	<tr>
							 		<th width="5%" class="all">Id</th>
							 		<th width="10%">Fecha</th>
							 		<th width="20%">T. Novedad</th>
							 		<th width="20%">Reporta</th>
							 		<th width="3%" class="all">Ver</th>
							 	</tr>
							 </thead>	
							 <tbody>
							 	<?php for($i=0;$i<$numnovedades;$i++){?>
							 	<tr>
							 		<td class="dt-center"><?php echo $V_misnovedades[$i]['id_novedad'];?></td>
							 		<td class="dt-center"><?php echo $V_misnovedades[$i]['fecha'];?></td>
							 		<td class="dt-left"><?php echo $V_misnovedades[$i]['tiponovedad'];?></td>
							 		<td class="dt-left"><?php echo $V_misnovedades[$i]['seccionreporta'];?></td>
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

				</div>

				<div class="col-lg-5 col-lg-pull-7 col-md-6 col-md-pull-6">

					<ul class="row menu">
						<?php if($_SESSION["ses_idrol"]!=1){ ?>
							<li class="col-sm-9"><a class="icon novedades" href="novedad/index.php"><span>Novedad</span></a></li>

							<li class="col-sm-9"><a class="icon contrasena" href="usuario/cambiarcontrasena.php"><span>Cambiar Contraseña</span></a></li>
						<?php }

						else{
						?>
							<li class="col-sm-9"><a class="icon novedades" href="novedad/index.php"><span>Novedad</span></a></li>

							<li class="col-sm-9"><a class="icon contrasena" href="usuario/cambiarcontrasena.php"><span>Cambiar Contraseña</span></a></li>

							<li class="col-sm-9"><a class="icon configuraciones" href="configuracion.php"><span>Configuración</span></a></li>
						<?php }?>
					</ul>

				</div>			

				
			</div>
		</div>

		<p class="derechos">UTS</p>
	
		<!-- Scripts -->
		<script src="../dist/js/jquery-1.7.1.min.js"></script>
		<script src="../dist/js/scripts.min.js"></script>
		<script src="../dist/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../dist/fancy/source/jquery.fancybox.js?v=2.1.5"></script>

</body>

</html>