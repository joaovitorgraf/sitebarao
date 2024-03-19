<?php
    session_start();
    require("conecta.php");

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if(!empty($id) ){
        $result_aviso = "DELETE FROM sac WHERE id_sac='$id'";
        $resultado_aviso = mysqli_query($conecta, $result_aviso);
        if(mysqli_affected_rows($conecta)){
            sleep(1);
            echo"<script>window.location='./pages/layout/boxed.php'</script>";
        }else{
            sleep(1);
            echo"<script>window.location='./pages/layout/boxed.php'</script>";
        }
    }
?>