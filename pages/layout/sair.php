<?php
    session_start();
    session_destroy();
    header("location:../examples/login-v2.php");
    exit;
?>