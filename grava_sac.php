<?php

session_start();

require("conecta.php");

$nome			= $_POST["nome"];
$email		    = $_POST["email"];
$telefone		= $_POST["telefone"];
$mensagem		= $_POST["mensagem"];

$data_hora =  $_POST['data_hora'];
$date = date('Y-m-d H:i:s', time($data_hora));


$sqlinsert = "INSERT INTO sac (nome, email, telefone, mensagem, data_hora)

VALUES ('$nome', '$email', '$telefone', '$mensagem', '$date')";

	mysqli_query($conecta, $sqlinsert) or die ("Não foi possível inserir");
	
	sleep(1);
	echo"<script>window.location='index.php'</script>";
?>