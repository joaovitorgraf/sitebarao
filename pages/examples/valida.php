<?php
    //Inica a sessão
    session_start();

    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    //Conexão com o banco
    require("conecta.php");
    $conexao = mysqli_select_db($conecta, "sitebarao");

    //Consulta/validação SQL
    $consultalogin = "SELECT * FROM usuario WHERE login='".$login."' and senha='".$senha."' and ativo=1";

    $resultado = mysqli_query($conecta, $consultalogin);
    $usuario = mysqli_fetch_array($resultado);

    $quant = mysqli_num_rows($resultado);

    if ($quant > 0) {
      $_SESSION['login'] = $login;
      $_SESSION['id_usuario'] = $usuario['id_usuario'];
      header('Location:../layout/boxed.php');
    } else {
      $_SESSION['nao_autenticado'] = true;
      unset($_SESSION['login']);
      header("Location:login-v2.php");
    }
?>