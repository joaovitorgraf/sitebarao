<?php
    require("conecta.php");

    $id		        = $_POST["id"];
    $nome			= $_POST["nome"];
    $email	        = $_POST["email"];
    $login		    = $_POST["login"];
    $setor		    = $_POST["setor"];
    $novaSenha      = $_POST["senha"];


    $sqlinsert = ("UPDATE usuario SET nome='".$nome."', login='".$login."', email='".$email."', login='".$login."' 
    WHERE usuario.id_usuario='".$id."';");

    mysqli_query($conecta, $sqlinsert) or die ("Não foi possível realizar as alterações nos dados!");

    echo"<script>window.location='./pages/layout/boxed.php'</script>";

    if($novaSenha != ""){
        $MD5 = md5($novaSenha);
                
        $mudasenha = ("UPDATE usuario SET senha='".$MD5."' WHERE usuario.id_usuario='".$id."';");

        mysqli_query($conecta, $mudasenha);
    }

    if($setor != ""){
                
        $mudasetor = ("UPDATE usuario SET setor='".$setor."' WHERE usuario.id_usuario='".$id."';");

        mysqli_query($conecta, $mudasetor);
    }
?>