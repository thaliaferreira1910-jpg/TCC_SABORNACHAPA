<?php
//Importar o arquivo de conexão, fora da pasta
include "../conexao.php";
/*Neste trecho de código está sendo criado uma variável
em PHP $ para receber através do método POST
o name do HTML*/
$avaliacao = $_POST['avaliacao'];
$estrelas = $_POST['estrelas'];


$sql = "INSERT INTO avaliacao(avaliacao,estrelas) VALUES 
('$avaliacao','$estrelas')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formAvaliacao.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}

?>