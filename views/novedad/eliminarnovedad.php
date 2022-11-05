<?php
$ruta="../../servicios/serv_cotizacion/";
include($ruta . 'producto.php');

$obj_producto= new producto();

$var_idproducto=$_POST['idproducto'];
$V_datosproductos=$obj_producto->getproducto($var_idproducto);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tipos de Producto</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- Estilos Globales -->
	<link rel="stylesheet" href="../css/global.css">
	<!-- Estilos para las tablas -->
	<link rel="stylesheet" href="../js/datatables/datatables.css">
	<!-- Estilos jQuery UI para fechas -->
	<link rel="stylesheet" href="../js/jquery.ui/jquery-ui.min.css">
	<!-- Fancy -->
	<link rel="stylesheet" type="text/css" href="../../fancy/source/jquery.fancybox.css?v=2.1.5" media="screen" />		

</head>

<body>

		<header>
			<div class="banner">
				<div class="container">
					
					<a href="../tipoproducto/index.php" class="logo">
						<img src="../css/images/logo-icon-metalex.png" alt="Logo Metalex">
					</a>

					<div class="itemsMenu">
						<div id="saludo" class="item">¡Bienvenido!</div>
						<div class="item"><a class="close" href="../terminarsesion.php">Cerrar Sesión <i class="icon-cerrar"></i></a></div>
					</div>

				</div>

				<img class="bannerMovil" src="../css/images/bg-banner-movil.jpg" alt="Banner">

			</div>	
		</header>

		<div class="container mb40">

			<div class="row mb20">
				<div id="saludo2" class="col-xs-6 visible-xs"></div>
				<div class="col-xs-6 hidden-xs">
					<div class="row">
						<div class="col-sm-9 col-md-6 mt10">
							<h3 class="titulo">Eliminar Producto</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<a href="index.php" class="logo">
						<img class="logoMetone" src="../css/images/logo-metone.png" alt="Logo Metone" border="0" >
					</a>	
				</div>			
			</div>

			<div class="row formu">

				<div class="col-sm-12 visible-xs">
					<div class="row">
						<div class="col-sm-4 col-md-3">
							<h3 class="titulo">Eliminar Producto</h3>
						</div>
					</div>
				</div>

				<form class="frmnormal" id="datostp" action="actualizarproducto.php" method="post">
					<input type="hidden" name="idproducto" value="<?php echo "$var_idproducto"; ?>">
					<input type="hidden" name="accion" value="3">
					<div>
						<label>
							<textarea class="dt-left">
								<?php 
								echo $V_datosproductos['descripcion'];
								echo $V_datosproductos['referencia'];
								echo $V_datosproductos['idtipoproducto'];
								echo $V_datosproductos['medida1'];
								echo $V_datosproductos['medida2'];
								echo $V_datosproductos['medida3'];
								echo $V_datosproductos['medida4'];
								echo $V_datosproductos['precio'];
								?>
							</textarea>
						</label>
					<div>
					<input type="submit" value="Eliminar" name="Eliminar">
					</div>
				</form>	
			</div>
		</div>

		<p class="derechos">UTS</p>
	
		<!-- Scripts -->
		<script src="../js/jquery-1.7.1.min.js"></script>
		<script src="../js/scripts.min.js"></script>
		<script src="../js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../../fancy/source/jquery.fancybox.js?v=2.1.5"></script>

</body>

</html>