<?php
require("../../../conecta.php");

/*Pasta onde o arquivo vai ser salvo */
$_UP['pasta'] = 'docs/';

//Tamanho maximo do arquivo (em byte)
$_UP['tamanho'] = 1024 * 1024 * 2; //2mb

//Array com as extensões permitidas
$_UP['extensoes'] = array('txt', 'pdf', 'doc', 'docx', 'ppt', 'pps', 'xls', 'xlsx', 'gif', 'png', 'jpg', 'jpeg', 'svg');

//Renomear o arquivo? (se true, o arquivo será salvo como .jpg eu nome único)
$_UP['renomeia'] = false;

//Array com os tipos de erros de upload do PHP

$_UP['erros'] [0] = 'Não houve erro';
$_UP['erros'] [1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'] [2] = 'O arquivo ultrapassa o limite do tamanho especificado no HTML';
$_UP['erros'] [3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'] [4] = 'Não foi feito upload do arquivo';

//Verifcar se houve algum erro com o upload, se sim, exibe a mensagem de erro
if ($_FILE['arquivo'] ['erro'] != 0) {
die("Não foi possível fazer upload, erro!<br>".$_UP['erros'][$_FILES['arquivo']['error']]);
exit; //Para a execução do script
}

//Faz a verificação da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
echo "Por favor, envie os arquivos com as seguintes extensões: jpg, jpeg, png ou gif";
}

// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "O arquivo enviado é muito gande, envie arquivos de até 2Mb.";
}

// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else
{
// Primeiro verifica se deve tocar o nome do arquivo
if ($_UP['renomeia'] == true) {
// Cria um nome baseando no UNIX TIMESTAMP atual e com estensão .jpg
$nome_final = time().'.jpg';
}
else
{
// Mantem o nome original no arquivo
$nome_final = $_FILES['arquivo']['name'];

}

// Depois verifica se é possivel mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'].date('Ymd_His').$nome_final))
{
// Upload efetuado com sucesso, exibe uma mensagem e o link para o arquivo
echo "Upload efetuado com sucesso!";
$nome_concatenado = date('Ymd_His') . $nome_final;
//echo '<br />< href="' .$nome_concatenado. '">Clique aqui para acessar o arquivo</a>';

}
else
{
// Não foi possivel fazer upload, provavelmente a pasta está incorreta
//echo "Não foi possivel enviar o arquivo, tente novamente";
}
}
 
//$id_usuario = $_POST["id_usuario"];
$nome = $_POST["nome"];
$doc  = $nome_concatenado;

$data_hora =  $_POST['data_hora'];
$date = date('Y-m-d H:i:s', time($data_hora));

//echo "<br>Nome do arquivo: ".$foto_usuario."<br>";
//echo "<br>Nome final: ".$nome_concatenado."<br>";

$sqlinsert = "INSERT INTO xerox (nome, documento, data_hora)

VALUES ('$nome', '$doc', '$date')";

mysqli_query($conecta, $sqlinsert) or die ("<br>Não foi possível realizar alterações!");

echo"<script> window.alert('Documento enviado com sucesso!');
window.location='../../../index.php'</script>";

?>