<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="Galeria/gallery-clean.css">


</head>

<body>

    <div class="container gallery-container">

        <h1>Grade de Horarios</h1>

        <p class="page-description text-center">Clean Layout With Minimal Styles</p>



        <div class="tz-gallery">
            <div class="row">

            <?php

session_start();
require("../../conecta.php");
$conexao = mysqli_select_db($conecta, "sitebarao"); {

$define_curso = filter_input(INPUT_GET, 'defineCursoh');

if($define_curso == 'fun'){
   $sql = "SELECT * FROM horario WHERE curso='Ensino fundamental' ORDER BY turma ASC";
    $consulta = mysqli_query($conecta, $sql);

    while ($registro = mysqli_fetch_assoc($consulta)) {

        echo '<div class="col-sm-6 col-md-4">
         <div class="thumbnail">
         <p>'.$registro["turma"].'</p>
             <a class="lightbox" href="../../horario/'.$registro["foto"] .'">
                 <img src="../../horario/'.$registro["foto"].' " alt="Park" style="width: 305px; height: 78px;">
             </a>
         </div>
     </div>';
    }
}

if($define_curso == 'esm'){
    $sql = "SELECT * FROM horario WHERE curso='Ensino médio' ORDER BY turma ASC";
     $consulta = mysqli_query($conecta, $sql);

     while ($registro = mysqli_fetch_assoc($consulta)) {

        echo '<div class="col-sm-6 col-md-4">
        <div class="thumbnail">
        <p>'.$registro["turma"].'</p>
            <a class="lightbox" href="../../horario/'.$registro["foto"] .'">
                <img src="../../horario/'.$registro["foto"].' " alt="Park" style="width: 305px; height: 78px;">
            </a>
        </div>
    </div>';
     }
 }
 
 if($define_curso == 'tii'){
    $sql = "SELECT * FROM horario WHERE curso='Informática' ORDER BY turma ASC";
     $consulta = mysqli_query($conecta, $sql);

     while ($registro = mysqli_fetch_assoc($consulta)) {

         echo '<div class="col-sm-6 col-md-4">
         <div class="thumbnail">
         <p>'.$registro["turma"].'</p>
             <a class="lightbox" href="../../horario/'.$registro["foto"] .'">
                 <img src="../../horario/'.$registro["foto"].' " alt="Park" style="width: 305px; height: 78px;">
             </a>
         </div>
     </div>';
     }
 }

 if($define_curso == 'adm'){
    $sql = "SELECT * FROM horario WHERE curso='Administração' ORDER BY turma ASC";
     $consulta = mysqli_query($conecta, $sql);

     while ($registro = mysqli_fetch_assoc($consulta)) {

        echo '<div class="col-sm-6 col-md-4">
        <div class="thumbnail">
        <p>'.$registro["turma"].'</p>
            <a class="lightbox" href="../../horario/'.$registro["foto"] .'">
                <img src="../../horario/'.$registro["foto"].' " alt="Park" style="width: 305px; height: 78px;">
            </a>
        </div>
    </div>';
     }
 }
}

?>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>

    <script>
        baguetteBox.run('.tz-gallery');
    </script>
</body>

</html>