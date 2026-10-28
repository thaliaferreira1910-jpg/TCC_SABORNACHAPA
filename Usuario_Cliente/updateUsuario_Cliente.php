<?php
include "../conexao.php";
/*As variáveis criadas do PHP recebem
o name do HTML */
$usucli_id = $_POST['usucli_id'];
$usucli_nome = $_POST['usucli_nome'];
$usucli_email = $_POST['usucli_email'];
$usucli_cpf = $_POST['usucli_cpf'];
$usucli_endereco = $_POST['usucli_endereco'];
$usucli_estado = $_POST['usucli_estado'];
$usucli_cidade = $_POST['usucli_cidade'];
$usucli_rua = $_POST['usucli_rua'];
$usucli_numero = $_POST['usucli_numero'];
$usucli_bairro = $_POST['usucli_bairro'];
$usucli_cep = $_POST['usucli_cep'];



$sql = "UPDATE usuario_cliente SET 
usucli_nome = '$usucli_nome', 
usucli_email = '$usucli_email',
usucli_cpf = '$usucli_cpf',
usucli_endereco = '$usucli_endereco',
usucli_estado = '$usucli_estado', 
usucli_cidade = '$usucli_cidade',
usucli_rua = '$usucli_rua',
usucli_numero = '$usucli_numero',
usucli_bairro = '$usucli_bairro',
usucli_cep = '$usucli_cep' 
WHERE usucli_id=$usucli_id";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados alterados com sucesso!');
    window.location.href='formUsuario_Cliente.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}




?>
