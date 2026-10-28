<?php
include "../conexao.php";
$ava_id = $_GET['ava_id'];

$sql="SELECT * FROM avaliacao
WHERE ava_id = $ava_id";
$result = $conn->query($sql);
$aluno = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>

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

<img src="imagens/logo.jpeg">    

<h2>Edição de Avaliação</h2>

<form method="post" action="updateAvaliacao.php" enctype="multipart/form-data">
    
<input type="hidden" name="ava_id" class="caixa" value="<?= $aluno['ava_id']?>"><br>



    Id do usuário:<br>
    <input type="number" name="usucli_id" class="caixa" value="<?= $aluno['usucli_id']?>"><br>

    Avaliação:<br>
    <input type="text" name="avaliacao" class="caixa" value="<?= $aluno['avaliacao']?>"><br>
    
    Estrelas:<br>
    <input type="text" name="estrelas" class="caixa" value="<?= $aluno['estrelas']?>"><br>
    
    
    
    <br>  
    <br>
    <br>
<!--Botões de Enviar e Limpar-->
<input type="submit" value="EDITAR" class="caixa">

</form>