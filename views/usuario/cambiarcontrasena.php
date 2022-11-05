<?php

session_start();
include('../seguridad.php');
$ruta="../../models/";
include($ruta . 'usuario.php');

$obj_usuario=new usuario();

$V_datosusuario=$obj_usuario->getusuario($_SESSION["ses_idusuario"]);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contreña</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- Estilos Globales -->
    <link rel="stylesheet" href="../../dist/css/global.css">
    <!-- Estilos para las tablas -->
    <link rel="stylesheet" href="../../dist/js/datatables/datatables.css">
    <!-- Estilos jQuery UI para fechas -->
    <link rel="stylesheet" href="../../dist/js/jquery.ui/jquery-ui.min.css">

    <link rel="stylesheet" type="text/css" href="../../dist/fancy/source/jquery.fancybox.css?v=2.1.5" media="screen" />      
</head>

<body>
    
    <header>
        <div class="banner">
            <div class="container">
                
                <a href="../menu.php" class="logo">
                    <img src="../../dist/css/images/logopenagos.png" alt="Logo">
                </a>

                <div class="itemsMenu">
                    <div id="saludo" class="item">¡Bienvenido! <?php echo $_SESSION["ses_nombreuser"]; ?></div>
                    <div class="item"><a class="close" href="../../finsesion.php">Cerrar Sesión <i class="icon-cerrar"></i></a></div>
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
                        <h3 class="titulo">Cambiar Contraseña</h3>
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
                        <h3 class="titulo">Cambiar Contraseña</h3>
                    </div>
                </div>
            </div>

        <form class="frmpass" action="../../controllers/actualizarusuario.php" method="post" autocomplete="off">
            <input type="hidden" name="id_usuario" value="<?php echo $V_datosusuario['id_usuario'] ?>">
            <input type="hidden" name="accion" value="3">

            
            <div class="col-lg-12 col-sm-12">
                    <a id="errores"></a>
                    <!-- ERRORES -->
                    <div  class="errores clearfix" style="margin-bottom: 25px;">
                        <div class="revisar">
                            <p>Por favor revisar los siguientes campos:</p>
                            <ul></ul>
                        </div>
                    </div>
                    <!-- / ERRORES -->


                <div class="row">               
                    
                    <!-- Grupo -->
                    <div class="col-lg-6 col-sm-6">
                        <div class="grupo">
                            <div class="row">

                                <!-- Item -->
                                <div class="col-sm-4">
                                    <div class="n_grupo"><span>Contraseña Anterior</span></div>
                                </div>
                                
                                <!-- Item -->
                                <div class="col-sm-8">
                                    <div class="item">
                                        <label>
                                            <input type="password" name="txt_canterior"  id="txt_canterior" value="" title="La contraseña es requerida" required>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- / Grupo -->
                </div>  

                <div class="row">               
                    
                    <!-- Grupo -->
                    <div class="col-lg-6 col-sm-6">
                        <div class="grupo">
                            <div class="row">

                                <!-- Item -->
                                <div class="col-sm-4">
                                    <div class="n_grupo"><span>Nueva Contraseña</span></div>
                                </div>
                                
                                <!-- Item -->
                                <div class="col-sm-8">
                                    <div class="item">
                                        <label>
                                            <input type="password" name="txt_cnueva1"  id="txt_cnueva1" value="" title="La contraseña es requerida" required>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- / Grupo -->
                </div>

                <div class="row">               
                    
                    <!-- Grupo -->
                    <div class="col-lg-6 col-sm-6">
                        <div class="grupo">
                            <div class="row">

                                <!-- Item -->
                                <div class="col-sm-4">
                                    <div class="n_grupo"><span>Repetir Nueva Contraseña</span></div>
                                </div>
                                
                                <!-- Item -->
                                <div class="col-sm-8">
                                    <div class="item">
                                        <label>
                                            <input type="password" name="txt_cnueva2"  id="txt_cnueva2" value="" title="La contraseña es requerida" required>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- / Grupo -->
                </div>              

                    <!-- Grupo Boton Enviar -->
                <div class="row">
                                <!-- Item -->
                     <div class="col-sm-2 filtrar">
                        <label class="btnFull">
                            <!-- <input type="submit" value="Enviar" Onclick="Validargestionproceso()" > -->
                            <input id="Enviarformt" type="submit" value="Enviar" >
                        </label>
                    </div>
                </div>
                    <!-- / Grupo Boton Enviar-->
            </div>
        </form>     

                </div>
            </div>

        </div>

    </div>

    <p class="derechos">UTS</p>
    
    <!-- Scripts -->
    <script src="../../dist/js/jquery-1.7.1.min.js"></script>
    <script src="../../dist/js/scripts.min.js"></script>
    <script src="../../dist/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../../dist/fancy/source/jquery.fancybox.js?v=2.1.5"></script>    


    
</body>

</html>