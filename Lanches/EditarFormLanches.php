<?php
include "../conexao.php";
$lan_id = $_GET['lan_id'];

$sql="SELECT * FROM lanches
WHERE lan_id = $lan_id";
$result = $conn->query($sql);
$lanches= $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulário dos Lanches</title>

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
    width:50px;
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

<img src="imagens/LOGO TCC.jpeg">    

<h2>Edição dos Lanches</h2>

<form method="post" action="updateLanches.php" enctype="multipart/form-data">
    
<input type="hidden" name="lan_id" class="caixa" value="<?= $lanches['lan_id']?>"><br>

    Nome do Lanche:<br>
    <input type="varchar" name="lan_nome" class="caixa" value="<?= $lanches['lan_nome']?>"><br>
    
    Preço:<br>
    <input type="int" name="lan_preco" class="caixa" value="<?= $lanches['lan_preco']?>"><br>
    
    Descrição:<br>
    <input type="varchar" name="lan_descricao" class="caixa "value="<?= $lanches['lan_descricao']?>"><br>
    
    Foto:<br>
    <input type="varchar" name="lan_foto"class="caixa" value="<?= $lanches['lan_foto']?>"><br>
    
    Categoria:<br>
    <input type="varchar" name="cat_id" class="caixa" value="<?= $lanches['cat_id']?>"><br>
    
    <br>
    <br>
<!--Botões de Enviar e Limpar-->
<input type="submit" value="EDITAR" class="caixa">

</form>