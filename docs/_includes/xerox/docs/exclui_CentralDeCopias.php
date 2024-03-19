<?php
    session_start();
    require("conecta.php");

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT * FROM xerox WHERE id='$id'";
    $consulta = mysqli_query($conecta, $sql);

    while ($registro = mysqli_fetch_assoc($consulta)) {
        
        $concatena = $registro["documento"];

        if(file_exists( $concatena )){
            unlink($concatena);
            $result_aviso = "DELETE FROM xerox WHERE id='$id'";
            $resultado_aviso = mysqli_query($conecta, $result_aviso);
                if(mysqli_affected_rows($conecta)){
                    sleep(1);
                    echo"<script>window.location='../../../../pages/layout/boxed.php'</script>";
                }
        }else{
                $result_aviso = "DELETE FROM xerox WHERE id='$id'";
                $resultado_aviso = mysqli_query($conecta, $result_aviso);
                    if(mysqli_affected_rows($conecta)){
                        sleep(1);
                        echo"<script>window.location='../../../../pages/layout/boxed.php'</script>";
                    }
            }
    }
?>