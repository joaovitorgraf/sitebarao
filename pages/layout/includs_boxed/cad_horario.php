<?php
    include('valida_session.php');
?>
<!DOCTYPE html>
<html>

<body>
    <!-- Cadastro de foto -->
    <section class="content" id="cad_foto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cadastro de horário</h3>

                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#CadHorario" aria-expanded="false" aria-controls="CadHorario">
                        <i class="fas fa-cog"></i>
                    </button>
                </div>
            </div>
            <div class="collapse" id="CadHorario">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="card-body p-0">
                                <form method="POST" name="upload" action="../../grava_horario.php" enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="turma" placeholder="Turma:">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-font"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="imput-group mb-3">
                                        <div class="select2-green">
                                            <select class="select2" name="curso" multiple="multiple" data-placeholder="Selecione o Curso" data-dropdown-css-class="select2-green" style="width: 100%;" required>
                                                <option value="Administração">Administração</option>
                                                <option value="Informática">Informática</option>
                                                <option value="Ensino médio">Ensino médio</option>
                                                <option value="Ensino fundamental">Ensino fundamental</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="file" class="form-control" id="customFile" name="arquivo" style="padding: 0.2rem 0rem 0rem 0.2rem;">
                                        </div>
                                        <div class="col-6" style="padding: 0rem 0rem 0rem 17.5rem;">
                                            <button type="submit" value="ENVIAR" class="btn btn-success swalDefaultSuccess" onclick="return validar()">Cadastrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h3 class="text-success"><i class="fas fa-quote-left"></i> Cadastro de horários</h3>
                            <p class="text-muted">Nesta aba você poderá cadastrar uma novo horário<br>selecionando a turma desejada.
                            </p>
                            <p class="text-muted text-center" style="font-size: 0.7rem;"> Não esqueça de selecionar o caminho da imagem.<br>tamanho sugerido: 1920 x 380px
                            </p>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
        </div>
    </section><!-- / .Cadastro de foto -->
</body>

</html>