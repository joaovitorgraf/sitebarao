<?php
    include('valida_session.php');
?>
<!DOCTYPE html>
<html>

<body>
    <?php
    $sql = "SELECT * FROM xerox";
    $consulta = mysqli_query($conecta, $sql);

    $cnt = mysqli_num_rows($consulta);
    ?>

    <!-- Central de Copias -->
    <section class="content" id="CentralDeCopias">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Central de copias</h3>

                <div class="card-tools">
                    <?php
                    if ($cnt != 0) {
                        echo '<span class="badge badge-warning right">' . $cnt . '</span>&nbsp;';
                    }
                    ?>

                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#CtC" aria-expanded="false" aria-controls="CtC">
                        <i class="fas fa-cog"></i>
                    </button>

                </div>
            </div>
            <div class="collapse" id="CtC">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="card-body p-0">
                                <?php
                                $sql = "SELECT * FROM xerox";
                                $consulta = mysqli_query($conecta, $sql);

                                $registro = mysqli_fetch_assoc($consulta);

                                if ($registro != "") {
                                ?>
                                    <table class="table table-striped projects">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Data</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <?php

                                        $sql = "SELECT * FROM xerox ORDER by data_hora DESC";
                                        $consulta = mysqli_query($conecta, $sql);

                                        while ($registro = mysqli_fetch_assoc($consulta)) {

                                        ?>

                                            <tbody>

                                                <tr>
                                                    <td><?php echo $registro["nome"] ?></td>
                                                    <td><?php $date = $registro["data_hora"];
                                                        echo date('d/m/Y', strtotime($date)); ?>
                                                    </td>
                                                    <td class="text-right py-0 align-middle">
                                                        <div class="btn-group btn-group-sm">
                                                            <?php echo '<a class="btn btn-info" href="#" data-toggle="modal" data-target="#CentralDeCopias' . $registro['id'] . '"><i class="fas fa-eye"></i></a>'; ?>
                                                            <?php echo '<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#excluiCentralDeCopias' . $registro['id'] . '"><i class="fas fa-trash"></i></a>'; ?>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>

                                            <!--Modal editar central de cópias-->
                                            <div class="modal fade bd-example-modal-lg" id="CentralDeCopias<?php echo $registro['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="text-muted "><b>Nome - </b><a class="text-success"><?php echo $registro['nome']; ?></a></label><br>

                                                                    <label class="text-muted"><b>Data / hora - </b><a class="text-success"><?php $date = $registro["data_hora"];
                                                                                                                                            echo date('d/m/Y H:i ', strtotime($date)); ?></a></label><br>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="info-box">
                                                                        <span class="info-box-icon bg-success"><i class="far fa-copy"></i></span>

                                                                        <div class="info-box-content">
                                                                            <span class="info-box-text">
                                                                                <?php

                                                                                $txt = $registro['documento'];

                                                                                $cont = strlen($txt);

                                                                                if ($cont > 38) {
                                                                                    $result = substr($txt, 15, 11);

                                                                                    $tras = substr($txt, -7);

                                                                                    echo $result . "..." . $tras;
                                                                                } else {
                                                                                    $resu = substr($txt, 15);

                                                                                    echo $resu;
                                                                                }

                                                                                ?></span>


                                                                            <?php

                                                                            $arquivo = $registro['documento'];

                                                                            echo '<a href="../../docs/_includes/xerox/baixar.php?defineDoc=docs/' . $arquivo . '"><span class="info-box-number">DOWNLOAD <i class="fas fa-download"></i></a></span></a> ';
                                                                            ?>

                                                                        </div>
                                                                        <!-- /.info-box-content -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ .Modal editar aviso-->

                                            <!--Modal excluir aviso-->
                                            <div class="modal fade" id="excluiCentralDeCopias<?php echo $registro['id']; ?>">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content" style="border-radius: 16px;">
                                                        <div class=" card-outline card-success" style="border-radius: 16px;">
                                                            <div class="card-header text-center" id="exempleModal">
                                                                <p class="h4">Você realmente<br>deseja excluir?</p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                                                <?php echo '<a href="../../docs/_includes/xerox/docs/exclui_CentralDeCopias.php?id=' . $registro['id'] . '" class="btn btn-sm btn-success swalDefaultDelete">Sim</a>'; ?>
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
                                                    <h5>nenhum arquivo</h5>
                                    
                                                    <p>Aproveite para tomar um café! <i class="fas fa-mug-hot"></i></p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-inbox"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                }

                                ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h3 class="text-success"><i class="fas fa-quote-left"></i> Central de Copias</h3>
                            <p class="text-muted">Nesta aba você poderá baixar ou excluir<br>arquivos enviados para a central de cópias
                            </p>
                        </div>
                    </div>
                </div>
            </div> <!-- /.card-body -->
        </div>
    </section><!-- / .Central de copias -->
</body>

</html>