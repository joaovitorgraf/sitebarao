<?php
include('valida_session.php');
?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Lista completa de Fotos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<br>
		<h2>Lista de Fotos</h2>
		<br>
		<span id="conteudo"></span>
	</div>
	<section class="content" id="galeria">
		<script>
			var qnt_result_pg = 15; //quantidade de registro por página
			var pagina = 1; //página inicial
			$(document).ready(function() {
				listar_usuario(pagina, qnt_result_pg); //Chamar a função para listar os registros
			});

			function listar_usuario(pagina, qnt_result_pg) {
				var dados = {
					pagina: pagina,
					qnt_result_pg: qnt_result_pg
				}
				$.post('listar_galeria.php', dados, function(retorna) {
					//Subtitui o valor no seletor id="conteudo"
					$("#conteudo").html(retorna);
				});
			}
		</script>
	</section>
</body>

</html>