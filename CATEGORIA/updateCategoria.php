<?php
include "../conexao.php";
/*As variáveis criadas do PHP recebem
o name do HTML */
$cat_id = $_POST['cat_id'];
$cat_nome = $_POST['cat_nome'];

$sql = "UPDATE categoria SET 
cat_id = '$cat_id', 
cat_nome = '$cat_nome'
WHERE cat_id=$cat_id";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados alterados com sucesso!');
    window.location.href='formCategoria.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}




?>