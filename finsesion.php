<?php
   session_start();
   unset($_SESSION["ses_username"]);
   unset($_SESSION["ses_nombreuser"]);
   unset($_SESSION["ses_idroluser"]);
   unset($_SESSION["autentificado"]);  
   unset($_SESSION["ses_idusuario"]);

   
   unset($_SESSION['userAgent']);
   unset($_SESSION['SKey']);
   unset($_SESSION['IPaddress']);
   unset($_SESSION['LastActivity']);

   session_unset(); 
   session_destroy();

   //borramos la cookie de sesión en el servidor  
   if ( isset( $_COOKIE[session_name()] ) ) { 
   setcookie( session_name(), "", time()-3600, "/" );  
 }

?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <title>Finalizar Sesión</title>
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

   <!-- Estilos CSS -->
   <link rel="stylesheet" href="dist/css/global.css">


</head>

<body>

   <div class="cLogin">

      <figure class="mb30">
         <a href="index.php">
            <img class="img-responsive centerImg" src="dist/css/images/logo-innove.png" alt="Logo">
         </a>
      </figure>
      <figure class="mb40">
         <a href="index.php">         
            <img class="img-responsive centerImg" src="images/logo-metalex.png" alt="">
         </a>   
      </figure>

      <p class="derechos mb50"> .</p>

   </div>
   
   <!-- Scripts -->
   <script src="dist/js/jquery-1.7.1.min.js"></script>
   <script src="dist/js/scripts.min.js"></script>
   
</body>

</html>