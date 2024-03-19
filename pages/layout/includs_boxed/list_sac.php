<?php
    include('valida_session.php');
?>
<!DOCTYPE html>
<html>

<body>
    <?php
    $sql = "SELECT * FROM sac ORDER by data_hora DESC";
    $consulta = mysqli_query($conecta, $sql);

    $contnovo = "SELECT * FROM sac WHERE define_ico=''";
    $consnovo = mysqli_query($conecta, $contnovo);

    $cnt = mysqli_num_rows($consnovo);

    $contnovog = "SELECT * FROM sac WHERE define_ico='Aguardando resposta'";
    $consnovog = mysqli_query($conecta, $contnovog);

    $cntg = mysqli_num_rows($consnovog);
    ?>
    <!-- Lista SAC -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista SAC</h3>

                <div class="card-tools">
                    <?php
                    if ($cntg != 0) {
                        echo '&nbsp;<span class="badge badge-info right">' . $cntg . '</span>&nbsp;';
                    }
                    if ($cnt != 0) {
                        echo '&nbsp;<span class="badge badge-warning right">' . $cnt . '</span>&nbsp;';
                    }
                    ?>

                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#listaSac" aria-expanded="false" aria-controls="listaSac">
                        <i class="fas fa-cog"></i>
                    </button>

                    <!--<button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#listaSac" aria-expanded="false" aria-controls="listaSac">
                        <i class="fas fa-plus"></i>
                    </button>-->
                </div>
            </div>

            <div class="collapse" id="listaSac">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <?php
                            $sql = "SELECT * FROM sac";
                            $consulta = mysqli_query($conecta, $sql);

                            $registros = mysqli_fetch_assoc($consulta);

                            if ($registros != "") {
                            ?>
                                <table class="table table-striped projects">
                                    <thead>
                                        <tr>
                                            <th scope="col">Contato</th>
                                            <th scope="col">Data</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <?php

                                        $sqln = "SELECT * FROM sac ORDER by data_hora DESC";
                                        $consultas = mysqli_query($conecta, $sqln);

                                        while ($registro = mysqli_fetch_assoc($consultas)) {

                                    ?>

                                        <tbody>

                                            <tr>
                                                <td>
                                                    <a>
                                                        <?php echo $registro["nome"] ?>
                                                    </a>
                                                    <br />
                                                    <small>
                                                        <?php echo $registro["telefone"] ?>
                                                    </small>
                                                </td>

                                                <td><?php $date = $registro["data_hora"];
                                                    echo date('d/m/Y', strtotime($date)); ?>
                                                </td>
                                                <td class="project-state">
                                                    <?php
                                                    if ($registro['define_ico'] == '') {

                                                        echo '<span class="badge badge-warning">Novo</span>';
                                                    }
                                                    if ($registro['define_ico'] == 'Aguardando resposta') {

                                                        echo '<span class="badge badge-info">Aguardando Resposta</span>';
                                                    }
                                                    if ($registro['define_ico'] == 'Respondido') {
                                                        echo '<span class="badge badge-success">Respondido</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <?php echo '<a class="btn btn-info" href="#" data-toggle="modal" data-target="#AddComentario' . $registro['id_sac'] . '"><i class="fas fa-eye"></i></a>'; ?>
                                                        <?php echo '<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#excluiSAC' . $registro['id_sac'] . '"><i class="fas fa-trash"></i></a>'; ?>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>

                                        <!--MODAL PARA EDITAR SAC-->
                                        <div class="modal fade bd-example-modal-lg" id="AddComentario<?php echo $registro['id_sac']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="text-muted"><b>Nome - </b><a class="text-success" style="text-decoration-color: none; cursor: pointer;"><?php echo $registro['nome']; ?></a></label><br>
                                                                    <label class="text-muted"><b>Email - </b><a class="text-success" style="text-decoration-color: none; cursor: pointer;"><?php echo $registro['email']; ?></a></label><br>
                                                                    <label class="text-muted"><b>Telefone - </b><a class="text-success" style="text-decoration-color: none; cursor: pointer;"><?php echo $registro['telefone']; ?></a></label><br>
                                                                    <label class="text-muted"><b>Data / hora - </b><a class="text-success" style="text-decoration-color: none; cursor: pointer;"><?php $date = $registro["data_hora"];
                                                                                                                                                                                                                        echo date('d/m/Y H:i ', strtotime($date)); ?></a></label><br>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="text-muted text-center"><b>Mensagem </b><a class="text-success" style="text-decoration-color: none; cursor: pointer;"><br><?php echo $registro['mensagem']; ?></a></label>
                                                                </div>
                                                            </div>
                                                            <div class="row text-right">
                                                                <div class="col-md-12" style="padding: 1rem 0rem 0rem 0rem;">
                                                                    <form method="POST" name="EditaIco" action="../../EditaIco_sac.php" enctype="multipart/form-data">

                                                                        <input type="hidden" name="id_sac" value="<?php echo $registro['id_sac']; ?>">
                                                                        <input type="submit" name="Aguardando" value="Aguardando resposta" class="btn btn-sm btn-outline-primary">
                                                                        <input type="submit" name="Respondido" value="Respondido" class="btn btn-sm btn-success">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr style="border: 0;  height: 1px;  background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
                                                        <div class="row">
                                                            <form method="POST" name="EditaAviso" action="../../addComent_sac.php" enctype="multipart/form-data">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="text-muted">Adicionar comentário -<a class="text-success swalDefaultInfoIntra" style="text-decoration-color: none; cursor: pointer;">
                                                                                Intranet</a></label>
                                                                        <input type="hidden" name="id_sac" value="<?php echo $registro['id_sac']; ?>">
                                                                        <input type="text" class="form-control" name="comentario" placeholder="Comentario">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6" style="padding: 2rem;">
                                                                    <input type="submit" value="Adicionar" class="btn btn-success swalDefaultSuccess">
                                                                </div>
                                                            </form>
                                                            <div class="modal-footer">
                                                                <div class="form-group row">
                                                                    <div class="col-auto">
                                                                        <?php
                                                                        $pegaIdSac = $registro['id_sac'];;

                                                                        $comente_sac = "SELECT * FROM comentario WHERE id_sac='$pegaIdSac' ORDER by data_hora DESC";
                                                                        $consulta_coment = mysqli_query($conecta, $comente_sac);

                                                                        while ($registro_coment = mysqli_fetch_assoc($consulta_coment)) {

                                                                            echo "<p>" . $registro_coment['comentario'] . "</p>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!--MODAL DE EXCLUIR-->
                                        <div class="modal fade" id="excluiSAC<?php echo $registro['id_sac']; ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content" style="border-radius: 16px;">
                                                    <div class=" card-outline card-success" style="border-radius: 16px;">
                                                        <div class="card-header text-center" id="exempleModal">
                                                            <p class="h4">Você realmente<br>deseja excluir?</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                                            <?php echo '<a href="../../exclui_sac.php?id=' . $registro['id_sac'] . '" class="btn btn-sm btn-success swalDefaultDelete">Sim</a>'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!--/MODAL DE EXCLUIR-->

                                    <?php
                                    }
                                    ?>
                                </table>
                            <?php
                            } else {
                                echo '<!-- small card -->
                                    <div class="row" style="text-center">
                                        <div class="col-lg-6 col-6">
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h5>nenhum atendimento</h5>
                                    
                                                    <p>Aproveite para tomar um café! <i class="fas fa-mug-hot"></i></p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-info"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                            }

                            ?>
                        </div> <!-- /.card-body -->
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h3 class="text-success"><i class="fas fa-quote-left"></i> Atendimento ao público</h3>
                            <p class="text-muted">Nesta aba você poderá visualizar as perguntas direcionadas ao SAC
                                na Tela Inicial.
                            </p>
                        </div>
                    </div><!-- / .row -->
                </div>
            </div>
        </div><!-- /.card -->
    </section><!-- /.Lista SAC -->
</body>

</html>