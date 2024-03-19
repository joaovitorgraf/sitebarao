<?php
$hostname = 'localhost';
$username = 'sitebarao';
$password = '%gr4f%';
$banco    = 'sitebarao';

//Criar a conexão 
$conecta = mysqli_connect($hostname, $username, $password, $banco);
 
//Verificar a conexão com o banco
if (!$conecta) {
    die("A conexão falhou: ".mysqli_connect_error());
    }

   //echo "Conexão estabelecida com sucesso!";

?>