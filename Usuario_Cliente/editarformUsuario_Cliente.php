<?php
include "../conexao.php";
$usucli_id = $_GET['usucli_id'];

$sql="SELECT * FROM usuario_cliente
WHERE usucli_id = $usucli_id";
$result = $conn->query($sql);
$usuario_cliente= $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulário de Alteração de Clientes</title>

<style>
body{
    font-family:Arial;
    background-color:#f2f2f2;
    text-align:center;
}
.container{
    background:white;
    width:600px;
    margin:auto;
    margin-top:30px;
    padding:20px;
    border-radius:10px;
}
.caixa{
    width:80%;
    padding:5px;
    margin:5px;
}
img{
    width:100px;
    margin-bottom:10px;
}
.grupo{
    text-align:left;
    width:80%;
    margin:auto;
}
.grupo label{
    display:block;
    margin:5px 0;
}
</style>

</head>
<body>

<div class="container">

<img src="img/logo.png">    

<h2>Edição de Clientes</h2>

<form method="post" action="updateUsuario_Cliente.php" enctype="multipart/form-data">
    
<input type="hidden" name="usucli_id" class="caixa" value="<?= $usuario_cliente['usucli_id']?>"><br>


    Nome:<br>
    <input type="varchar" name="usucli_nome" class="caixa" value="<?= $usuario_cliente['usucli_nome']?>"><br>
    
    Email:<br>
    <input type="varchar" name="usucli_email" class="caixa" value="<?= $usuario_cliente['usucli_email']?>"><br>
    
    CPF:<br>
    <input type="int" name="usucli_cpf" class="caixa" value="<?= $usuario_cliente['usucli_cpf']?>"><br>
    
    <br>  
    Endereço:<br>
    <input type="varchar" name="usucli_endereco" class="caixa" value="<?= $usuario_cliente['usucli_endereco']?>"><br>
    <br>
    Estado:<br>
    <select name="usucli_estado" class="caixa" value="<?= $usuario_cliente['usucli_estado']?>">
        <option>São Paulo</option>
        <option>Rio de Janeiro</option>
        <option>Minas Gerais</option>
        <option>Espírito Santo</option>
        <option>Paraná</option>
        <option>Fortaleza</option>
    </select>

    <br>
    Cidade:<br>
    <input type="varchar" name="usucli_cidade" class="caixa" value="<?= $usuario_cliente['usucli_cidade']?>"><br>
    
    <br>
    Rua:<br>
    <input type="varchar" name="usucli_rua" class="caixa" value="<?= $usuario_cliente['usucli_rua']?>"><br>
    
    <br>  
    Número:<br>
    <input type="int" name="usucli_numero" class="caixa" value="<?= $usuario_cliente['usucli_numero']?>"><br>
    <br>

    Bairro:<br>
    <input type="varchar" name="usucli_bairro" class="caixa" value="<?= $usuario_cliente['usucli_bairro']?>"><br>
    
    <br>  
    CEP:<br>
    <input type="int" name="usucli_cep" class="caixa" value="<?= $usuario_cliente['usucli_cep']?>"><br>
    <br>

    <br>
<!--Botões de Enviar e Limpar-->
<input type="submit" value="EDITAR" class="caixa">

</form>