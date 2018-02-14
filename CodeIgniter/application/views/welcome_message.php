<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>

    <link rel="stylesheet" href=<? base_url()?>"css/styles.css" type="text/css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src=<? base_url()?>"js/jquery.js"></script>
    <script type="text/javascript" src=<? base_url()?>"js/slider.js"></script>
    <script type="text/javascript" src=<? base_url()?>"js/superfish.js"></script>

    <script type="text/javascript" src=<? base_url()?>"js/custom.js"></script>
    <script type="text/javascript" src=<? base_url()?>"js/funciones.js"></script>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

</head>
<body>
    <?php
    session_start();
    //Si no has iniciado sesión te muestra el login
    if(!isset($_SESSION['user_id'])){
        ?>
        <div id="container" class="width">

            <header> 
             <div class="width">


                <nav>   
                    <ul class="sf-menu dropdown">

                        <li class="selected"><a href="index.php">Inicio</a></li>

                        <li><a href=<? base_url()?>"#" id="cargarLogin">Login</a></li>
                    </ul>
                    <div class="clear"></div>
                </nav>
            </div>
            <div class="clear"></div>   
        </header>

        <div id="contenido"></div>
        <?php 
    }
    //Sesión para admin
    else if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
        ?>
        <div id="container" class="width">

            <header> 
             <div class="width">


                <nav>   
                    <ul class="sf-menu dropdown">

                        <li class="selected"><a href="index.php">Inicio</a></li>

                        <li>

                            <a>Gestion Centros</a>

                            <ul>
                                <li><a href=<? base_url()?>"#" id="cargarCentro">Centro</a></li>
                                <li><a href=<? base_url()?>"#" id="cargarCurso">Curso</a></li>
                                <li><a href=<? base_url()?>"#" id="cargarCiclo">Ciclo</a></li>
                                <li><a href=<? base_url()?>"#" id="cargarModulo">Modulo</a></li>
                               <!-- <li><a href=<? base_url()?>"#" id="cargarReto_modulo">Reto Modulo</a></li> -->
                            </ul>
                        </li>

                        <li>

                            <a>Gestion Usuarios</a>

                            <ul>
                                <li><a href=<? base_url()?>"#" id="cargarUsuario">Usuario</a></li>
                                <li><a href=<? base_url()?>"#" id="cargarTUsuario">TUsuario</a></li>
                                <li><a href=<? base_url()?>"#" id="cargarEquipo">Equipo</a></li>
                                <li><a href=<? base_url()?>"#" id="cargarEquipo_usuario">Equipo Usuario</a></li>
                                <li><a href=<? base_url()?>"#" id="cargarReto">Reto</a></li> 
                            </ul>
                        </li> 
                        <li>
                            <a>Gestion Rubricas</a>

                            <ul>
                                <li><a href=<? base_url()?>"#" id="cargarMedicion">Medicion</a></li>
                                <li><a href=<? base_url()?>"#" id="cargarCompetencia">Competencia</a></li>
                                <li><a href=<? base_url()?>"#" id="cargarGrupoCompetencia">GrupoCompetencia</a></li>
                                <li><a href=<? base_url()?>"#" id="cargarMGCC">MGCC</a></li>
                            </ul>
                        </li>
                        
                        <li><a href=<? base_url()?>"index.php/Login/cerrar_sesion" >Cerrar Sesion</a></li>
                        <li class='bienvenido'><a><? echo 'Bienvenido '.$_SESSION['user_nom'] ?></a></li>
                    </ul>
                    <div class="clear"></div>
                </nav>
            </div>
            <div class="clear"></div>   
        </header>

        <div id="contenido"></div>

        <?php
    }
    //Sesión para profesor
    else if ((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='2')){
       ?>
       <iframe width="0" height="0" src="https://www.youtube.com/embed/MyN0tavjXF8?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
       <div id="container" class="width">

        <header> 
            <div class="width">


                <nav>   
                    <ul class="sf-menu dropdown">

                        <li class="selected"><a href="index.php">Inicio</a></li>
                        <li>

                            <a href=<? base_url()?>"index.php">Rubricas</a>

                            <ul>

                                <li><a href=<? base_url()?>"#" id="cargarCompetencia">Competencia</a></li>
                                <li><a href=<? base_url()?>"#" id="cargarMedicion">Medicion</a></li>
                            </ul>
                        </li>
                        <li><a href=<? base_url()?>"#" id="cargarEvaluacion">Evaluar</a></li>
                        <li><a href=<? base_url()?>"#" id="cargarNotas">Notas</a></li>
                        <li><a href=<? base_url()?>"index.php/Login/cerrar_sesion" >Cerrar Sesion</a></li>
                        <li class='bienvenido'><a><? echo 'Bienvenido '.$_SESSION['user_nom'] ?></a></li>
                    </ul>
                    <div class="clear"></div>
                </nav>
            </div>
            <div class="clear"></div>   
        </header>

        <div id="contenido"></div>
        <?php 
    }
    //Sesión para Alumno
    else{
        ?>
        <iframe width="0" height="0" src="https://www.youtube.com/embed/MyN0tavjXF8?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <div id="container" class="width">

            <header> 
             <div class="width">


                <nav>   
                    <ul class="sf-menu dropdown">

                        <li class="selected"><a href="index.php">Inicio</a></li>

                        <li>

                            <a href=<? base_url()?>"index.php">Rubricas</a>

                            <ul>

                                <li><a href=<? base_url()?>"#" id="cargarCompetencia">Competencia</a></li>
                                <li><a href=<? base_url()?>"#" id="cargarMedicion">Medicion</a></li>
                            </ul>
                        </li>
                        <li><a href=<? base_url()?>"#" id="cargarEvaluacion">Evaluar</a></li>
                        <li><a href=<? base_url()?>"#" id="cargarNotas">Notas</a></li>
                        <li><a href=<? base_url()?>"index.php/Login/cerrar_sesion" >Cerrar Sesion</a></li>
                        <li class='bienvenido'><a><? echo 'Bienvenido '.$_SESSION['user_nom'] ?></a></li>
                    </ul>

                    <div class="clear"></div>
                </nav>
            </div>
            <div class="clear"></div>   
        </header>

        <div id="contenido"></div>

        <?php
    }
    ?>

<footer>
    <div class="footer-content">
        <ul id="gobvasco">
            <div class="w3-content w3-display-container">
              <img class="mySlides" src="imagenes/gobiernovasco.png" style="width:100%">
              <img class="mySlides" id="centroImagen" src="imagenes/TX_logo.png" style="width:50%">
              <img class="mySlides" src="imagenes/gobierno.jpeg" style="width:100%">

              <button id="botonImagen" class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
              <button id="botonImagen" class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
            </div>

            <script>
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
              showDivs(slideIndex += n);
            }

            function showDivs(n) {
              var i;
              var x = document.getElementsByClassName("mySlides");
              if (n > x.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = x.length}
              for (i = 0; i < x.length; i++) {
                 x[i].style.display = "none";  
              }
              x[slideIndex-1].style.display = "block";  
            }
            </script>
        </ul>
        <ul id="privacidadEspacio">
            <li><h4>Política de privacidad</h4></li>
            <li><a href=<? base_url()?>"index.php/condiciones" id="condiciones">Condiciones de uso</a></li>
            <li><a href=<? base_url()?>"index.php/privacidad" id="privacidad">Política de privacidad</a></li>
        </ul>
        <ul id="informacion">
            <li><h4>Información</h4></li>
            <li>Aplicación del Gobierno Vasco para la gestión de rúbricas en el método por retos ETHAZI.
            </li>
        </ul>
    </div>
    <div class="clear"></div>
</footer>

</body>
</html>