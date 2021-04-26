<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>

  <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
     <!--====== Title ======-->
    <title>RIFA 2021 | SAN FRANCISCO DEKKERLAB</title>

    <!-- ** vistas/modulos/plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="vistas/modulos/plugins/bootstrap/bootstrap.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="vistas/modulos/plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="vistas/modulos/plugins/themify-icons/themify-icons.css">

    <!-- Main Stylesheet -->
    <link href="vistas/modulos/css/style.css" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" href="vistas/modulos/images/logo.ico" type="image/x-icon">
    <link rel="icon" href="vistas/modulos/images/logo.ico" type="image/x-icon">

    <!-- jQuery -->
    <script src="vistas/modulos/plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="vistas/modulos/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="vistas/modulos/plugins/slick/slick.min.js"></script>
    <!-- filter -->
    <script src="vistas/modulos/plugins/shuffle/shuffle.min.js"></script>

    <!-- Main Script -->
    <script src="vistas/modulos/js/script.js"></script>

    <?php
      if (isset($_GET["ruta"])) {
          if ($_GET["ruta"] == "inicio") {
            echo '<script src="vistas/modulos/js/jquery.countdown.min.js"></script>';
          }
      }else{

        echo '<script src="vistas/modulos/js/jquery.countdown.min.js"></script>';

      }
    ?>

</head>

<body>



<?php
/*=============================================
HEADER
=============================================*/

    echo '<div class="wrapper">';

     if(isset($_GET["ruta"])){

          $carpeta = "vistas/modulos/";
          $class = $carpeta . $_GET["ruta"]. '.php';


          if (!file_exists($class)) {
              //include "modulos/404.php";
          }else{

            include "modulos/header.php";
            include "modulos/".$_GET["ruta"].".php";
            include "modulos/footer.php";
            

          }   

     }else{
        include "modulos/header.php";
        include "modulos/inicio.php";
        include "modulos/footer.php";
     }

    echo '</div>';
 
?>
<!--SCRIPTS JS-->
<script src="vistas/modulos/js/acciones.js"></script>
<!--SCRIPTS JS-->
</body>
</html>