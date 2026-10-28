<?php
include "../conexao.php";
/*As variáveis criadas do PHP recebem
o name do HTML */
$be_id = $_POST['be_id'];
$be_nome = $_POST['be_nome'];
$be_tamanho = $_POST['be_tamanho'];
$be_preco = $_POST['be_preco'];
$be_foto = $_POST['be_foto'];

$sql = "UPDATE bebidas SET 
be_nome = '$be_nome', 
be_tamanho = '$be_tamanho',
be_preco = '$be_preco',
be_foto = '$be_foto' 
WHERE be_id=$be_id";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados alterados com sucesso!');
    window.location.href='formBebidas.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}




?>