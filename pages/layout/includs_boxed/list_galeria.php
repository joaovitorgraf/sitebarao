<?php
include('valida_session.php');
?>
<!DOCTYPE html>
<html>

<body>
    <!-- Lista de avisos -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Fotos</h3>

                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#foto" aria-expanded="false" aria-controls="foto">
                        <i class="fas fa-cog"></i>
                    </button>
                </div>
            </div>
            <div class="collapse" id="foto">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="card-body p-0">

                                <?php
                                    $sql = "SELECT * FROM galeria";
                                    $consulta = mysqli_query($conecta, $sql);
        
                                    $registros = mysqli_fetch_assoc($consulta);
        
                                    if ($registros != "") {
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

                                        <?php

                                        $sql = "SELECT * FROM galeria ORDER by data_hora DESC LIMIT 10";
                                        $consulta = mysqli_query($conecta, $sql);

                                        while ($registro = mysqli_fetch_assoc($consulta)) {

                                        ?>

                                            <tbody>

                                                <tr>
                                                    <td><?php echo $registro["nome"] ?></td>
                                                    <td><?php $date = $registro["data_hora"];
                                                        echo date('d/m/Y', strtotime($date)); ?>
                                                    </td>
                                                    <td><?php echo $registro["curso"] ?></td>
                                                    <td class="text-right py-0 align-middle">
                                                        <div class="btn-group btn-group-sm">
                                                            <?php echo '<a class="btn btn-info" href="#" data-toggle="modal" data-target="#editaFoto' . $registro['id_foto'] . '"><i class="fas fa-eye"></i></a>'; ?>
                                                            <?php echo '<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#excluiFoto' . $registro['id_foto'] . '"><i class="fas fa-trash"></i></a>'; ?>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>

                                            <!--Modal editar foto-->
                                            <div class="modal fade bd-example-modal-lg" id="editaFoto<?php echo $registro['id_foto']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                                            <form method="POST" name="EditaFoto" action="../../atualiza_Foto.php" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col lg-6">
                                                                        <label class="text-muted">Nome da Foto -<a class="text-success swalDefaultInfoIntra" style="text-decoration-color: none; cursor: pointer;">
                                                                                Intranet</a></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col lg-6">
                                                                        <div class="input-group mb-3">
                                                                            <input class="form-control" type="text" name="nome" value="<?php echo $registro['nome'] ?>">
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
                                                                            <input type="hidden" name="id_foto" value="<?php echo $registro['id_foto'] ?>">
                                                                            <textarea type="text" class="form-control" name="descricao"><?php echo $registro['descricao'] ?></textarea>
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
                                                                        <label class="text-muted">Pasta: <?php echo $registro['curso'] ?> -<a class="text-success swalDefaultInfoIntra" style="text-decoration-color: none; cursor: pointer;">
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
                                                                            <img src="../../docs/_includes/Galeria/images/<?php echo $registro['foto'] ?>" style="max-width: 100%; max-height: 100%;">
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
                                            <div class="modal fade" id="excluiFoto<?php echo $registro['id_foto']; ?>">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content" style="border-radius: 16px;">
                                                        <div class=" card-outline card-success" style="border-radius: 16px;">
                                                            <div class="card-header text-center" id="exempleModal">
                                                                <p class="h4">Você realmente<br>deseja excluir?</p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                                                <?php echo '<a href="../../exclui_foto.php?id=' . $registro['id_foto'] . '" class="btn btn-sm btn-success swalDefaultDelete">Sim</a>'; ?>
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
                                                    <h5>nenhuma foto</h5>
                                    
                                                    <p>Faça upload para começar! <i class="fas fa-folder-plus"></i></p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-camera-retro"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                }

                                ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h3 class="text-success"><i class="fas fa-quote-left"></i> Edição de fotos</h3>
                            <p class="text-muted">Nesta aba você poderá visualizar<br>as fotos cadastradas no álbum de fotos.
                            </p>
                            <div class="text-right mb-5">
                                <a href="includs_boxed/lista_completa_galeria.php" class="btn btn-sm btn-success">Arquivados</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.card-body -->
        </div>
    </section><!-- / .Lista de avisos -->
</body>

</html>