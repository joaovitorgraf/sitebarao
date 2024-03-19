<?php
    include('valida_session.php');
?>
<!DOCTYPE html>
<html>

<body>
    <!-- Cadastro de avisos -->
    <section class="content">
        <form class="contact-form row" action="../../grava_noticia.php" name="form2" method="post">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Cadastro de avisos</h3>


                                <div class="card-tools">

                                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#CadAviso" aria-expanded="false" aria-controls="CadAviso">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="collapse" id="CadAviso">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">

                                            <div class="input-group mb-3">
                                                <input name="sub_titulo" id="sub_titulo" type="text" class="form-control datetimepicker-input" placeholder="Nome do Aviso" required />
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span>
                                                            <ion-icon name="bookmark"></ion-icon>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input name="titulo" id="titulo" type="text" class="form-control datetimepicker-input" placeholder="Título" required />
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span>
                                                            <ion-icon name="book"></ion-icon>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <div class="card-body">
                                                    <textarea id="summernote" name="noticia"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <div class="text-center">

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-footer-->
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                            <h3 class="text-success"><i class="fas fa-quote-left"></i> Cadastro de
                                                avisos</h3>
                                            <p class="text-muted">Nesta aba você poderá cadastrar um novo
                                                aviso<br>que será visível na tela inicial.</p>
                                            <div class="text-right mb-5">
                                                <button type="submit" class="btn btn-sm btn-success swalDefaultSuccess" onclick="return validar()">Cadastrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </section>
</body>

</html>