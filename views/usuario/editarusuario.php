<?php

session_start();
include('../seguridad.php');
$ruta="../../models/";
include($ruta. 'usuario.php');
include($ruta . 'rol.php');

$obj_usuario=new usuario();
$obj_rol=new rol();

$var_idusuario = $_POST['idusuario'];
$V_datosusuario = $obj_usuario->getusuario($var_idusuario);

$V_datosroles=$obj_rol->getallroles();
$numroles=count($V_datosroles);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
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
                        <h3 class="titulo">Editar Usuario</h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <a href="index.php" class="logo">
                    <img class="logoapp" src="../../dist/css/images/logo-innove.png" alt="Logo" border="0" >
                </a>
            </div>
        </div>
        

        <div class="row formu">

            <div class="col-sm-12 visible-xs">
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <h3 class="titulo">Editar Usuario</h3>
                    </div>
                </div>
            </div>

        <form class="frmusuario" action="../../controllers/actualizarusuario.php" method="post" autocomplete="off">
            <input type="hidden" name="idusuario" value="<?php echo "$var_idusuario"; ?>">
            <input type="hidden" name="accion" value="2">

            
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


                <!-- Fila 1 Inicio-->
                    <div class="row">
                        <!-- Grupo -->
                        <div class="col-lg-6 col-sm-6">
                            <div class="grupo">
                                <div class="row">

                                    <!-- Item -->
                                    <div class="col-sm-4">
                                        <div class="n_grupo"><span>Nombres</span></div>
                                    </div>
                                    
                                    <!-- Item -->
                                    <div class="col-sm-8">
                                        <div class="item">
                                            <label>
                                                <input type="text" name="txt_nombre" id="txt_nombre" value="<?php echo $V_datosusuario['nombres'] ?>" title="El nombre es requerido" required>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- / Grupo -->
                        
                    <!-- Grupo -->
                    <div class="col-lg-6 col-sm-6">
                        <div class="grupo">
                            <div class="row">

                                <!-- Item -->
                                <div class="col-sm-4">
                                    <div class="n_grupo"><span>Apellidos</span></div>
                                </div>

                                <!-- Item -->
                                 <div class="col-sm-8">
                                        <div class="item">
                                            <label>
                                                <input type="text" name="txt_apellidos" id="txt_apellidos" value="<?php echo $V_datosusuario['apellidos'] ?>" title="El nombre es requerido" required>
                                            </label>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                    <!-- / Grupo -->

                    </div>                
                <!-- Fila 1 Fin-->


                <div class="row">
                    <!-- Grupo -->
                    <div class="col-lg-6 col-sm-6">
                        <div class="grupo">
                            <div class="row">

                                <!-- Item -->
                                <div class="col-sm-4">
                                    <div class="n_grupo"><span>Usuario</span></div>
                                </div>
                                
                                <!-- Item -->
                                <div class="col-sm-8">
                                    <div class="item">
                                        <label>
                                            <input type="text" name="txt_usuario" id="txt_usuario" value="<?php echo $V_datosusuario['usuario'] ?>" title="El usuario es requerido" required>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- / Grupo -->
                    
                    <!-- Grupo -->
                    <div class="col-lg-6 col-sm-6">
                        <div class="grupo">
                            <div class="row">

                                <!-- Item -->
                                <div class="col-sm-4">
                                    <div class="n_grupo"><span>Contraseña</span></div>
                                </div>
                                
                                <!-- Item -->
                                <div class="col-sm-8">
                                    <div class="item">
                                        <label>
                                            <input type="password" name="txt_contraseña"  id="txt_contraseña" value="<?php echo $V_datosusuario['contrasena'] ?>" title="La contraseña es requerida" required>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- / Grupo -->
                </div>


                <!-- Grupo - Segunda Fila  -->
                <div class="row">

                    <!-- Grupo -->
                    <div class="col-lg-6 col-sm-6">
                        <div class="grupo">
                            <div class="row">

                                <!-- Item -->
                                <div class="col-sm-4">
                                    <div class="n_grupo"><span>Estado</span></div>
                                </div>
                                
                                <!-- Item -->
                                <div class="col-sm-8">
                                    <div class="item">
                                        <label>
                                            <div class="combo">
                                                <select name="sel_estado" class="selec" tittle="Estado es obligatorio" required>
                                                        <option value=" " selected>-</option>               
                                                        <option value="0" <?php if($V_datosusuario['estado']==0) { ?> selected <?php  } ?> >Inactivo</option>
                                                        <option value="1" <?php if($V_datosusuario['estado']==1){ ?> selected <?php } ?> >Activo</option>
                                                        
                                                </select>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- / Grupo -->
                    
                    <!-- Grupo -->
                    <div class="col-lg-6 col-sm-6">
                        <div class="grupo">
                            <div class="row">

                                <!-- Item -->
                                <div class="col-sm-4">
                                    <div class="n_grupo"><span>Rol</span></div>
                                </div>
                                
                                <!-- Item -->
                                <div class="col-sm-8">
                                    <div class="item">
                                        <label>
                                            <div class="combo"> 
                                                <select name="sel_rol" class="selec" tittle="Rol es obligatorio" required> 
                                                <option value=" ">-</option>                                                   
                                                    <?php for($j=0;$j<$numroles;$j++){ ?>
                                                    <option value="<?php echo $V_datosroles[$j]['id_rol']; ?>" <?php if($V_datosusuario['id_rol'] == $V_datosroles[$j]['id_rol']){ ?> selected <?php } ?> ><?php echo $V_datosroles[$j]['descripcion']; ?></option>
                                                    <?php  }  ?>
                                                </select>
                                            </div>
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