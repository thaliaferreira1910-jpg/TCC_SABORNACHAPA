<?php
//Importar o arquivo de conexão, fora da pasta
include "../conexao.php";
/*Neste trecho de código está sendo criado uma variável
em PHP $ para receber através do método POST
o name do HTML*/

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

$sql = "INSERT INTO usuario_cliente(usucli_nome,usucli_email,usucli_cpf,usucli_endereco,usucli_estado, 
usucli_cidade,usucli_rua,usucli_numero,usucli_bairro,usucli_cep)
 VALUES 
('$usucli_nome','$usucli_email','$usucli_cpf','$usucli_endereco','$usucli_estado','$usucli_cidade','$usucli_rua','$usucli_numero','$usucli_bairro','$usucli_cep')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formUsuario_Cliente.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}

?>


