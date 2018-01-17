<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>

    <link rel="stylesheet" href=<? base_url()?>"css/styles.css" type="text/css" />

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
                                <li><a href=<? base_url()?>"#" id="cargarReto_modulo">Reto Modulo</a></li> 
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
                            <li><a href=<? base_url()?>"#" id="cargarNotas">Notas</a></li>
                            <li><a href=<? base_url()?>"#" id="cargarMedicion">Medicion</a></li>
                            <li><a href=<? base_url()?>"#" id="cargarCompetencia">Competencia</a></li>
                            <li><a href=<? base_url()?>"#" id="cargarGrupoCompetencia">GrupoCompetencia</a></li>
                            <li><a href=<? base_url()?>"#" id="cargarMGCC">MGCC</a></li>
                            <li><a href=<? base_url()?>"#" id="cargarReto_Medicion">Reto Medicion</a></li>
                        </ul>
                    </li>

                     <li><a href=<? base_url()?>"#" id="cargarMatricularse">Matricularse</a></li>
                    
                    <li><a href=<? base_url()?>"index.php/Login/cerrar_sesion" >Cerrar Sesion</a></li>
                </ul>
                <div class="clear"></div>
            </nav>
        </div>
        <div class="clear"></div>   
    </header>

    <div id="contenido"></div>

    <?php
}
else if ((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='2')){
   ?>
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
                    <li><a href=<? base_url()?>"index.php/Login/cerrar_sesion" >Cerrar Sesion</a></li>
                </ul>
                <div class="clear"></div>
            </nav>
        </div>
        <div class="clear"></div>   
    </header>

    <div id="contenido"></div>
    <?php 
}
else{
    ?>
     <div id="container" class="width">

            <header> 
             <div class="width">


                <nav>   
                    <ul class="sf-menu dropdown">
                     
                        <li class="selected"><a href="index.php">Inicio</a></li>

                    <li>

                        <a href=<? base_url()?>"index.php">Rubricas</a>
                        
                        <ul>
                            
                            <li><a href=<? base_url()?>"#" id="cargarCompetencia">Competencia2</a></li>
                            <li><a href=<? base_url()?>"#" id="cargarMedicion">Medicion</a></li>
                        </ul>
                    </li>
                    <li><a href=<? base_url()?>"index.php/Login/cerrar_sesion" >Cerrar Sesion</a></li>
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
    <div class="footer-content width">
        <ul>
           <li><h4>Proin accumsan</h4></li>
           <li><a href="#">Rutrum nulla a ultrices</a></li>
           <li><a href="#">Blandit elementum</a></li>
           <li><a href="#">Proin placerat accumsan</a></li>
           <li><a href="#">Morbi hendrerit libero </a></li>
           <li><a href="#">Curabitur sit amet tellus</a></li>
       </ul>

       <ul>
           <li><h4>Condimentum</h4></li>
           <li><a href="#">Curabitur sit amet tellus</a></li>
           <li><a href="#">Morbi hendrerit libero </a></li>
           <li><a href="#">Proin placerat accumsan</a></li>
           <li><a href="#">Rutrum nulla a ultrices</a></li>
           <li><a href="#">Cras dictum</a></li>
       </ul>

       <ul>
        <li><h4>Suspendisse</h4></li>
        <li><a href="#">Morbi hendrerit libero </a></li>
        <li><a href="#">Proin placerat accumsan</a></li>
        <li><a href="#">Rutrum nulla a ultrices</a></li>
        <li><a href="#">Curabitur sit amet tellus</a></li>
        <li><a href="#">Donec in ligula nisl.</a></li>
    </ul>

    <ul class="endfooter">
       <li><h4>Suspendisse</h4></li>
       <li>Integer mattis blandit turpis, quis rutrum est. Maecenas quis arcu vel felis lobortis iaculis fringilla at ligula. Nunc dignissim porttitor dolor eget porta. <br /><br />

        <div class="social-icons">

            <a href="#"><i class="fa fa-facebook fa-2x"></i></a>

            <a href="#"><i class="fa fa-twitter fa-2x"></i></a>

            <a href="#"><i class="fa fa-youtube fa-2x"></i></a>

            <a href="#"><i class="fa fa-instagram fa-2x"></i></a>

        </div>

    </li>
</ul>

<div class="clear"></div>

</footer>

</body>
</html>