<?php
    session_start();
    include_once "conecta.php";

    $conexao = mysqli_select_db($conecta, "sitebarao"); {

    $define_curso = filter_input(INPUT_GET, 'defineCurso');

    echo $define_curso;

        $pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
        $qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
        //calcular o inicio visualização
        $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

        //consultar no banco de dados
        $result_usuario = "SELECT * FROM galeria ORDER BY id_foto DESC LIMIT $inicio, $qnt_result_pg";
        $resultado_usuario = mysqli_query($conecta, $result_usuario);


        //Verificar se encontrou resultado na tabela "usuarios"
        if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
            
                    while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
                        echo '<div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a class="lightbox" href="images/'.$row_usuario["foto"] .'">
                                        <img src="images/'.$row_usuario["foto"].' " alt="Park">
                                    </a>
                                    <div class="caption">

                                        <p>'.$row_usuario["descricao"].'</p>
                                    </div>
                                </div>
                            </div>';
                    }

        //Paginação - Somar a quantidade de usuários
        $result_pg = "SELECT COUNT(id_foto) AS num_result FROM noticia";
        $resultado_pg = mysqli_query($conecta, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);

        //Quantidade de pagina
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        //Limitar os link antes depois
        $max_links = 2;

        echo "<br><nav aria-label='Navegação de página exemplo'> <ul class='pagination justify-content-center text-primary'> <li class='page-item'> <a href='#' class='page-link' onclick='listar_usuario(1, $qnt_result_pg)'><p class='text-success'>Primeira</p></a> </li>";

        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
            if($pag_ant >= 1){
                echo "<li class='page-item'> <a href='#' class='page-link' onclick='listar_usuario($pag_ant, $qnt_result_pg)'><p class='text-success'>$pag_ant </p></a> </li>";
            }
        }

        echo "<li class='page-item'> <a class='page-link'>" .$pagina. "</a> </li>";

        for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
            if($pag_dep <= $quantidade_pg){
                echo "<li class='page-item'> <a href='#' class='page-link' onclick='listar_usuario($pag_dep, $qnt_result_pg)'><p class='text-success'>$pag_dep</p></a> </li>";
            }
        }

        echo "<li class='page-item'> <a href='#' class='page-link' onclick='listar_usuario($quantidade_pg, $qnt_result_pg)'><p class='text-success'> Última </p></a> </li> </ul> </nav>";
        }else{
            echo "<div class='alert alert-danger' role='alert'>Nenhum aviso encontrado!</div>";
        }
    }
?>