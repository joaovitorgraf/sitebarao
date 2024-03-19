<?php
include_once "conecta.php";

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados
$result_usuario = "SELECT * FROM noticia ORDER BY data_hora DESC LIMIT $inicio, $qnt_result_pg";
$resultado_usuario = mysqli_query($conecta, $result_usuario);


//Verificar se encontrou resultado na tabela "usuarios"
if (($resultado_usuario) and ($resultado_usuario->num_rows != 0)) {
?>
    <?php
    while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
    ?>
        <section class="content">
            <div class="col">
                <div class="active tab-pane" id="blog">
                    <!-- Post -->
                    <div class="post">
                        <?php

                        $nome = $row_usuario["id_nome"];

                        $sql_use = "SELECT * FROM usuario WHERE id_usuario='$nome'";
                        $consulta_use = mysqli_query($conecta, $sql_use);

                        while ($registro_use = mysqli_fetch_assoc($consulta_use)) {

                        ?>
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="pages/layout/img/<?php echo $registro_use["foto_usuario"]; ?>" alt="user image">
                                <div class="card-tools">



                                    <span class="username">
                                        <a href="#" style="font-family: 'Quicksand', sans-serif;"><?php echo $registro_use["nome"]; ?></a>
                                    </span>

                                <?php
                            }
                                ?>

                                <span class="description" style="font-family: 'Pacifico', cursive;">Publicado em:
                                    <?php

                                    $date = $row_usuario["data_hora"];


                                    echo date('d/m/Y', strtotime($date));
                                    echo ' às ';
                                    echo date('H:i', strtotime($date));

                                    ?>
                                </span>
                                </div>
                            </div>
                            <!-- /.user-block -->
                            
                            <p style="font-family: 'Quicksand', sans-serif; font-weight: bold; letter-spacing: 1px;"><?php echo $row_usuario["titulo"] ?></p>
                            <blockquote class="quote-success">
                            <p style="font-family: 'Quicksand', sans-serif;">
                                <?php echo $row_usuario["noticia"];?>
                            </p>
                            </blockquote>

                            <hr style="border: 0;  height: 1px;  background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
                    </div>
                    <!-- /.post -->
                </div>
            </div>
        </section>
    <?php
    } ?>
    </tbody>
    </table>
<?php
    //Paginação - Somar a quantidade de usuários
    $result_pg = "SELECT COUNT(id_noticia) AS num_result FROM noticia";
    $resultado_pg = mysqli_query($conecta, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);

    //Quantidade de pagina
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    //Limitar os link antes depois
    $max_links = 2;

    echo "<br><nav aria-label='Navegação de página exemplo'> <ul class='pagination justify-content-center text-primary'> <li class='page-item'> <a href='#aviso' class='page-link' onclick='listar_usuario(1, $qnt_result_pg)'><p class='text-success'><i class='fas fa-fast-backward'></i></p></a> </li>";

    for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
        if ($pag_ant >= 1) {
            echo "<li class='page-item'> <a href='#aviso' class='page-link' onclick='listar_usuario($pag_ant, $qnt_result_pg)'><p class='text-success'>$pag_ant </p></a> </li>";
        }
    }

    echo "<li class='page-item'> <a class='page-link'>" . $pagina . "</a> </li>";

    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
        if ($pag_dep <= $quantidade_pg) {
            echo "<li class='page-item'> <a href='#aviso' class='page-link' onclick='listar_usuario($pag_dep, $qnt_result_pg)'><p class='text-success' style='font-family: Quicksand, sans-serif;'>$pag_dep</p></a> </li>";
        }
    }

    echo "<li class='page-item'> <a href='#aviso' class='page-link' onclick='listar_usuario($quantidade_pg, $qnt_result_pg)'><p class='text-success' style='font-family: Quicksand, sans-serif;'><i class='fas fa-fast-forward'></i></p></a> </li> </ul> </nav>";
} else {
    echo "<div class='alert alert-danger' role='alert'>Nenhum aviso encontrado!</div>";
}
