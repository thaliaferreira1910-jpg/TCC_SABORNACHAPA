<?php
include "../conexao.php";
$cat_id = $_GET['cat_id'];

$sql="SELECT * FROM categoria
WHERE cat_id = $cat_id";
$result = $conn->query($sql);
$categoria= $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulário da Categoria</title>

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

<h2>Edição da Categoria</h2>

<form method="post" action="updateCategoria.php" enctype="multipart/form-data">
    
<input type="hidden" name="cat_id" class="caixa" value="<?= $categoria['cat_id']?>"><br>

    Nome:<br>
    <input type="varchar" name="cat_nome" class="caixa" value="<?= $categoria['cat_nome']?>"><br>
    
    <br>
    <br>
<!--Botões de Enviar e Limpar-->
<input type="submit" value="EDITAR" class="caixa">

</form>