<?php
include('valida_session.php');
?>
<!DOCTYPE html>
<html>

<body>
    <!-- Lista de avisos -->
    <section class="content" id="#avisos">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de avisos</h3>

                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#listaAviso" aria-expanded="false" aria-controls="listaAviso">
                        <i class="fas fa-cog"></i>
                    </button>
                </div>
            </div>
            <div class="collapse" id="listaAviso">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="card-body p-0">

                                <?php
                                    $sql = "SELECT * FROM noticia";
                                    $consulta = mysqli_query($conecta, $sql);
        
                                    $registros = mysqli_fetch_assoc($consulta);
        
                                    if ($registros != "") {
                                ?>
                                    <table class="table table-striped projects">
                                        <thead>
                                            <tr>
                                                <th scope="col">Aviso</th>
                                                <th scope="col">Data</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <?php

                                        $sql = "SELECT * FROM noticia ORDER by data_hora DESC LIMIT 10";
                                        $consulta = mysqli_query($conecta, $sql);

                                        while ($registro = mysqli_fetch_assoc($consulta)) {

                                        ?>

                                            <tbody>

                                                <tr>
                                                    <td><?php echo $registro["sub_titulo"] ?></td>
                                                    <td><?php $date = $registro["data_hora"];
                                                        echo date('d/m/Y', strtotime($date)); ?>
                                                    </td>
                                                    <td class="text-right py-0 align-middle">
                                                        <div class="btn-group btn-group-sm">
                                                            <?php echo '<a class="btn btn-info" href="#" data-toggle="modal" data-target="#editaAviso' . $registro['id_noticia'] . '"><i class="fas fa-eye"></i></a>'; ?>
                                                            <?php echo '<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#excluiAviso' . $registro['id_noticia'] . '"><i class="fas fa-trash"></i></a>'; ?>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>

                                            <!--Modal editar aviso-->
                                            <div class="modal fade bd-example-modal-lg" id="editaAviso<?php echo $registro['id_noticia']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                                            <form method="POST" name="EditaAviso" action="../../atualiza_aviso.php" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col lg-6">
                                                                        <label class="text-muted">Nome do Aviso -<a class="text-success swalDefaultInfoIntra" style="text-decoration-color: none; cursor: pointer;">
                                                                                Intranet</a></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col lg-6">
                                                                        <div class="input-group mb-3">
                                                                            <input class="form-control" type="text" name="sub_titulo" value="<?php echo $registro['sub_titulo'] ?>">
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
                                                                        <label class="text-muted">Titulo - <a class="text-success swalDefaultInfoInde" style="text-decoration-color: none; cursor: pointer;">
                                                                                Index</a></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col lg-6">
                                                                        <div class="input-group mb-3">
                                                                            <input type="hidden" name="id_noticia" value="<?php echo $registro['id_noticia'] ?>">
                                                                            <input type="text" class="form-control" name="titulo" value="<?php echo $registro['titulo'] ?>">
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

                                                                <div class="form-group">
                                                                    <label class="text-muted">Aviso - <a class="text-success swalDefaultInfoInde" style="text-decoration-color: none; cursor: pointer;">
                                                                            Index</a></label>

                                                                    <?php
                                                                    echo "<textarea id='summernote2' name='noticia'>" . $registro['noticia'] . "</textarea>";
                                                                    ?>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <div class="form-group row">
                                                                        <div class="col-auto">
                                                                            <input type="submit" value="Atualizar" class="btn btn-success swalDefaultAtt">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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
                                            <div class="modal fade" id="excluiAviso<?php echo $registro['id_noticia']; ?>">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content" style="border-radius: 16px;">
                                                        <div class=" card-outline card-success" style="border-radius: 16px;">
                                                            <div class="card-header text-center" id="exempleModal">
                                                                <p class="h4">Você realmente<br>deseja excluir?</p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                                                <?php echo '<a href="../../exclui_aviso.php?id=' . $registro['id_noticia'] . '" class="btn btn-sm btn-success swalDefaultDelete">Sim</a>'; ?>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                            <!--/ .Modal excluir aviso-->

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
                                                    <h5>nenhum aviso</h5>
                                    
                                                    <p>Cadastre para começar! <i class="fas fa-archive"></i></p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-ad"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                }

                                ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h3 class="text-success"><i class="fas fa-quote-left"></i> Edição de avisos</h3>
                            <p class="text-muted">Nesta aba você poderá editar ou excluir avisos que serão enviados
                                diretamente para a
                                página inicial.<br>Caso queira adicionar ou editar os horários clique no botão
                                abaixo.
                            </p>
                            <div class="text-right mb-5">
                                <a href="includs_boxed/lista_completa_aviso.php" class="btn btn-sm btn-success">Arquivados</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.card-body -->
        </div>
    </section><!-- / .Lista de avisos -->
</body>

</html>