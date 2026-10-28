<?php
//Importar o arquivo de conexão, fora da pasta
include "../conexao.php";
/*Neste trecho de código está sendo criado uma variável
em PHP $ para receber através do método POST
o name do HTML*/
$cat_id = $_POST['cat_id'];
$cat_nome = $_POST['cat_nome'];

$sql = "INSERT INTO categoria VALUES 
('$cat_id','$cat_nome')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formCategoria.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}

?>