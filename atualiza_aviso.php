<?php
    require("conecta.php");

    $id_noticia		= $_POST["id_noticia"];
    $titulo			= $_POST["titulo"];
    $sub_titulo		= $_POST["sub_titulo"];
    $noticia		= $_POST["noticia"];


    $sqlinsert = ("UPDATE noticia SET titulo='".$titulo."', sub_titulo='".$sub_titulo."', noticia='".$noticia."' WHERE noticia.id_noticia='".$id_noticia."';");

    mysqli_query($conecta, $sqlinsert) or die ("Não foi possível realizar as alterações nos dados!");

    sleep(1);
    echo"<script>window.location='./pages/layout/boxed.php'</script>";
?>