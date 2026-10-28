<?php
include "../conexao.php";
/*As variáveis criadas do PHP recebem
o name do HTML */
$ava_id = $_POST['ava_id'];
$usucli_id = $_POST['usucli_id'];
$avaliacao = $_POST['avaliacao'];
$estrelas = $_POST['estrelas'];

$sql = "UPDATE avaliacao SET 
usucli_id = '$usucli_id',
avaliacao = '$avaliacao',
estrelas = '$estrelas'
WHERE ava_id = $ava_id";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados alterados com sucesso!');
    window.location.href='formAvaliacao.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}




?>