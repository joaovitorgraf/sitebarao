<?php
    require("conecta.php");

    $id		        = $_POST["id_foto"];
    $curso		    = $_POST["curso-novo"];
    $descricao	    = $_POST["descricao"];
    $nome			= $_POST["nome"];


    $sqlinsert = ("UPDATE galeria SET descricao='".$descricao."', nome='".$nome."' 
    WHERE galeria.id_foto='".$id."';");

    mysqli_query($conecta, $sqlinsert) or die ("Não foi possível realizar as alterações nos dados!");

    echo"<script>window.location='./pages/layout/boxed.php'</script>";

    if($curso != ""){
                
        $mudacurso = ("UPDATE galeria SET curso='".$curso."' WHERE galeria.id_foto='".$id."';");

        mysqli_query($conecta, $mudacurso);
    }
?>