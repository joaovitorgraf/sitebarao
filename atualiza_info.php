<?php
    require("conecta.php");

    $id_usuario		= $_POST["id_usuario"];
    $nome			= $_POST["nome"];
    $email			= $_POST["email"];



    $sqlinsert = ("UPDATE usuario SET nome='".$nome."', email='".$email."' WHERE usuario.id_usuario='".$id_usuario."';");

    mysqli_query($conecta, $sqlinsert) or die ("Não foi possível realizar as alterações nos dados!");

    echo"<script>window.location='./pages/layout/boxed.php'</script>";
?>