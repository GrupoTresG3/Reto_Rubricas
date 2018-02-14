$(document).ready(function(){

    //Gestion de centros
    $("#cargarCentro").click(function(){
        $("#contenido").load("index.php/Centro",function(){
            $( "#cabecera" ).html( "Gestion de Centros" );
        });
    });
    //Gestion de cursos
    $("#cargarCurso").click(function(){
        $("#contenido").load("index.php/Curso",function(){
            $( "#cabecera" ).html( "Gestion de Cursos" );
        });
    });
    //Gestion de ciclos
    $("#cargarCiclo").click(function(){
        $("#contenido").load("index.php/Ciclo",function(){
            $( "#cabecera" ).html( "Gestion de Ciclos" );
        });
    });
    //Gestion de modulos
    $("#cargarModulo").click(function(){
        $("#contenido").load("index.php/Modulo",function(){
            $( "#cabecera" ).html( "Gestion de Modulos" );
        });
    });
    //Gestion de retos_modulos
    $("#cargarReto_modulo").click(function(){
        $("#contenido").load("index.php/Reto_Modulo",function(){
            $( "#cabecera" ).html( "Gestion de Retos Modulos" );
        });
    });

    //Gestion de Usuarios
    $("#cargarUsuario").click(function(){
        $("#contenido").load("index.php/Usuario",function(){
            $( "#cabecera" ).html( "Gestion de Usuarios" );
        });
    });
    //Gestion de TUsuarios
    $("#cargarTUsuario").click(function(){
        $("#contenido").load("index.php/TUsuario",function(){
            $( "#cabecera" ).html( "Gestion de TUsuarios" );
        });
    });
    //Gestion de equipos
    $("#cargarEquipo").click(function(){
        $("#contenido").load("index.php/Equipo",function(){
            $( "#cabecera" ).html( "Gestion de Equipos" );
        });
    });
    //Gestion de equipos_usuarios
    $("#cargarEquipo_usuario").click(function(){
        $("#contenido").load("index.php/Equipo_Usuario",function(){
            $( "#cabecera" ).html( "Gestion de Equipos Usuarios" );
        });
    });
    //Gestion de retos
    $("#cargarReto").click(function(){
        $("#contenido").load("index.php/Reto",function(){
            $( "#cabecera" ).html( "Gestion de Retos" );
        });
    });

    
    //Gestion de Rubricas  
    $("#cargarNotas").click(function(){
        $("#contenido").load("index.php/Notas",function(){
            $( "#cabecera" ).html( "Gestion de Notas" );
        });
    });
    //Gestion de mediciones
    $("#cargarMedicion").click(function(){
        $("#contenido").load("index.php/Medicion",function(){
            $( "#cabecera" ).html( "Gestion de Mediciones" );
        });
    });
    //Gestion de competencias
    $("#cargarCompetencia").click(function(){
        $("#contenido").load("index.php/Competencia",function(){
            $( "#cabecera" ).html( "Gestion de Competencias" );
        });
    });
    //Gestion de grupos competencias
    $("#cargarGrupoCompetencia").click(function(){
        $("#contenido").load("index.php/GrupoCompetencia",function(){
            $( "#cabecera" ).html( "Gestion de Grupos Competencias" );
        });
    });
    //Gestion de mediciones grupos competencias competencias
    $("#cargarMGCC").click(function(){
        $("#contenido").load("index.php/Medicion_GrupoCompetencia_Competencia",function(){
            $( "#cabecera" ).html( "Gestion de MGCC" );
        });

    });
    //Gestion de matricularse
    $("#cargarMatricularse").click(function(){
        $("#contenido").load("index.php/Matricularse",function(){
            $( "#cabecera" ).html( "Gestion de las Matriculas" );
        });
    });
    //Gestion de evaluaciones
    $("#cargarEvaluacion").click(function(){
        $("#contenido").load("index.php/Evaluar",function(){
            $( "#cabecera" ).html( "Bienvenido " );
        });
    });
    //Gestion de login
    $("#cargarLogin").click(function(){
        $("#contenido").load("index.php/Login",function(){
            $( "#cabecera" ).html( "Login" );
        });
    });
    //Gestion de notas
    $("#cargarNotas").click(function(){
        $("#contenido").load("index.php/Nota",function(){
            $( "#cabecera" ).html( "Notas" );
        });
    });
});