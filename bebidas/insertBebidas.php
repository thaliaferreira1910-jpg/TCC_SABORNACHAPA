<?php
//Importar o arquivo de conexão, fora da pasta
include "../conexao.php";
/*Neste trecho de código está sendo criado uma variável
em PHP $ para receber através do método POST
o name do HTML*/
$be_id = $_POST['be_id'];
$be_nome = $_POST['be_nome'];
$be_tamanho = $_POST['be_tamanho'];
$be_preco = $_POST['be_preco'];
$be_foto = $_POST['be_foto'];

$sql = "INSERT INTO bebidas(be_id,be_nome,be_tamanho,
be_preco,be_foto) VALUES 
('$be_id','$be_nome','$be_tamanho',
'$be_preco','$be_foto')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formBebidas.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}

?>