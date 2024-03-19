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
                <h3 class="card-title">Lista de usuarios</h3>

                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#LisUse" aria-expanded="false" aria-controls="LisUse">
                        <i class="fas fa-cog"></i>
                    </button>
                </div>
            </div>
            <div class="collapse" id="LisUse">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="card-body p-0">
                                <table class="table table-striped projects">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Nome</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <?php
                                    session_start();

                                    $puxa_id = $_SESSION['id_usuario'];

                                    $sql = "SELECT * FROM usuario WHERE id_usuario!='$puxa_id'";
                                    $consulta = mysqli_query($conecta, $sql);

                                    while ($registro = mysqli_fetch_assoc($consulta)) {

                                    ?>

                                        <tbody>

                                            <tr>
                                                <td><?php echo $registro["id_usuario"] ?></td>
                                                <td><?php echo $registro["nome"]; ?></td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <?php echo '<a class="btn btn-info" href="#" data-toggle="modal" data-target="#editaUse' . $registro['id_usuario'] . '"><i class="fas fa-eye"></i></a>'; ?>
                                                        <?php echo '<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#excluiUse' . $registro['id_usuario'] . '"><i class="fas fa-trash"></i></a>'; ?>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>

                                        <!--Modal editar usuário-->
                                        <div class="modal fade bd-example-modal-lg" id="editaUse<?php echo $registro['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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

                                                    <div class="modal-body" style="padding: 2.2rem 8rem 2.2rem 8rem;">
                                                        <form method="POST" name="EditaAviso" action="../../atualiza_usuario.php" enctype="multipart/form-data">
                                                            <div class="col-12 col-md-12 order-2 order-md-1">
                                                                <div class="row">
                                                                    <div class="col lg-6">
                                                                        <label class="text-muted">Nome do usuário -<a class="text-success swalDefaultInfoIntra" style="text-decoration-color: none; cursor: pointer;">
                                                                                Intranet</a></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-group mb-3">
                                                                        <input type="hidden" name="id" value="<?php echo $registro["id_usuario"]; ?>">
                                                                        <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $registro["nome"]; ?>">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <span class="fas fa-user"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col lg-6">
                                                                        <label class="text-muted">Email -<a class="text-success swalDefaultInfoIntra" style="text-decoration-color: none; cursor: pointer;">
                                                                                Intranet</a></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-group mb-3">
                                                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $registro["email"]; ?>" required>
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <span class="fas fa-envelope"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col lg-6">
                                                                        <label class="text-muted">Login -<a class="text-success swalDefaultInfoIntra" style="text-decoration-color: none; cursor: pointer;">
                                                                                Intranet</a></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control" name="login" placeholder="Login" value="<?php echo $registro["login"]; ?>">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <span class="fas fa-sign-in-alt"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col lg-6">
                                                                        <label class="text-muted">Senha -<a class="text-success swalDefaultInfoIntra" style="text-decoration-color: none; cursor: pointer;">
                                                                                Intranet</a></label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-group mb-3">
                                                                        <input type="password" class="form-control" name="senha" placeholder="Nova Senha">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <span class="fas fa-lock-open"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="imput-group mb-3">
                                                                    <div class="select2-green">
                                                                        <label class="text-muted">Setor -
                                                                            <?php
                                                                            if ($registro["setor"] == "admin") {
                                                                                echo '<a
                                                                            class="text-success swalDefaultInfoInde"
                                                                            style="text-decoration-color: none; cursor: pointer;">Administrador</a>';
                                                                            }

                                                                            if ($registro["setor"] == "dire") {
                                                                                echo '<a class="text-success swalDefaultInfoInde"
                                                                            style="text-decoration-color: none; cursor: pointer;">Diretoria</a>';
                                                                            }

                                                                            if ($registro["setor"] == "pdg") {
                                                                                echo '<a class="text-success swalDefaultInfoInde"
                                                                            style="text-decoration-color: none; cursor: pointer;">Pedagogia</a>';
                                                                            }

                                                                            if ($registro["setor"] == "sec") {
                                                                                echo '<a class="text-success swalDefaultInfoInde"
                                                                            style="text-decoration-color: none; cursor: pointer;">Secretaria</a>';
                                                                            }

                                                                            if ($registro["setor"] == "prof") {
                                                                                echo '<a class="text-success swalDefaultInfoInde"
                                                                            style="text-decoration-color: none; cursor: pointer;">Professor</a>';
                                                                            }

                                                                            if ($registro["setor"] == "cdc") {
                                                                                echo '<a
                                                                            class="text-success swalDefaultInfoInde"
                                                                            style="text-decoration-color: none; cursor: pointer;">Funcionario</a>';
                                                                            }
                                                                            ?>
                                                                        </label>
                                                                        <select class="select2" name="setor" data-placeholder="Novo setor" data-dropdown-css-class="select2-green" multiple="multiple" style="width: 100%;">
                                                                            <option value="admin">Administrador</option>
                                                                            <option value="dire">Diretoria</option>
                                                                            <option value="pdg">Pedagogia</option>
                                                                            <option value="sec">Secretaria</option>
                                                                            <option value="prof">Professor</option>
                                                                            <option value="cdc">Agente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12" style="text-align: right;">
                                                                        <button type="submit" value="ENVIAR" class="btn btn-success swalDefaultAtt" onclick="return validar()">ATUALIZAR</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <!--/ .Modal editar aviso-->

                            <!--Modal excluir aviso-->
                            <div class="modal fade" id="excluiUse<?php echo $registro['id_usuario']; ?>">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content" style="border-radius: 16px;">
                                        <div class=" card-outline card-success" style="border-radius: 16px;">
                                            <div class="card-header text-center" id="exempleModal">
                                                <p class="h4">Você realmente<br>deseja excluir?</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                                <?php echo '<a href="../../exclui_usuario.php?id=' . $registro['id_usuario'] . '" class="btn btn-sm btn-success swalDefaultDelete">Sim</a>'; ?>
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
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-success"><i class="fas fa-quote-left"></i> Edição de Usuários</h3>
                        <p class="text-muted">Nesta aba você poderá editar ou excluir usuários cadastrados.
                        </p>
                    </div>
                </div>
            </div>
        </div> <!-- /.card-body -->
        </div>
    </section><!-- / .Lista de avisos -->
</body>

</html>