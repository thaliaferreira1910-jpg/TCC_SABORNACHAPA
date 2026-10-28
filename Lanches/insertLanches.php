<?php
//Importar o arquivo de conexão, fora da pasta
include "../conexao.php";
/*Neste trecho de código está sendo criado uma variável
em PHP $ para receber através do método POST
o name do HTML*/
$lan_id = $_POST['lan_id'];
$lan_nome = $_POST['lan_nome'];
$lan_preco = $_POST['lan_preco'];
$lan_descricao = $_POST['lan_descricao'];
$lan_foto = $_POST['lan_foto'];
$cat_id = $_POST['cat_id'];

$sql = "INSERT INTO lanches VALUES 
('$lan_id','$lan_nome','$lan_preco','$lan_descricao','$lan_foto','$cat_id')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formLanches.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}

?>