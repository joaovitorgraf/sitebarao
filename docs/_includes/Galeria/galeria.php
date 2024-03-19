<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="gallery-clean.css">


</head>

<body>

    <div class="container gallery-container">

        <h1>Galeria de Fotos Barão</h1>

        <p class="page-description text-center">Clean Layout With Minimal Styles</p>



        <div class="tz-gallery">
            <div class="row">

            <?php

session_start();
require("conecta.php");
$conexao = mysqli_select_db($conecta, "sitebarao"); {

$define_curso = filter_input(INPUT_GET, 'defineCurso');

if($define_curso == 'fun'){
    $sql = "SELECT * FROM galeria WHERE curso='Ensino fundamental' ORDER BY data_hora DESC ";
    $consulta = mysqli_query($conecta, $sql);

    while ($registro = mysqli_fetch_assoc($consulta)) {

        echo '<div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <a class="lightbox" href="images/'.$registro["foto"] .'">
                <img src="images/'.$registro["foto"].' " alt="Park" style="width: 305px; height: 172px;">
            </a>

            <div class="caption">

                <p>'.$registro["descricao"].'</p>
            </div>
        </div>
    </div>';
    }
}

if($define_curso == 'esm'){
    $sql = "SELECT * FROM galeria WHERE curso='Ensino médio' ORDER BY data_hora DESC";
     $consulta = mysqli_query($conecta, $sql);

     while ($registro = mysqli_fetch_assoc($consulta)) {

         echo '<div class="col-sm-6 col-md-4">
         <div class="thumbnail">
             <a class="lightbox" href="images/'.$registro["foto"] .'">
                 <img src="images/'.$registro["foto"].' " alt="Park" style="width: 305px; height: 172px;">
             </a>

             <div class="caption">

                 <p>'.$registro["descricao"].'</p>
             </div>
         </div>
     </div>';
     }
 }
 
 if($define_curso == 'tii'){
    $sql = "SELECT * FROM galeria WHERE curso='Informática' ORDER BY data_hora DESC";
     $consulta = mysqli_query($conecta, $sql);

     while ($registro = mysqli_fetch_assoc($consulta)) {

         echo '<div class="col-sm-6 col-md-4">
         <div class="thumbnail">
             <a class="lightbox" href="images/'.$registro["foto"] .'">
                 <img src="images/'.$registro["foto"].' " alt="Park" style="width: 305px; height: 172px;">
             </a>

             <div class="caption">

                 <p>'.$registro["descricao"].'</p>
             </div>
         </div>
     </div>';
     }
 }

 if($define_curso == 'adm'){
    $sql = "SELECT * FROM galeria WHERE curso='Administração' ORDER BY data_hora DESC";
     $consulta = mysqli_query($conecta, $sql);

     while ($registro = mysqli_fetch_assoc($consulta)) {

         echo '<div class="col-sm-6 col-md-4">
         <div class="thumbnail">
             <a class="lightbox" href="images/'.$registro["foto"].'">
                 <img src="images/'.$registro["foto"].' " alt="Park" style="width: 305px; height: 172px;">
             </a>

             <div class="caption">

                 <p>'.$registro["descricao"].'</p>
             </div>
         </div>
     </div>';
     }
 }

 if($define_curso == 'ins'){
    $sql = "SELECT * FROM galeria WHERE curso='Instituição' ORDER BY data_hora DESC";
     $consulta = mysqli_query($conecta, $sql);

     while ($registro = mysqli_fetch_assoc($consulta)) {

         echo '<div class="col-sm-6 col-md-4">
         <div class="thumbnail">
             <a class="lightbox" href="images/'.$registro["foto"].'">
                 <img src="images/'.$registro["foto"].' " alt="Park" style="width: 305px; height: 172px;">
             </a>

             <div class="caption">

                 <p>'.$registro["descricao"].'</p>
             </div>
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