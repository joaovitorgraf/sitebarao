<?php
    require("conecta.php");

    $id_sac	= $_POST["id_sac"];
    $comentario		= $_POST["comentario"];

    $data_hora =  $_POST['data_hora'];
    $date = date('Y-m-d H:i:s', time($data_hora));


    $sqlinsert = "INSERT INTO comentario (comentario, id_sac, data_hora)

    VALUES ('$comentario', '$id_sac', '$date')";

	mysqli_query($conecta, $sqlinsert) or die ("Não foi possível inserir");
	
    sleep(1);
	echo"<script>window.location='./pages/layout/boxed.php'</script>";
?>