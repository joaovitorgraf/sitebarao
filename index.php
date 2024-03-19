<?php
//if(!isset($_SESSION)){session_start();}
//include 'verifica_session.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tela Inicial | Colégio Barão</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Google Font: Quicksand -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <!-- Google Font: Pacifico -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- Main scss-->
    <link rel="stylesheet" href="dist/css/main.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Footer -->
    <link rel="stylesheet" href="dist/css/style.css">


    <!-- Valida dados -->
    <script>
        function formatar(mascara, documento) {
            var i = documento.value.length;
            var saida = mascara.substring(0, 1);
            var texto = mascara.substring(i)

            if (texto.substring(0, 1) != saida) {
                documento.value += texto.substring(0, 1);

            }
        }
    </script>

    <script language="javascript" type="text/javascript">
        function validar() {


            var nome = atend.nome.value;
            var telefone = atend.telefone.value;

            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });

            if (atend.nome.value.length < 5) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Informe seu nome!'
                });
                atend.nome.focus();
                return false;
            }

            if (telefone == "") {
                Toast.fire({
                    icon: 'warning',
                    title: 'Informe algum telefone para contato!'
                });
                atend.login.focus();
                return false;
            }
        }

        function validarx() {
            var nomex = upload.nomex.value;

            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });

            if (upload.nomex.value.length < 5) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Informe o nome do arquivo!'
                });
                atend.nome.focus();
                return false;
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        :root {
            --font1: 'Heebo', sans-serif;
            --font2: 'Fira Sans Extra Condensed', sans-serif;
            --font3: 'Roboto', sans-serif
        }

        html {
            scroll-behavior: smooth;
            transition-delay: 1s;
        }

        h2 {
            font-weight: 900
        }

        .container-fluid {
            max-width: 1200px
        }

        .card {
            background: #fff;
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
            border: 0;
            border-radius: 1rem
        }

        .card-img,
        .card-img-top {
            border-top-left-radius: calc(1rem - 1px);
            border-top-right-radius: calc(1rem - 1px)
        }

        .card h5 {
            overflow: hidden;
            height: 56px;
            font-weight: 900;
            font-size: 1rem
        }

        .card-img-top {
            width: 100%;
            max-height: 180px;
            object-fit: contain;
            padding: 30px
        }

        .card h2 {
            font-size: 1rem
        }

        /* faz com que o card "pule"
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06)
        }
        */

        .label-top {
            position: absolute;
            background-color: #8bc34a;
            color: #fff;
            top: 8px;
            right: 8px;
            padding: 5px 10px 5px 10px;
            font-size: .7rem;
            font-weight: 600;
            border-radius: 3px;
            text-transform: uppercase
        }

        .top-right {
            position: absolute;
            top: 24px;
            left: 24px;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            font-size: 1rem;
            font-weight: 900;
            background: #ff5722;
            line-height: 90px;
            text-align: center;
            color: white
        }

        .top-right span {
            display: inline-block;
            vertical-align: middle
        }

        @media (max-width: 768px) {
            .card-img-top {
                max-height: 250px
            }
        }

        .over-bg {
            background: rgba(53, 53, 53, 0.85);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(0.0px);
            -webkit-backdrop-filter: blur(0.0px);
            border-radius: 10px
        }

        .btn {
            font-size: 1rem;
            font-weight: 500;
            text-transform: uppercase;
            padding: 5px 50px 5px 50px
        }

        .box .btn {
            font-size: 1.5rem
        }

        @media (max-width: 1025px) {
            .btn {
                padding: 5px 40px 5px 40px
            }
        }

        @media (max-width: 250px) {
            .btn {
                padding: 5px 30px 5px 30px
            }
        }

        .btn-warning {
            background: none #f7810a;
            color: #ffffff;
            fill: #ffffff;
            border: none;
            text-decoration: none;
            outline: 0;
            box-shadow: -1px 6px 19px rgba(247, 129, 10, 0.25);
            border-radius: 100px
        }

        .btn-warning:hover {
            background: none #ff962b;
            color: #ffffff;
            box-shadow: -1px 6px 13px rgba(255, 150, 43, 0.35)
        }

        .bg-success {
            font-size: 1rem;
            background-color: #f7810a !important
        }

        .bg-danger {
            font-size: 1rem
        }

        .price-hp {
            font-size: 1rem;
            font-weight: 600;
            color: darkgray
        }

        .amz-hp {
            font-size: .7rem;
            font-weight: 600;
            color: darkgray
        }

        .fa-question-circle:before {
            color: darkgray
        }

        .fa-plus:before {
            color: darkgray
        }

        .box {
            border-radius: 1rem;
            background: #fff;
            box-shadow: 0 6px 10px rgb(0 0 0 / 8%), 0 0 6px rgb(0 0 0 / 5%);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12)
        }

        .box-img {
            max-width: 300px
        }

        .thumb-sec {
            max-width: 300px
        }

        @media (max-width: 576px) {
            .box-img {
                max-width: 200px
            }

            .thumb-sec {
                max-width: 200px
            }
        }

        .inner-gallery {
            width: 60px;
            height: 60px;
            border: 1px solid #ddd;
            border-radius: 3px;
            margin: 1px;
            display: inline-block;
            overflow: hidden;
            -o-object-fit: cover;
            object-fit: cover
        }

        @media (max-width: 370px) {
            .box .btn {
                padding: 5px 40px 5px 40px;
                font-size: 1rem
            }
        }

        .disclaimer {
            font-size: .9rem;
            color: darkgray
        }

        .related h3 {
            font-weight: 900
        }


        /* FIRST CARDS */

        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900|Open Sans:400,600,800');

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        div,
        input,
        p,
        a {
            font-family: 'Montserrat';
            font-style: bold;
            font-weight: 400;
            margin: 0px;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
        }

        body {
            background-color: #F1F2F3;
        }

        .container-fluid,
        .container {
            max-width: 1200px;
        }

        .card-container {
            padding: 100px 0px;
            -webkit-perspective: 1000;
            perspective: 1000;
        }

        .profile-card-2 {
            max-width: 300px;
            background-color: #FFF;
            box-shadow: 14px 13px 3px 0px rgb(0 0 0 / 11%);
            background-position: center;
            overflow: hidden;
            position: relative;
            margin: 10px auto;
            cursor: pointer;
            border-radius: 10px;
        }

        .profile-card-2 img {
            transition: all linear 0.25s;
        }

        .profile-card-2 .profile-name {
            position: absolute;
            left: 30px;
            bottom: 70px;
            font-size: 30px;
            color: #FFF;
            text-shadow: 8px 9px 12px rgb(0 0 0 / 50%);
            font-weight: bold;
            transition: all linear 0.25s;
        }

        .profile-card-2 .profile-icons {
            position: absolute;
            bottom: 30px;
            right: 30px;
            color: #FFF;
            transition: all linear 0.25s;
        }

        .profile-card-2 .profile-username {
            position: absolute;
            bottom: 50px;
            left: 30px;
            color: #F7F4F400;
            font-size: 14px;
        }

        .profile-card-2 .profile-icons .fa {
            margin: 5px;
        }

        .profile-card-2:hover img {
            filter: blur(1.4px) grayscale(42%) opacity(90%);
        }

        .profile-card-2:hover .profile-name {
            bottom: 80px;
        }

        .profile-card-2:hover .profile-username {
            bottom: 60px;
            background: green;
            border-radius: 2px;
            color: white;
            transition-delay: 0.2s;
            padding: 3px;
        }

        .profile-card-2:hover .profile-icons {
            right: 40px;
        }

        /* Retira as Setas do campo Number*/
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;

        }

        input[type=number] {
            -moz-appearance: textfield;
            appearance: textfield;

        }

        #info:hover {
            color: #4e9500 !important;
        }

        #medio:hover {
            color: #bd150b !important;
        }

        #fund:hover {
            color: #bdbb49 !important;
        }

        header.masthead {
            padding-top: 10.5rem;
            padding-bottom: 6rem;
            text-align: center;
            color: #fff;
            background-color: #cbdbd2;
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center center;
            background-size: cover;
        }

        header.masthead .masthead-subheading {
            font-size: 4rem;
            line-height: 3rem;
            margin-bottom: 3rem;
            font-weight: 50;
            text-transform: uppercase;
            font-family: "Montserrat";
            color: #000;
        }

        header.masthead .masthead-heading {
            font-size: 3rem;
            font-weight: 600;
            line-height: 2.5rem;
            margin-bottom: 1.5rem;
            font-family: "Montserrat";
            color: #000;
        }

        @media (min-width: 768px) {
            header.masthead {
                padding: 4rem 0rem 12.5rem 0rem;
            }

            header.masthead .masthead-subheading {
                font-size: 4rem;
                line-height: 3rem;
                margin-bottom: 3rem;
                font-weight: 50;
                text-transform: uppercase;
                color: #000;
            }

            header.masthead .masthead-heading {
                font-size: 3rem;
                font-weight: 600;
                line-height: 2.5rem;
                margin-bottom: 1.5rem;
                color: #000;
            }
        }
    </style>

</head>

<body class="hold-transition layout-fixed">

    <header class="masthead">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" style="margin: 20px auto;">
                    <div class="masthead-subheading"><img src="dist/img/logo.png"></div>
                    <div class="masthead-heading">Colégio Estadual</div>
                    <div class="masthead-subheading">Barão de<br>Antonina</div>
                    <a class="btn btn-success btn-xl text-uppercase" href="#nav">saiba mais</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Carousel
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img img-responsive w-100" src="./dist/img/bannerP.png" alt="Slide" id="foto">
            </div>
             Para adicionar mais slides retire esta parte do comentario
            <div class="carousel-item">
                <img class="d-block w-100" src="./dist/img/bannerP2.png" alt="Slide" style="height: 450px;">
            </div>
            
            <div class="carousel-item">
                <img class="d-block w-100" src="./dist/img/graduacao.jpg" alt="Slide" style="height: 500px;">
            </div>
        </div>
    </div>./Carousel -->

    <section class="content" style="background-color: #cbdbd2;padding: 2.8rem 0rem 12.5rem 0rem;">
        <!-- Cards -->
        <br>
        <div class="container" id="nav">
            <div class="h1 text-center" id="pageHeaderTitle" style="font-family: 'Quicksand', sans-serif; color: #00a339; padding-top: 4rem; padding-bottom: 4rem;">
                informativos</div>
            <div class="row text-center">
                <div class="col-md-3" data-toggle="modal" data-target="#centralDeCopias">
                    <div class="profile-card-2"><img src="dist/img/home-1.png" class="img img-responsive" style="height: 400px;">
                        <div class="profile-name" style="font-family: 'Quicksand', sans-serif;">Impressão</div>
                        <div class="profile-username" style="font-family: 'Pacifico', cursive;">envie arquivos para impressão</div>
                    </div>
                </div>

                <div class="col-md-3">
                    <a href="#aviso">
                        <div class="profile-card-2"><img src="dist/img/home-2.png" class="img img-responsive" style="height: 400px;">
                            <div class="profile-name" style="font-family: 'Quicksand', sans-serif;">Avisos</div>
                            <div class="profile-username" style="font-family: 'Pacifico', cursive;">visualize os avisos disponíveis</div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="#curso">
                        <div class="profile-card-2"><img src="dist/img/home-3.png" class="img img-responsive" style="height: 400px;">
                            <div class="profile-name" style="font-family: 'Quicksand', sans-serif;">Cursos</div>
                            <div class="profile-username" style="font-family: 'Pacifico', cursive;">visualize os cursos disponíveis</div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3" data-toggle="modal" data-target="#sac">
                    <div class="profile-card-2"><img src="dist/img/home-4.png" class="img img-responsive" style="height: 400px;">
                        <div class="profile-name" style="font-family: 'Quicksand', sans-serif;">SAC</div>
                        <div class="profile-username" style="font-family: 'Pacifico', cursive;">realize um atendimento</div>
                    </div>
                </div>


            </div><!-- row -->
        </div><!-- CONTAINER -->
        <!-- / .Cards -->
    </section>

    <!-- Modal Xerox -->
    <div class="modal fade" id="centralDeCopias" tabindex="-1" role="dialog" aria-labelledby="janelamodallabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 16px;">
                <div class="card card-outline card-success">
                    <div class="card-header text-center" id="exempleModal">
                        <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p class="h1"><b>Cópias</b>Barão</p>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg">Insira o nome e o arquivo para a impressão!</p>

                        <form name="upload" action="docs/_includes/xerox/grava_xerox.php" method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="nome" placeholder="Nome do arquivo" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span><i class="fas fa-file-signature"></i></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="arquivo" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span><i class="fas fa-file-upload"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <div class="form-group row">
                                    <div class="col-auto">
                                        <button type="submit" value="ENVIAR" class="btn btn-success">ENVIAR</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Modal Xerox -->

    <!-- Modal SAC -->
    <div class="modal fade" id="sac" tabindex="-1" role="dialog" aria-labelledby="janelamodallabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 16px;">
                <div class="card card-outline card-success">
                    <div class="card-header text-center" id="sac">
                        <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p class="h1"><b>Sac</b>Barão</p>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg">Após inserir alguns de seus dados, <br>diga-nos em que podemos ajudar!
                        </p>

                        <form action="grava_sac.php" name="atend" method="POST">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="nome" placeholder="Nome completo" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email (opcional)">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="telefone" placeholder="Telefone para contato" required maxlength="14" OnKeyPress="formatar('## #####-####', this)">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone-alt"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <textarea class="form-control" name="mensagem" id="exampleFormControlTextarea1" rows="3" placeholder="Mensagem"></textarea>
                            </div>

                            <div class="modal-footer">
                                <div class="form-group row">
                                    <div class="col-auto">
                                        <button type="submit" value="ENVIAR" class="btn btn-success swalDefaultSuccess">PERGUNTAR</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Modal SAC -->

    <section class="light" id="curso">
        <div class="wrapper">
            <div class="container py-4">
                <div class="h1 text-center py-2" id="pageHeaderTitle" style="font-family: 'Quicksand'; color: #00a339;">ensino</div>

                <a class="h5 text-muted" style="font-family: 'Pacifico'; padding: 1rem; cursor: pointer;">ensino técnico<a>
                        <article class="postcard light blue">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="dist/img/adm1.jpg" alt="Curso de administração" />
                            </a>
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title blue"><a href="#" style="font-family: 'Quicksand', sans-serif;">Administração</a></h1>
                                <div class="postcard__subtitle small">
                                    <a style="font-family: 'Pacifico', cursive; color: #0076bd;">
                                        <i class="fas fas fa-clock mr-2"></i>4 anos - Integrado ao ensino médio
                                    </a>
                                </div>
                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia,
                                    doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis
                                    molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla
                                    unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                                <ul class="postcard__tagbox">
                                    <li class="tItemDisabled"><i class="fas fa-tag mr-2"></i>Grade curricular</li>


                                    <?php

                                    session_start();

                                    $ensino_fund = 'adm';

                                    echo '<a href="docs/_includes/Galeria/galeria.php?defineCurso=' . $ensino_fund . '"><li class="tag__item"><i class="fas fa-calendar-alt mr-2"></i>Album de fotos</li></a>';



                                    echo '<a href="docs/_includes/gradeHorario.php?defineCursoh=' . $ensino_fund . '"><li class="tag__item play blue" data-toggle="modal" data-target="#horarios">
                                <i class="fas fa-play mr-2"></i>Horários
                            </li></a>';

                                    ?>
                                </ul>
                            </div>
                        </article>

                        <a id="info" class="h5 text-muted" style="font-family: 'Pacifico'; padding: 1rem; cursor: pointer;">ensino técnico<a>
                                <article class="postcard light green">
                                    <a class="postcard__img_link" href="#">
                                        <img class="postcard__img" src="dist/img/info.jpg" alt="Image Title" />
                                    </a>
                                    <div class="postcard__text t-dark">
                                        <h1 class="postcard__title green"><a href="#" style="font-family: 'Quicksand', sans-serif;">Informática</a></h1>
                                        <div class="postcard__subtitle small">
                                            <a style="font-family: 'Pacifico', cursive; color: #4e9500;">
                                                <i class="fas fas fa-clock mr-2"></i>4 anos - Integrado ao ensino médio
                                            </a>
                                        </div>
                                        <div class="postcard__bar"></div>
                                        <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia,
                                            doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis
                                            molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla
                                            unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                                        <ul class="postcard__tagbox">
                                            <li class="tItemDisabled"><i class="fas fa-tag mr-2"></i>Grade curricular</li>


                                            <?php

                                            session_start();

                                            $ensino_fund = 'tii';

                                            echo '<a href="docs/_includes/Galeria/galeria.php?defineCurso=' . $ensino_fund . '"><li class="tag__item"><i class="fas fa-calendar-alt mr-2"></i>Album de fotos</li></a>';



                                            echo '<a href="docs/_includes/gradeHorario.php?defineCursoh=' . $ensino_fund . '"><li class="tag__item play green" data-toggle="modal" data-target="#horarios">
                                <i class="fas fa-play mr-2"></i>Horários
                            </li></a>';

                                            ?>
                                        </ul>
                                    </div>
                                </article>

                                <a id="medio" class="h5 text-muted" style="font-family: 'Pacifico'; padding: 1rem; cursor: pointer;">ensino regular<a>
                                        <article class="postcard light red">
                                            <a class="postcard__img_link" href="#">
                                                <img class="postcard__img" src="dist/img/medio1.jpg" alt="Image Title" />
                                            </a>
                                            <div class="postcard__text t-dark">
                                                <h1 class="postcard__title red"><a href="#" style="font-family: 'Quicksand', sans-serif;">Ensino médio</a></h1>
                                                <div class="postcard__subtitle small">
                                                    <a style="font-family: 'Pacifico', cursive; color: #bd150b;">
                                                        <i class="fas fa-clock mr-2"></i>3 anos - Ensino médio regular
                                                    </a>
                                                </div>
                                                <div class="postcard__bar"></div>
                                                <div class="postcard__preview-txt">O Ensino Médio está passando por mudanças, agora ele se chama, “Novo Ensino Médio” Paranaense.
                                                    Essas mudanças vão compor o Referencial Curricular do Ensino Médio, que visa a formação integral dos estudantes e perpassa pelo desenvolvimento
                                                    das competências e habilidades, definidos numa estrutura curricular flexível, composta por uma Formação Geral Básica (FGB) e pelos Itinerários
                                                    Formativos (IF), organizada em áreas do conhecimento.
                                                    O Protagonismo Juvenil é a essência deste Novo Ensino Médio, além da garantia da constituição de saberes de modo progressivo.</div>
                                                <ul class="postcard__tagbox">
                                                    <li class="tItemDisabled"><i class="fas fa-tag mr-2"></i>Grade curricular</li>


                                                    <?php

                                                    session_start();

                                                    $ensino_fund = 'esm';

                                                    echo '<a href="docs/_includes/Galeria/galeria.php?defineCurso=' . $ensino_fund . '"><li class="tag__item"><i class="fas fa-calendar-alt mr-2"></i>Album de fotos</li></a>';



                                                    echo '<a href="docs/_includes/gradeHorario.php?defineCursoh=' . $ensino_fund . '"><li class="tag__item play red" data-toggle="modal" data-target="#horarios">
                                <i class="fas fa-play mr-2"></i>Horários
                            </li></a>';

                                                    ?>
                                                </ul>
                                            </div>
                                        </article>

                                        <a id="fund" class="h5 text-muted" style="font-family: 'Pacifico'; padding: 1rem; cursor: pointer;">ensino regular<a>
                                                <article class="postcard light yellow">
                                                    <a class="postcard__img_link" href="#">
                                                        <img class="postcard__img" src="dist/img/fundamental.jpg" alt="Image Title" />
                                                    </a>
                                                    <div class="postcard__text t-dark">
                                                        <h1 class="postcard__title yellow"><a href="#" style="font-family: 'Quicksand', sans-serif;">Ensino fundamental</a></h1>
                                                        <div class="postcard__subtitle small">
                                                            <a style="font-family: 'Pacifico', cursive; color: #bdbb49;">
                                                                <i class="fas fa-clock mr-2"></i>3 anos - Ensino fundamental
                                                            </a>
                                                        </div>
                                                        <div class="postcard__bar"></div>
                                                        <div class="postcard__preview-txt">O Ensino Fundamental é a fase de desenvolvimento do estudante que se constitui
                                                            na base para o Ensino Médio. São conteúdos que dão continuidade ao Ensino Infantil, para além da ludicidade, característica marcante dessas primeiras etapas
                                                            de ensino, propondo o desafio de trabalhar com conteúdos mais complexos, sistematizados e próprios de cada componente curricular,
                                                            fortalecendo a autonomia frente aos conhecimentos e informações então adquiridos,
                                                            possibilitando a melhoria de escolarização dos estudantes.</div>
                                                        <ul class="postcard__tagbox">
                                                            <li class="tItemDisabled"><i class="fas fa-tag mr-2"></i>Grade curricular</li>

                                                            <?php

                                                            session_start();

                                                            $ensino_fund = 'fun';

                                                            echo '<a href="docs/_includes/Galeria/galeria.php?defineCurso=' . $ensino_fund . '"><li class="tag__item"><i class="fas fa-calendar-alt mr-2"></i>Album de fotos</li></a>';



                                                            echo '<a href="docs/_includes/gradeHorario.php?defineCursoh=' . $ensino_fund . '"><li class="tag__item play yellow">
                                <i class="fas fa-play mr-2"></i>Horários
                            </li></a>';

                                                            ?>
                                                        </ul>
                                                    </div>
                                                </article>
            </div>
        </div>
    </section>

    <!---Avisos-->
    <section class="content" id="aviso" style="background-color: #cbdbd2;">
        <div class="wrapper">
            <div class="container py-4">
                <div class="container">
                    <div class="h1 text-center" id="pageHeaderTitle" style="font-family: 'Quicksand', sans-serif; color: #00a339;">
                        avisos</div>
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">

                                <div class="active tab-pane">
                                    <!-- Post -->
                                    <div class="post">
                                        <div id="conteudo"></div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <br />
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!---./ Avisos-->
    <section class="light" id="curso" style="padding: 4rem;">
        <div class="container-fluid">
            <div class="row mb-3">
                <?php
                session_start();
                require("conecta.php");
                $conexao = mysqli_select_db($conecta, "sitebarao"); {

                    $galeria = "SELECT * FROM galeria WHERE curso='Instituição' ORDER BY data_hora DESC LIMIT 3";
                    $consultag = mysqli_query($conecta, $galeria);

                    while ($registrog = mysqli_fetch_assoc($consultag)) {
                ?>

                        <div class="col-sm-4">
                            <div class="thumbnail">
                                <div class="lightbox">
                                    <img class="img-fluid" src="docs/_includes/Galeria/images/<?php echo $registrog["foto"]; ?>" alt="..." style="width: 397px; height: 223px;">
                                </div>

                                <div class="caption">
                                    <p class="text-center text-muted">
                                        <?php echo $registrog["descricao"]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php

                    }
                }
                ?>
            </div>
            <div class="row">
                <div class="col-sm-6" style="margin: 20px auto; text-align: center;">
                    <?php
                    $ensino_fund = 'ins';

                    echo '<a href="docs/_includes/Galeria/galeria.php?defineCurso=' . $ensino_fund . '"><button class="btn btn-success">album de fotos</button></a>';

                    ?>

                </div>
            </div>
        </div>
    </section>

    <?php
    require('./docs/_includes/footer.php');
    ?>


    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script> <!-- Muda icone + para - nos cards do intranet -->
    <!-- AdminLTE for demo purposes Alert Início 
    <script src="dist/js/demo.js"></script>-->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZJXDXY6FNT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-ZJXDXY6FNT');
    </script>



    <!-- Mensagens-->
    <script>
        //sucesso
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
            });

            $('.swalDefaultSuccess').click(function() {
                Toast.fire({
                    icon: 'success',
                    title: 'Dúvida enviada com sucesso, assim que possível entraremos em contato!'
                })
            });
        });
    </script>

    <!-- Scroll delay -->
    <script>
        $(function() {
            $(window).on('scroll', function() {
                if ($(window).scrollTop() > 10) {
                    $('.navbar').addClass('active');
                } else {
                    $('.navbar').removeClass('active');
                }
            });
        });
    </script>

    <!-- Editor de texto (Summernote) -->
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
    </script>

    <!-- Paginação -->
    <script>
        var qnt_result_pg = 5; //quantidade de registro por página
        var pagina = 1; //página inicial
        $(document).ready(function() {
            listar_usuario(pagina, qnt_result_pg); //Chamar a função para listar os registros
        });

        function listar_usuario(pagina, qnt_result_pg) {
            var dados = {
                pagina: pagina,
                qnt_result_pg: qnt_result_pg
            }
            $.post('listar_aviso.php', dados, function(retorna) {
                //Subtitui o valor no seletor id="conteudo"
                $("#conteudo").html(retorna);
            });
        }
    </script>
</body>

</html>