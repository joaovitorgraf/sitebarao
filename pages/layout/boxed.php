<?php
include('valida_session.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intranet | Painel Administrador</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../Editor/plugins/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../Editor/plugins/summernote-bs4.min.css">

    <!-- Valida notícia -->
    <script language="javascript" type="text/javascript">
        function validar() {

            var titulo = form1.titulo.value;
            var sub_titulo = form1.sub_titulo.value;
            var noticia = form1.noticia.value;

            var nome = form2.nome.value;
            var email = form2.email.value;
            var login = form2.login.value;
            var senha = form2.senha.value;
            var confirmarsenha = form2.confirmarsenha.value;
            var ativo = form2.ativo.value;
            var setor = form2.setor.value;


            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });


            if (titulo == "") {
                Toast.fire({
                    icon: 'warning',
                    title: 'Informe o titulo da notícia!'
                });
                form1.titulo.focus();
                return false;
            }

            if (sub_titulo == "") {
                Toast.fire({
                    icon: 'warning',
                    title: 'Informe o sub titulo da notícia!'
                });
                form1.sub_titulo.focus();
                return false;
            }

            if (noticia == "") {
                Toast.fire({
                    icon: 'warning',
                    title: 'Informe a notícia!'
                });
                form1.noticia.focus();
                return false;
            }


            if (form2.nome.value.length < 5) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Informe o nome do usuário!'
                });
                form2.nome.focus();
                return false;
            }

            if (email == "") {
                Toast.fire({
                    icon: 'warning',
                    title: 'Informe o email do usuário!'
                });
                form2.email.focus();
                return false;
            }

            if (login == "") {
                Toast.fire({
                    icon: 'warning',
                    title: 'Informe o login do usuário!'
                });
                form2.login.focus();
                return false;
            }

            if (senha == "") {
                Toast.fire({
                    icon: 'warning',
                    title: 'Informe a senha do usuário!'
                });
                form2.senha.focus();
                return false;
            }

            if (confirmarsenha == "") {
                Toast.fire({
                    icon: 'warning',
                    title: 'Confirme a senha!'
                });
                form2.confirmarsenha.focus();
                return false;
            }

            if (senha != confirmarsenha) {
                Toast.fire({
                    icon: 'error',
                    title: 'As senhas não conferem!'
                });
                form2.senha.focus();
                return false
            }

            if (setor == "") {
                Toast.fire({
                    icon: 'warning',
                    title: 'Selecione o setor!'
                });
                form2.setor.focus();
                return false;
            }
        }
    </script>
</head>

<!-- Validação do usuário (permissões) -->
<?php
//conecta com o banco
require("../../conecta.php");
$conexao = mysqli_select_db($conecta, "sitebarao");

$puxa_id = $_SESSION['id_usuario'];

$login = $_SESSION['login'];

$query   = "SELECT * FROM usuario WHERE login='$login'";
$sql    = mysqli_query($conecta, $query);
$exibe = mysqli_fetch_array($sql);

$setor = $exibe['setor'];

?>

<body class="hold-transition sidebar-mini layout-boxed sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#modal-sm" role="button">
                        <i class="fas fa-door-open"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-dark-primary">
            <!-- Brand Logo -->
            <a href="https://colegiobarao.info/info/tii2018/graf/TCC%20-%20Bonin%20Graf/Site%20Bar%c3%a3o/" class="brand-link" target="_blank">
                <img src="../../dist/img/Logo_Bola_PNG.png" style="width: 40px; height: 40px;" alt="Logo Barão" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">BA |<b> Intranet</b></span>
            </a>

            <?php

            $query   = "SELECT * FROM usuario WHERE id_usuario='$puxa_id'";
            $consulta = mysqli_query($conecta, $query);

            while ($registro = mysqli_fetch_assoc($consulta)) {

            ?>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="img/<?php echo $registro['foto_usuario']; ?>" class="img-circle elevation-2" alt="User Image" style="width: 34px; height: 34px;">
                        </div>

                        <div class="info">
                            <a href="#" data-toggle="modal" data-target="#editainfo<?php echo $registro['id_usuario']; ?>" class="d-block"><?php echo $registro['nome']; ?></a>
                        </div>

                    </div>

                <?php
            }
                ?>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <?php
                        if ($setor == "admin") {
                            echo '<li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#CadUse" role="button" aria-expanded="false" aria-controls="CadUse">
                                        <i class="fas fa-user-plus"></i>
                                        <p>
                                            Cadastro de usuário
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#LisUse" role="button" aria-expanded="false" aria-controls="ListUse">
                                        <i class="fas fa-list-ul"></i>
                                        <p>
                                            Lista de usuários
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#CadAviso" role="button" aria-expanded="false" aria-controls="CadAviso">
                                        <i class="fas fa-newspaper"></i>
                                        <p>
                                            Cadastro de aviso
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#listaAviso" role="button" aria-expanded="false" aria-controls="listaAviso">
                                        <i class="fas fa-list-ul"></i>
                                        <p>
                                            Lista de avisos
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#CadFoto" role="button" aria-expanded="false" aria-controls="CadFoto">
                                        <i class="fas fa-images"></i>
                                        <p>
                                            Cadastro de fotos
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#foto" role="button" aria-expanded="false" aria-controls="foto">
                                        <i class="fas fa-list-ul"></i>
                                        <p>
                                            Lista de fotos
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#listaSac" role="button" aria-expanded="false" aria-controls="listaSac">
                                        <i class="fas fa-clipboard-list"></i>
                                        <p>
                                            Lista de Sac
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#CtC" role="button" aria-expanded="false" aria-controls="Ctc">
                                        <i class="fas fa-file-download"></i>
                                        <p>
                                            Central de cópias
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#CadHorario" role="button" aria-expanded="false" aria-controls="CadHorario">
                                    <i class="fas fa-history"></i>
                                        <p>
                                            Cadastro de horário
                                        </p>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#ListHorario" role="button" aria-expanded="false" aria-controls="ListHorario">
                                        <i class="fas fa-list-ul"></i>
                                        <p>
                                            Lista de horário
                                        </p>
                                    </a>
                                </li>';
                        }

                        if ($setor == "dire") {
                            echo '<li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#CadAviso" role="button" aria-expanded="false" aria-controls="CadAviso">
                                        <i class="fas fa-newspaper"></i>
                                        <p>
                                            Cadastro de aviso
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#listaAviso" role="button" aria-expanded="false" aria-controls="listaAviso">
                                        <i class="fas fa-list-ul"></i>
                                        <p>
                                            Lista de avisos
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#CadFoto" role="button" aria-expanded="false" aria-controls="CadFoto">
                                        <i class="fas fa-images"></i>
                                        <p>
                                            Cadastro de fotos
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#foto" role="button" aria-expanded="false" aria-controls="foto">
                                        <i class="fas fa-list-ul"></i>
                                        <p>
                                            Lista de fotos
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#listaSac" role="button" aria-expanded="false" aria-controls="listaSac">
                                        <i class="fas fa-clipboard-list"></i>
                                        <p>
                                            Lista de Sac
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#CtC" role="button" aria-expanded="false" aria-controls="Ctc">
                                        <i class="fas fa-file-download"></i>
                                        <p>
                                            Central de cópias
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#CadHorario" role="button" aria-expanded="false" aria-controls="CadHorario">
                                    <i class="fas fa-history"></i>
                                        <p>
                                            Cadastro de horário
                                        </p>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#ListHorario" role="button" aria-expanded="false" aria-controls="ListHorario">
                                        <i class="fas fa-list-ul"></i>
                                        <p>
                                            Lista de horário
                                        </p>
                                    </a>
                                </li>';
                        }

                        if ($setor == "pdg") {
                            echo '<li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#CadAviso" role="button" aria-expanded="false" aria-controls="CadAviso">
                                        <i class="fas fa-newspaper"></i>
                                        <p>
                                            Cadastro de aviso
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#listaAviso" role="button" aria-expanded="false" aria-controls="listaAviso">
                                        <i class="fas fa-list-ul"></i>
                                        <p>
                                            Lista de avisos
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#CadHorario" role="button" aria-expanded="false" aria-controls="CadHorario">
                                    <i class="fas fa-history"></i>
                                        <p>
                                            Cadastro de horário
                                        </p>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#ListHorario" role="button" aria-expanded="false" aria-controls="ListHorario">
                                        <i class="fas fa-list-ul"></i>
                                        <p>
                                            Lista de horário
                                        </p>
                                    </a>
                                </li>';
                        }

                        if ($setor == "sec") {
                            echo '<li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#listaSac" role="button" aria-expanded="false" aria-controls="listaSac">
                                <i class="fas fa-clipboard-list"></i>
                                <p>
                                    Lista de Sac
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#CtC" role="button" aria-expanded="false" aria-controls="Ctc">
                                        <i class="fas fa-file-download"></i>
                                        <p>
                                            Central de cópias
                                        </p>
                                    </a>
                                </li>';
                        }

                        if ($setor == "prof") {
                            echo '<li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#CadFoto" role="button" aria-expanded="false" aria-controls="CadFoto">
                                    <i class="fas fa-images"></i>
                                    <p>
                                        Cadastro de fotos
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#foto" role="button" aria-expanded="false" aria-controls="foto">
                                    <i class="fas fa-list-ul"></i>
                                    <p>
                                        Lista de fotos
                                    </p>
                                </a>
                            </li>';
                        }

                        if ($setor == "cdc") {
                            echo '<li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#CtC" role="button" aria-expanded="false" aria-controls="Ctc">
                                    <i class="fas fa-file-download"></i>
                                    <p>
                                        Central de cópias
                                    </p>
                                </a>
                            </li>';
                        }
                        ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Central de ações</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <?php
            if ($setor == "admin") {

                require('includs_boxed/cad_use.php');
                require('includs_boxed/list_use.php');
                require('includs_boxed/cad_aviso.php');
                require('includs_boxed/list_aviso.php');
                require('includs_boxed/cad_foto.php');
                require('includs_boxed/list_galeria.php');
                require('includs_boxed/list_sac.php');
                require('includs_boxed/cent_cop.php');
                require('includs_boxed/cad_horario.php');
                require('includs_boxed/list_horario.php');
            }
            if ($setor == "dire") {

                require('includs_boxed/cad_aviso.php');
                require('includs_boxed/list_aviso.php');
                require('includs_boxed/cad_foto.php');
                require('includs_boxed/list_galeria.php');
                require('includs_boxed/list_sac.php');
                require('includs_boxed/cent_cop.php');
                require('includs_boxed/cad_horario.php');
                require('includs_boxed/list_horario.php');
            }

            if ($setor == "pdg") {

                require('includs_boxed/cad_aviso.php');
                require('includs_boxed/list_aviso.php');
                require('includs_boxed/cad_horario.php');
                require('includs_boxed/list_horario.php');
            }

            if ($setor == "sec") {

                require('includs_boxed/list_sac.php');
                require('includs_boxed/cent_cop.php');
            }

            if ($setor == "prof") {

                require('includs_boxed/cad_foto.php');
                require('includs_boxed/list_galeria.php');
            }

            if ($setor == "cdc") {

                require('includs_boxed/cent_cop.php');
            }
            ?>

        </div><!-- /.card -->

        <footer class="main-footer">
            <strong>Colégio Estadual Barão de Antonina</strong>
        </footer>
    </div>

    <!-- Modal edita info -->
    <?php

    $sql = "SELECT * FROM usuario";
    $consulta = mysqli_query($conecta, $sql);

    while ($registro = mysqli_fetch_assoc($consulta)) {

    ?>
        <div class="modal fade" id="editainfo<?php echo $registro['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="janelamodallabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exempleModal">
                            <?php echo 'Atualiza - ' . $registro['nome']; ?>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" name="editainfo" action="../../atualiza_info.php" enctype="multipart/form-data">

                            <div class="input-group justify-content-center" data-toggle="modal" data-target="#modal-foto<?php echo $registro['id_usuario']; ?>">
                                <div class="text-center">
                                    <img src="img/<?php echo $registro['foto_usuario']; ?>" class="profile-user-img img-fluid img-circle" alt="User Image" style="width: 88px; height: 88px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col lg-6 text-center">
                                    <label class="text-muted"><a class="text-success swalDefaultInfoIntra" style="text-decoration-color: none; cursor: pointer;">
                                            Intranet</a> /<a class="text-success swalDefaultInfoInde" style="text-decoration-color: none; cursor: pointer;">
                                            Index</a></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col lg-6">
                                    <label class="text-muted">Nome -<a class="text-success swalDefaultInfoIntra" style="text-decoration-color: none; cursor: pointer;">
                                            Intranet</a> /<a class="text-success swalDefaultInfoInde" style="text-decoration-color: none; cursor: pointer;">
                                            Index</a></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group mb-3">
                                    <input type="hidden" name="id_usuario" value="<?php echo $registro['id_usuario'] ?>">
                                    <input type="text" class="form-control" name="nome" value="<?php echo $registro['nome'] ?>">
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
                                    <input type="text" class="form-control" name="email" value="<?php echo $registro['email'] ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer text-right">
                                <input type="submit" value="Atualizar" class="btn btn-success">
                            </div>

                        </form>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- MODAL FOTO -->
        <div class="modal fade" id="modal-foto<?php echo $registro['id_usuario']; ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" style="border-radius: 16px;">
                    <form name="upload" action="grava_foto.php" method="post" enctype="multipart/form-data">
                        <div class=" card-outline card-success" style="border-radius: 16px;">
                            <div class="card-header text-center" id="exempleModal">
                                <p class="h1">TROCAR<br>FOTO</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <input type="hidden" name="id_usuario" value="<?php echo $registro['id_usuario']; ?>">
                                <input type="file" name="arquivo" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Enviar" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- / MODAL FOTO -->

    <?php
    }
    ?>
    <!-- /.modal -->

    <!-- Modal sair -->
    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="border-radius: 16px;">
                <div class=" card-outline card-success" style="border-radius: 16px;">
                    <div class="card-header text-center" id="exempleModal">
                        <p class="h4">Você realmente<br>deseja sair?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <a href="sair.php" class="btn btn-sm btn-success">Sair</a>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="../../Editor/plugins/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../Editor/plugins/bootstrap.bundle.min.js"></script>
    <!-- Summernote -->
    <script src="../../Editor/plugins/summernote-bs4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../../plugins/toastr/toastr.min.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- Ion Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })

        $(function() {
            // Summernote
            $('#summernote2').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

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

        //atualiza
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 30000
            });

            $('.swalDefaultAtt').click(function() {
                Toast.fire({
                    icon: 'success',
                    title: 'Atualizado com sucesso!'
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

        //exclui
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 30000
            });

            $('.swalDefaultDelete').click(function() {
                Toast.fire({
                    icon: 'warning',
                    title: 'Excluído com sucesso!'
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
</body>

</html>