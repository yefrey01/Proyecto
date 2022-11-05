<?php
session_start();
include('../seguridad.php');
$ruta="../../models/";
include($ruta . 'usuario.php');

$obj_usuario=new usuario();

$V_datosusuario=$obj_usuario->getallusuario();
$numusuarios=count($V_datosusuario);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Usuarios</title>
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
								<h3 class="titulo">Usuarios</h3>
							</div>
						</div>
					</div>
					<div class="col-xs-6">
						<a href="../configuracion.php" class="logo">
							<img class="logoapp" src="../../dist/css/images/logo-innove.png" alt="Logo" border="0" >
						</a>	
					</div>			
				</div>

				
			<div class="row formu">

				<div class="col-sm-12 visible-xs">
					<div class="row">
						<div class="col-sm-4 col-md-3">
							<h3 class="titulo">Usuarios</h3>
						</div>
					</div>
				</div>

				<div class="col-lg-10 col-sm-10">
				<div class="row">

					<!-- Grupo -->
					<div class="col-lg-12 col-sm-12">
						<div class="grupo">
							<div class="row">

								<!-- Item -->
								<div class="col-sm-2">
									<div class="n_grupo"><span>Buscar</span></div>
								</div>
								
								<!-- Item -->
								<div class="col-sm-10">
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

				<div class="col-sm-2 col-sm-offset-10">
				<div class="row">
					<!-- Grupo -->
					<div class="col-lg-12 col-sm-12">
						<div class="grupo">
							<div class="row">
								<!-- Item -->
								<div class="col-sm-12 pr15">
									<label class="btnFull">
										<a href="agregarusuario.php"><span><img src="../../dist/css/images/icon-agregar.png" alt="Agregar"></span></a>
									</label>
								</div>
							</div>
						</div>
					</div>
					<!-- / Grupo -->
				</div>
				</div>

					<div class="col-sm-12 no-busqueda">
						<table id="tabla_cotizacion" class="display tabla cell-border" cellspacing="0" width="100%">
							 <thead>
							 	<tr>
							 		<th width="10%" class="all">Id Usuario</th>
							 		<th width="40%">Nombre Completo</th>
							 		<th width="15%">Usuario</th>
							 		<th width="15%">Rol</th>
							 		<th width="15%">Estado</th>
							 		<th width="7%" class="all">Editar</th>
							 	</tr>
							 </thead>	
							 <tbody>
							 	<?php for($i=0;$i<$numusuarios;$i++){?>
							 	<tr>
							 		<td class="dt-center"><?php echo $V_datosusuario[$i]['id_usuario'];?></td>
							 		<td class="dt-left"><?php echo $V_datosusuario[$i]['nombrecompleto'];?></td>
							 		<td class="dt-left"><?php echo $V_datosusuario[$i]['usuario'];?></td>
							 		<td class="dt-center"><?php echo $V_datosusuario[$i]['nombrerol'];?></td>

							 		<?php if($V_datosusuario[$i]['estado']==0) {?>
							 		<td class="dt-center">Inactivo</td>
							 		<?php } 
							 			elseif ($V_datosusuario[$i]['estado']==1) {?>
							 		<td class="dt-center">Activo</td>	
							 		<?php
							 			}
							 		?>

							 		<td class="dt-center">
									<form class="editarficha" action="editarusuario.php" method="post"><input type="hidden" name="idusuario" value="<?php echo $V_datosusuario[$i]['id_usuario']; ?>">
							 		<a class="editar" href="#.">Editar</a>
							 		</form>
							 		</td>
							 	</tr>
							 	<?php
							 	  }	 		
							 	?>
							 </tbody>		
						</table>
					</div>
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