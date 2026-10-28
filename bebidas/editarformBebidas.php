<?php
include "../conexao.php";
$be_id = $_GET['be_id'];

$sql="SELECT * FROM bebidas
WHERE be_id = $be_id";
$result = $conn->query($sql);
$bebidas = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulário de Alteração de bebidas</title>

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

<h2>Edição de bebidas</h2>

<form method="post" action="updateBebidas.php" enctype="multipart/form-data">

<input type="hidden" name="be_id" class="caixa" value="<?= $bebidas['be_id']?>"><br>
    
    Nome:<br>
    <input type="varchar" name="be_nome" class="caixa" value="<?= $bebidas['be_nome']?>"><br>
    
    Tamanho:<br>
    <input type="int" name="be_tamanho" class="caixa" value="<?= $bebidas['be_tamanho']?>"><br>
    
    Preço:<br>
    <input type="int" name="be_preco" class="caixa" value="<?= $bebidas['be_preco']?>"><br>
    
    <br>  
    Foto:<br>
    <input type="file" name="be_foto"  class="caixa" value="<?= $bebidas['be_foto']?>"><br>
    <br>
    <br>
<!--Botões de Enviar e Limpar-->
<input type="submit" value="EDITAR" class="caixa">

</form>