<?php
/*Aqui virá o código de busca 
utilizando o comando SQL*/
include "../conexao.php";
//include"protege.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulário da Categoria</title>

<style>
*{
    box-sizing: border-box;
}

body{
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f7fb;
    color: #212529;
}

.page-header{
    min-height: 300px;
    background-color: #e64b23;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 40px 20px 90px;
}

.page-header .conteudo-header{
    max-width: 800px;
}

.page-header .badge{
    display: inline-block;
    background: white;
    color: #e64b23;
    padding: 7px 14px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: bold;
    margin-bottom: 15px;
}

.page-header h1{
    margin: 0 0 10px;
    font-size: 42px;
}

.page-header p{
    margin: 0;
    font-size: 17px;
}

.content-card{
    width: calc(100% - 40px);
    max-width: 1000px;
    margin: -55px auto 40px;
    background: white;
    border-radius: 22px;
    box-shadow: 0 12px 35px rgba(0,0,0,.10);
    padding: 40px;
    position: relative;
    z-index: 2;
}

.topo-card{
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 25px;
}

.topo-card h2{
    margin: 0;
    font-size: 25px;
}

.logo{
    width: 90px;
    height: 90px;
    object-fit: contain;
    border-radius: 15px;
}

.grupo{
    text-align: left;
    width: 100%;
    margin: 0 auto 20px;
}

.grupo label{
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

.caixa{
    width: 100%;
    padding: 12px 14px;
    margin: 0;
    border: 1px solid #dce1e7;
    border-radius: 12px;
    font-size: 16px;
    outline: none;
}

.caixa:focus{
    border-color: #999;
    box-shadow: 0 0 0 3px rgba(0,0,0,.05);
}

.botoes{
    display: flex;
    gap: 12px;
    margin-top: 10px;
    margin-bottom: 30px;
}

.btn-form{
    border: none;
    border-radius: 12px;
    padding: 12px 22px;
    font-weight: 700;
    cursor: pointer;
    font-size: 15px;
}

.btn-cadastrar{
    background-color: #e64b23;
    color: white;
}

.btn-cancelar{
    background-color: #212529;
    color: white;
}

.table-card{
    background: white;
    border-radius: 22px;
    box-shadow: 0 8px 25px rgba(0,0,0,.08);
    overflow: hidden;
    border: 1px solid #eee;
}

.table-title{
    padding: 22px 25px;
    font-size: 21px;
    font-weight: bold;
}

table{
    width: 100%;
    border-collapse: collapse;
}

thead{
    background-color: #212529;
    color: white;
}

th, td{
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

th{
    font-weight: bold;
}

td a{
    color: #e64b23;
    text-decoration: none;
    font-weight: bold;
    margin-right: 12px;
}

td a:hover{
    text-decoration: underline;
}

.footer{
    background-color: #e64b23;
    color: white;
    text-align: center;
    padding: 35px 20px;
    margin-top: 0;
}

.footer p{
    margin: 0;
}

@media (max-width: 700px){
    .page-header{
        min-height: 250px;
        padding-bottom: 70px;
    }

    .page-header h1{
        font-size: 32px;
    }

    .content-card{
        width: calc(100% - 24px);
        margin-top: -35px;
        padding: 25px;
    }

    .topo-card{
        flex-direction: column;
        text-align: center;
    }

    .botoes{
        flex-direction: column;
    }

    .btn-form{
        width: 100%;
    }

    .table-card{
        overflow-x: auto;
    }

    table{
        min-width: 650px;
    }
}
</style>
</head>

<body>

<header class="page-header">
    <div class="conteudo-header">
        <div class="badge">SABOR NA CHAPA</div>
        <h1>Cadastro da Categoria</h1>
        <p>Cadastre e gerencie as categorias dos produtos.</p>
    </div>
</header>

<div class="content-card">

    <div class="topo-card">
        <h2>Dados da categoria</h2>
        <img src="../imagens/LOGO TCC.jpeg" class="logo" alt="Logo Sabor na Chapa">
    </div>

    <form method="post" action="insertCategoria.php" enctype="multipart/form-data">

        <input type="hidden" name="cat_id" class="caixa">

        <div class="grupo">
            <label for="cat_nome">Nome da Categoria:</label>
            <input type="text" id="cat_nome" name="cat_nome" class="caixa">
        </div>

        <div class="botoes">
            <input type="submit" value="CADASTRAR" class="btn-form btn-cadastrar">
            <input type="reset" value="CANCELAR" class="btn-form btn-cancelar">
        </div>

    </form>

    <div class="table-card">
        <div class="table-title">Categorias cadastradas</div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    //Verifica se há registros retornados
                    $sql = "SELECT * FROM categoria";

                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                        $cat_id = $row['cat_id'];
                        echo "<tr>
                                <td>{$row['cat_id']}</td>
                                <td>{$row['cat_nome']}</td>
                                <td>
                                    <a href='EditarFormCategoria.php?cat_id=$cat_id'>Editar</a>
                                    <a href='deleteCategoria.php?cat_id=$cat_id'
                                    onclick=\"return confirm('Deseja realmente excluir a Categoria {$row['cat_id']}?');\">
                                    Excluir
                                    </a>
                                </td>
                              </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>

<footer class="footer">
    <p>Sabor na Chapa &copy; 2026 - Todos os direitos reservados.</p>
</footer>

</body>
</html>
