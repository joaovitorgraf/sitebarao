<?php
require("conecta.php");

//Recebendo dados do formulário
$nome               = $_POST["nome"];
$email              = $_POST["email"];
$login              = $_POST["login"];
$senha              = md5($_POST["senha"]);
$ativo              = 1;
$setor              = $_POST["setor"];


$sqlinsert = "INSERT INTO usuario (nome, email, login, senha, ativo, setor, foto_usuario)

VALUES ('$nome','$email', '$login', '$senha', '$ativo', '$setor', 'user.png')";

    //Conecta e insere, se não conseguir inserir aparece msg de erro
    mysqli_query($conecta, $sqlinsert) or die ("Não foi possível inserir");
    //Recarrega a pagina
    sleep(1);
    echo"<script>window.location='./pages/layout/boxed.php'</script>";

?>