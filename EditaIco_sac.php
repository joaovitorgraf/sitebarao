<?php
    require("conecta.php");

    $id_sac	= $_POST["id_sac"];
    $Aguardando		= $_POST["Aguardando"];
    $Respondido		= $_POST["Respondido"];

    if($Aguardando != ''){
    $sqlinsert = ("UPDATE sac SET  define_ico='".$Aguardando."' WHERE sac.id_sac='".$id_sac."';");



    mysqli_query($conecta, $sqlinsert) or die ("Não foi possível realizar as alterações nos dados!");

    sleep(1);
    echo"<script>window.location='./pages/layout/boxed.php'</script>";

    }if($Respondido != ''){
        $sqlinsert = ("UPDATE sac SET  define_ico='".$Respondido."' WHERE sac.id_sac='".$id_sac."';");
    
    
    
        mysqli_query($conecta, $sqlinsert) or die ("Não foi possível realizar as alterações nos dados!");
    
        echo"<script>window.location='./pages/layout/boxed.php'</script>";
    
        }
?>