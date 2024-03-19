<?php
include('valida_session.php');
?>
<!DOCTYPE html>
<html>


<body>
    <section class="content">
        <form class="contact-form row" action="../../grava_usuario.php" name="form1" method="POST">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Cadastro de usuários</h3>


                                <div class="card-tools">

                                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#CadUse" aria-expanded="false" aria-controls="CadUse">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="collapse" id="CadUse">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="nome" placeholder="Nome">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-envelope"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="login" placeholder="Login">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-sign-in-alt"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" name="senha" placeholder="Senha">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-lock-open"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" name="confirmarsenha" placeholder="Confirmar Senha">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-lock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="imput-group mb-3">
                                                    <div class="select2-green">
                                                        <select class="select2 form-control" name="setor" data-placeholder="Selecione o setor" data-dropdown-css-class="select2-green" style="width: 100%;" multiple="multiple" required>
                                                            <option value="admin">Administrador</option>
                                                            <option value="dire">Diretoria</option>
                                                            <option value="pdg">Pedagogia</option>
                                                            <option value="sec">Secretaria</option>
                                                            <option value="prof">Professor</option>
                                                            <option value="cdc">Agente</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                                <h3 class="text-success"><i class="fas fa-quote-left"></i> Cadastro de
                                                    usuários</h3>
                                                <p class="text-muted">Nesta aba somente você administrador, poderá cadastrar um novo usuário
                                                    inserindo os dados e selecionando o setor à qual o usuário pertence.
                                                </p>
                                                <p class="text-muted" style="font-size: 0.7rem;"> Não esqueça de verificar
                                                    se o usuário está habilitado a operar no sistema.</p>
                                                <div class="text-right mb-5">
                                                    <button type="submit" value="ENVIAR" class="btn btn-sm btn-success swalDefaultSuccess" onclick="return validar()">Cadastrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</body>

</html>