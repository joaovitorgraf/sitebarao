<?php
include('valida_session.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../Editor/plugins/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../../../plugins/toastr/toastr.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../../Editor/plugins/summernote-bs4.min.css">
</head>

<body>
    <?php
    include_once "../../../conecta.php";


    $pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
    //calcular o inicio visualização
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    //consultar no banco de dados
    $result_usuario = "SELECT * FROM galeria ORDER BY data_hora DESC LIMIT $inicio, $qnt_result_pg";
    $resultado_usuario = mysqli_query($conecta, $result_usuario);


    //Verificar se encontrou resultado na tabela "usuarios"
    if (($resultado_usuario) and ($resultado_usuario->num_rows != 0)) {
    ?>

        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Data</th>
                    <th scope="col">PASTA</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($pesquisa == "") {
                    $sql = "SELECT * FROM galeria ORDER by data_hora";
                    $cnt = mysqli_num_rows($consulta);        //Guardar o número de resultados obtidos na consulta

                } else

                    $sql = "SELECT * FROM noticia WHERE titulo LIKE '%$pesquisa%' OR sub_titulo LIKE '%$pesquisa%' OR noticia LIKE '%$pesquisa%' ORDER by data_hora";
                $consulta = mysqli_query($conecta, $sql);
                $cnt = mysqli_num_rows($consulta);        //Guardar o número de resultados obtidos na consulta

                //Exibe mensagem de quantos registros foram encontrados.
                if ($cnt == "0") {
                    $msg = 'Nenhum registro foi encontrado em nossa base de dados.<br><br>';
                }

                if ($cnt == "1" & $pesquisa == "") {
                    $msg = 'Sua pesquisa resultou em <b>"' . $cnt . '"</b> registro encontrado.<br><br>';
                }

                if ($cnt >= "2" & $pesquisa == "") {
                    $msg = 'Sua pesquisa resultou em <b>"' . $cnt . '"</b> registros encontrados.<br><br>';
                }

                if ($cnt >= "2" & $pesquisa != "") {
                    $msg = 'Sua pesquisa resultou em <b>"' . $cnt . '"</b> registros encontrados com o termo <b>"' . $pesquisa . '"</b>.<br><br>';
                }



                echo '<p class="text-right">' . $msg . '</p>';

                while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {

                ?>

            <tbody>

                <tr>
                    <td><?php echo $row_usuario["nome"] ?></td>
                    <td><?php $date = $row_usuario["data_hora"];
                        echo date('d/m/Y', strtotime($date)); ?>
                    </td>
                    <td><?php echo $row_usuario["curso"] ?></td>
                    <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                            <?php echo '<a class="btn btn-info" href="#" data-toggle="modal" data-target="#editaFoto' . $row_usuario['id_foto'] . '"><i class="fas fa-eye"></i></a>'; ?>
                            <?php echo '<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#excluiFoto' . $row_usuario['id_foto'] . '"><i class="fas fa-trash"></i></a>'; ?>
                        </div>
                    </td>
                </tr>

            </tbody>

            <!--Modal editar foto-->
            <div class="modal fade bd-example-modal-lg" id="editaFoto<?php echo $row_usuario['id_foto']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title text-center text-success swalDefaultInfoEng" style="cursor: pointer;" id="exempleModal">
                                <i class="fas fa-cog"></i>
                            </h2>
                            <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="POST" name="EditaFoto" action="../../../atualiza_Foto2.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col lg-6">
                                        <label class="text-muted">Nome da Foto -<a class="text-success swalDefaultInfoIntra" style="text-decoration-color: none; cursor: pointer;">
                                                Intranet</a></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col lg-6">
                                        <div class="input-group mb-3">
                                            <input class="form-control" type="text" name="nome" value="<?php echo $row_usuario['nome'] ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span>
                                                        <ion-icon name="bookmark">
                                                        </ion-icon>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col lg-6">
                                        <label class="text-muted">Descrição - <a class="text-success swalDefaultInfoInde" style="text-decoration-color: none; cursor: pointer;">
                                                Index</a></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col lg-6">
                                        <div class="input-group mb-3">
                                            <input type="hidden" name="id_foto" value="<?php echo $row_usuario['id_foto'] ?>">
                                            <textarea type="text" class="form-control" name="descricao"><?php echo $row_usuario['descricao'] ?></textarea>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span>
                                                        <ion-icon name="book"></ion-icon>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col lg-6">
                                        <label class="text-muted">PASTA: <?php echo $row_usuario['curso'] ?> -<a class="text-success swalDefaultInfoIntra" style="text-decoration-color: none; cursor: pointer;">
                                                Intranet</a></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col lg-6">
                                        <div class="select2-green">
                                            <select class="select2" name="curso-novo" multiple="multiple" data-placeholder="Selecione o curso" data-dropdown-css-class="select2-green" style="width: 100%;">
                                                <option value="Administração">Administração</option>
                                                <option value="Informática">Informática</option>
                                                <option value="Ensino médio">Ensino médio</option>
                                                <option value="Ensino fundamental">Ensino fundamental</option>
                                                <option value="Instituição">Instituição</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col lg-6">
                                        <label class="text-muted">Foto - <a class="text-success swalDefaultInfoInde" style="text-decoration-color: none; cursor: pointer;">
                                                Index</a></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col lg-6">
                                        <div class="input-group mb-3">
                                            <img src="../../../docs/_includes/Galeria/images/<?php echo $row_usuario['foto'] ?>" style="max-width: 100%; max-height: 100%;">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="form-group row">
                                        <div class="col-auto">
                                            <input type="submit" value="Atualizar" class="btn btn-success swalDefaultAtt">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ .Modal editar aviso-->

            <!--Modal excluir aviso-->
            <div class="modal fade" id="excluiFoto<?php echo $row_usuario['id_foto']; ?>">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content" style="border-radius: 16px;">
                        <div class=" card-outline card-success" style="border-radius: 16px;">
                            <div class="card-header text-center" id="exempleModal">
                                <p class="h4">Você realmente<br>deseja excluir?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                <?php echo '<a href="../../../exclui_foto2.php?id=' . $row_usuario['id_foto'] . '" class="btn btn-sm btn-success swalDefaultDelete">Sim</a>'; ?>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!--/ .Modal excluir aviso-->

        <?php
                } ?>

        </table>

        <script src="../../../Editor/plugins/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../../Editor/plugins/bootstrap.bundle.min.js"></script>
        <!-- Summernote -->
        <script src="../../../Editor/plugins/summernote-bs4.min.js"></script>
        <!-- SweetAlert2 -->
        <script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="../../../plugins/toastr/toastr.min.js"></script>
        <!-- Select2 -->
        <script src="../../../plugins/select2/js/select2.full.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../../dist/js/adminlte.min.js"></script>
        <!-- Ion Icons -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <!-- Page specific script -->


        <!-- Mensagens-->
        <script>
            //sucesso
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 30000
                });

                $('.swalDefaultSuccess').click(function() {
                    Toast.fire({
                        icon: 'success',
                        title: 'Cadastrado com sucesso!'
                    })
                });
            });

            //info
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 10000
                });

                $('.swalDefaultInfo').click(function() {
                    Toast.fire({
                        icon: 'info',
                        title: 'Esta opção habilita o usuário a operar no sistema de acordo com seu nível de permissão'
                    })
                });
                $('.swalDefaultInfoIntra').click(function() {
                    Toast.fire({
                        icon: 'info',
                        title: 'Será visível apenas no sistema Intranet'
                    })
                });
                $('.swalDefaultInfoInde').click(function() {
                    Toast.fire({
                        icon: 'info',
                        title: 'Será visível na página inicial'
                    })
                });
                $('.swalDefaultInfoEng').click(function() {
                    Toast.fire({
                        icon: 'info',
                        title: 'Aqui você pode editar os dados que serão exibidos'
                    })
                });
            });
        </script>

        <!-- Opção de setores -->
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
            });
        </script>

    <?php
        //Paginação - Somar a quantidade de usuários
        $result_pg = "SELECT COUNT(id_foto) AS num_result FROM galeria";
        $resultado_pg = mysqli_query($conecta, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);

        //Quantidade de pagina
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        //Limitar os link antes depois
        $max_links = 2;

        echo "<a href='#galeria' onclick='listar_usuario(1, $qnt_result_pg)'>Primeira</a> ";

        for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
            if ($pag_ant >= 1) {
                echo " <a href='#galeria' onclick='listar_usuario($pag_ant, $qnt_result_pg)'>$pag_ant </a> ";
            }
        }

        echo " $pagina ";

        for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
            if ($pag_dep <= $quantidade_pg) {
                echo " <a href='#galeria' onclick='listar_usuario($pag_dep, $qnt_result_pg)'>$pag_dep</a> ";
            }
        }

        echo " <a href='#galeria' onclick='listar_usuario($quantidade_pg, $qnt_result_pg)'>Última</a>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Nenhuma foto encontrada!</div>";
    }
    ?>
</body>

</html>