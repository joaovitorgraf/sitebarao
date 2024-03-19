<?php
    require("conecta.php");

    $id		        = $_POST["id_foto"];
    $curso		    = $_POST["curso-novo"];
    $descricao	    = $_POST["descricao"];
    $nome			= $_POST["nome"];


    $sqlinsert = ("UPDATE galeria SET descricao='".$descricao."', nome='".$nome."' 
    WHERE galeria.id_foto='".$id."';");

    mysqli_query($conecta, $sqlinsert) or die ("Não foi possível realizar as alterações nos dados!");

    sleep(1);
    echo"<script>window.location='./pages/layout/includs_boxed/lista_completa_galeria.php'</script>";

    if($curso != ""){
                
        $mudacurso = ("UPDATE galeria SET curso='".$curso."' WHERE galeria.id_foto='".$id."';");

        mysqli_query($conecta, $mudacurso);
    }
?>