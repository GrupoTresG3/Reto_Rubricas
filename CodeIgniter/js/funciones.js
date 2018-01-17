$(document).ready(function(){

    //Gestion centros
    $("#cargarCentro").click(function(){
        $("#contenido").load("index.php/Centro",function(){
            $( "#cabecera" ).html( "Gestion de Centros" );
        });
    });

     $("#cargarCurso").click(function(){
        $("#contenido").load("index.php/Curso",function(){
            $( "#cabecera" ).html( "Gestion de Cursos" );
        });
    });
    $("#cargarCiclo").click(function(){
        $("#contenido").load("index.php/Ciclo",function(){
            $( "#cabecera" ).html( "Gestion de Ciclos" );
        });
    });
    $("#cargarModulo").click(function(){
        $("#contenido").load("index.php/Modulo",function(){
            $( "#cabecera" ).html( "Gestion de Modulos" );
        });
    });
    $("#cargarReto_modulo").click(function(){
        $("#contenido").load("index.php/Reto_Modulo",function(){
            $( "#cabecera" ).html( "Gestion de Retos Modulos" );
        });
   });

    //Gestion Usuarios
    $("#cargarUsuario").click(function(){
        $("#contenido").load("index.php/Usuario",function(){
            $( "#cabecera" ).html( "Gestion de Usuarios" );
        });
    });
    $("#cargarTUsuario").click(function(){
        $("#contenido").load("index.php/TUsuario",function(){
            $( "#cabecera" ).html( "Gestion de TUsuarios" );
        });
    });
    $("#cargarEquipo").click(function(){
        $("#contenido").load("index.php/Equipo",function(){
            $( "#cabecera" ).html( "Gestion de Equipos" );
        });
    });
    $("#cargarEquipo_usuario").click(function(){
        $("#contenido").load("index.php/Equipo_Usuario",function(){
            $( "#cabecera" ).html( "Gestion de Equipos Usuarios" );
        });
    });
     
    $("#cargarReto").click(function(){
        $("#contenido").load("index.php/Reto",function(){
            $( "#cabecera" ).html( "Gestion de Retos" );
        });
    });
     
    
    //Gestion Rubricas  
    $("#cargarNotas").click(function(){
        $("#contenido").load("index.php/Notas",function(){
            $( "#cabecera" ).html( "Gestion de Notas" );
        });
    });
    $("#cargarMedicion").click(function(){
        $("#contenido").load("index.php/Medicion",function(){
            $( "#cabecera" ).html( "Gestion de Mediciones" );
        });
    });
    $("#cargarCompetencia").click(function(){
        $("#contenido").load("index.php/Competencia",function(){
            $( "#cabecera" ).html( "Gestion de Competencias" );
        });
    });
    $("#cargarGrupoCompetencia").click(function(){
        $("#contenido").load("index.php/GrupoCompetencia",function(){
            $( "#cabecera" ).html( "Gestion de Grupos Competencias" );
        });
    });
    $("#cargarMGCC").click(function(){
        $("#contenido").load("index.php/Medicion_GrupoCompetencia_Competencia",function(){
            $( "#cabecera" ).html( "Gestion de MGCC" );
        });

    });
    $("#cargarReto_Medicion").click(function(){
        $("#contenido").load("index.php/Reto_Medicion",function(){
            $( "#cabecera" ).html( "Gestion de Retos Mediciones" );
        });
    });

     $("#cargarMatricularse").click(function(){
        $("#contenido").load("index.php/Matricularse",function(){
            $( "#cabecera" ).html( "Gestion de las Matriculas" );
        });
    });

    $("#cargarLogin").click(function(){
        $("#contenido").load("index.php/Login",function(){
            $( "#cabecera" ).html( "Login" );
        });
    });
});