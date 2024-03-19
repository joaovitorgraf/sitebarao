<?php

session_start();

require("conecta.php");

$titulo			= $_POST["titulo"];
$sub_titulo		= $_POST["sub_titulo"];
$noticia		= $_POST["noticia"];
$id_nome           = $_SESSION['id_usuario'];

$data_hora =  $_POST['data_hora'];
$date = date('Y-m-d H:i:s', time($data_hora));


$sqlinsert = "INSERT INTO noticia (titulo, sub_titulo, noticia, data_hora, id_nome)

VALUES ('$titulo', '$sub_titulo', '$noticia', '$date', '$id_nome')";

	mysqli_query($conecta, $sqlinsert) or die ("Não foi possível inserir");
	
	sleep(1);
	echo"<script>window.location='./pages/layout/boxed.php'</script>";
?>