<?php

include "../conexao.php";
/*
if (!isset($_GET['usu_id'])) {
    header("Location: ");
    exit;
}
    */

$usu_id = intval($_GET['usu_id']);
$sql = "SELECT * FROM usuario_adm WHERE usu_id = $usu_id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Administrador não encontrado.");
}

$lanches = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Administrador</title>

<style>
*{
    box-sizing:border-box;
}

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f4f7fb;
    color:#212529;
}

.cabecalho{
    background:#e64b23;
    color:white;
    padding:55px 20px 90px;
    text-align:center;
}

.cabecalho .marca{
    display:inline-block;
    background:rgba(255,255,255,.18);
    padding:8px 18px;
    border-radius:30px;
    font-size:14px;
    font-weight:bold;
    margin-bottom:15px;
}

.cabecalho h1{
    margin:0 0 8px;
    font-size:38px;
}

.cabecalho p{
    margin:0;
    font-size:17px;
}

.container{
    background:white;
    width:min(600px, calc(100% - 30px));
    margin:-55px auto 40px;
    padding:35px;
    border-radius:22px;
    box-shadow:0 12px 35px rgba(0,0,0,.10);
    position:relative;
}

.topo-form{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:15px;
    margin-bottom:25px;
}

.topo-form h2{
    margin:0;
    font-size:28px;
}

.topo-form p{
    color:#6c757d;
    margin:6px 0 0;
}

.grupo{
    text-align:left;
    margin-bottom:18px;
}

.grupo label{
    display:block;
    margin-bottom:7px;
    font-weight:bold;
}

.caixa{
    width:100%;
    padding:13px 14px;
    border:1px solid #dce1e7;
    border-radius:12px;
    font-size:15px;
}

.caixa:focus{
    outline:none;
    border-color:#6c757d;
    box-shadow:0 0 0 3px rgba(33,37,41,.08);
}

.botoes{
    display:flex;
    gap:10px;
    margin-top:25px;
}

.botao{
    flex:1;
    padding:13px 20px;
    border-radius:12px;
    font-weight:bold;
    text-decoration:none;
    cursor:pointer;
    text-align:center;
    font-size:15px;
}

.voltar{
    color:#212529;
    border:1px solid #adb5bd;
    background:white;
}

.editar{
    color:white;
    border:1px solid #212529;
    background:#212529;
}

footer{
    background:#e64b23;
    color:white;
    text-align:center;
    padding:30px 15px;
}

footer p{
    margin:0;
}

@media(max-width:600px){
    .container{
        padding:25px;
    }

    .cabecalho h1{
        font-size:30px;
    }

    .topo-form{
        display:block;
    }

    .botoes{
        flex-direction:column;
    }
}
</style>
</head>

<body>

<header class="cabecalho">
    <div class="marca">SABOR NA CHAPA</div>
    <h1>Editar Administrador</h1>
    <p>Atualize os dados do administrador.</p>
</header>

<div class="container">

    <div class="topo-form">
        <div>
            <h2>Dados do administrador</h2>
            <p>Altere os dados e clique em editar.</p>
        </div>
    </div>

    <form method="post" action="updateAdm.php" enctype="multipart/form-data">

        <input type="hidden" name="usu_id" value="<?= $lanches['usu_id']?>">

        <div class="grupo">
            <label for="cpf">CPF</label>
            <input type="text"
                   id="cpf"
                   name="usuAdm_cpf"
                   class="caixa"
                   value="<?= htmlspecialchars($lanches['usuAdm_cpf'])?>">
        </div>

        <div class="grupo">
        <input type="email"
               id="email"
               name="usuAdm_email"
               class="caixa"
              value="<?= htmlspecialchars($lanches['usuAdm_email'] ?? '') ?>">
        </div>

        <div class="grupo">
            <label for="senha">Senha</label>
            <input type="password"
                   id="senha"
                   name="usuAdm_senha"
                   class="caixa"
                   value="<?= htmlspecialchars($lanches['usuAdm_senha'])?>">
        </div>

        <div class="botoes">
            <a href="formAdm.php" class="botao voltar">VOLTAR</a>
            <input type="submit" value="EDITAR" class="botao editar">
        </div>

    </form>
</div>

<footer>
    <p>&copy; <?= date('Y') ?> - Sabor na Chapa</p>
</footer>

</body>
</html>
