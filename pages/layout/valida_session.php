<?php
session_start();

//verifica o login
if ($_SESSION['login'] == "") {
    echo "<script>window.location='../examples/login-v2.php'</script>";
}
?>