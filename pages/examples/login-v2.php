<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Intranet | LogBarão</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">

  <?php
  session_start();
  ?>

  <!-- login-box -->
  <div class="login-box">
    <div class="card card-outline card-success">
      <div class="card-header text-center">
        <p class="h1"><b>Log</b>Barão</p>
      </div>
      <div class="card-body">
        <p class="login-box-msg"><b>Bem-vindo!</b><br>Insira login e senha para logar!</p>

        <form name="formlogin" action="valida.php" method="post">
          <div class="input-group mb-3">
            <input type="text" name="login" class="form-control" placeholder="Login">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-sign-in-alt"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="senha" class="form-control" placeholder="Senha">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <?php
          if(isset($_SESSION['nao_autenticado'])):
          ?>
          <p class="p-1 text-danger text-center">
          <i class="fas fa-exclamation-circle"></i> Usuário ou senha incorretos.
          </p>
          <?php
          endif;
          unset($_SESSION['nao_autenticado']);
          ?>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-success btn-block">Entrar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <br>
        <!--
        <p class="mb-1">
          <a href="forgot-password-v2.php">Esqueci minha senha</a>
        </p>
        -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- Referencia página recuperar senha -->
  <?php
  //$url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';
  //$dir = "pags/";
  //$ext = ".php";

  //if (file_exists($dir . $url . $ext)) {
  //  include($dir . $url . $ext);
  //} else {
  //  echo "<div class='alert alert-danger'>Página não encontrada</div>";
  //}

  ?>

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>