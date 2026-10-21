<?php
/*Aqui virá o código de busca 
utilizando o comando SQL*/
include "../conexao.php";

//include"protege.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
    rel="stylesheet">

<title>Formulário Completo1</title>

<style>
body{
    font-family:Arial;
    background-color:#f2f2f2;
    text-align:center;
}
.container{
    background: white;
    width:600px;
    margin:auto;
    margin-top:30px;
    padding:20px;
    border-radius:10px;
}
.cabecalho{
    background: #e64b23;
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
footer{ 
    background-color:#e64b23;
    color:white;
    padding:15px 0;
    text-align:center; 
}
</style>

<script>
function validarFormulario() {

    let comentario = document.getElementById("comentario").value.trim();
    let estrelas = document.getElementById("estrelas").value.trim();

    if (comentario == "") {
        alert("Preencha o campo de avaliação!");
        return false;
    }

    if (estrelas == "") {
        alert("Preencha o campo de estrelas!");
        return false;
    }

    return true;
}
</script>

</head>

<body>

<header class="cabecalho">
    <div class="containerr d-flex justify-content-between align-items-center">
        <img src="../imagens/logo.png" alt="Logo">
        <a href="../menu.php" class="btn btn-light">Voltar ao Menu</a>
    </div>
</header>

<div class="container">

<h2>Avaliação</h2>

<form method="post" action="insertAvaliacao.php" 
      enctype="multipart/form-data"
      onsubmit=#return validarFormulario()#>

<div class="row g-3">

    <div class="mb-4 mt-4">
        <label for="comentario" class="form-label">
            Escreva sua Avaliação
        </label>

        <textarea class="form-control" rows="4"
            id="comentario" name="comentario"
            placeholder="Digite sua avaliação"></textarea>
    </div>

    <div class="col-md-12">
        <label class="form-label">Estrelas</label>

        <input type="text" 
               id="estrelas"
               name="estrelas"
               class="form-control"
               placeholder="Digite a quantidade de estrelas">
    </div>

    <div class="col-12 text-center mt-3">

        <button type="submit" class="btn btn-primary">
            Enviar
        </button>

        <button type="reset" class="btn btn-primary">
            Cancelar
        </button>

    </div>

</div>

</form>

<br>
<br>

<!-- Início da tabela de visualização -->

<table>
    <thead>
        <tr>
            <th>ID do Cliente</th>
            <th>Avaliação</th>
            <th>Estrelas</th>
        </tr>
    </thead>

    <tbody>

        <?php

            $sql = "SELECT * FROM avaliacao";

            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()){

                $ava_id = $row['ava_id'];

                echo "<tr>      
                        <td>{$row['usucli_id']}</td>
                        <td>{$row['avaliacao']}</td>
                        <td>{$row['estrelas']}</td>
                        
                        <td>
                            <a href='editarFormAvaliacao.php?ava_id=$ava_id'>
                                editar
                            </a>

                            <a href='deleteAvaliacao.php?ava_id=$ava_id'
                            onclick=\"return confirm('Deseja realmente excluir
                            a avaliação {$row['usucli_id']}?');\"> 
                            
                            <img src='../img/lixeira.png' width='10' height='10'>  
                            
                            </a>
                        </td>
                    </tr>";
            }

        ?>

    </tbody>
</table>

</div>

<br>

<footer>
    <p class="mb-0">&copy; <?= date('Y') ?> - Sabor na chapa</p>
</footer>

</body>
</html>