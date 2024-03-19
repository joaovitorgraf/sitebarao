<?php
    require("conecta.php");

    $id		        = $_POST["id_horario"];
    $curso		    = $_POST["curso-novo"];
    $turma  	    = $_POST["turma"];


    $sqlinsert = ("UPDATE horario SET turma='".$turma."'
    WHERE horario.id_horario='".$id."';");

    mysqli_query($conecta, $sqlinsert) or die ("Não foi possível realizar as alterações nos dados!");

    sleep(1);
    echo"<script>window.location='./pages/layout/boxed.php'</script>";

    if($curso != ""){
                
        $mudacurso = ("UPDATE horario SET curso='".$curso."' WHERE horario.id_horario='".$id."';");

        mysqli_query($conecta, $mudacurso);
    }
?>