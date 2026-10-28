<?php
// CONEXÃO COM O BANCO DE DADOS
include "conexao.php";

// BUSCA PELO NOME DO LANCHE
$busca = isset($_GET['busca']) ? trim($_GET['busca']) : '';

// CONSULTA DOS LANCHES
if ($busca != '') {
    $busca_segura = $conn->real_escape_string($busca);
    $sql = "SELECT * FROM lanches
            WHERE lan_nome LIKE '%$busca_segura%'
            ORDER BY lan_id DESC";
} else {

    $sql = "SELECT * FROM lanches
            ORDER BY lan_id DESC";
}


// EXECUTA A CONSULTA DOS LANCHES
$result = $conn->query($sql);

// DETALHES DO LANCHE
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// CONSULTA DO LANCHE SELECIONADO
$lancheDetalhes = null;

if ($id > 0) {
    $sqlDetalhes = "SELECT * FROM lanches WHERE lan_id = $id";
    $resultDetalhes = $conn->query($sqlDetalhes);
    if ($resultDetalhes && $resultDetalhes->num_rows > 0) {
        $lancheDetalhes = $resultDetalhes->fetch_assoc();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor na Chapa</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_cardapio.css">
</head>

<body>
    <header class="hero">


        <!-- BARRA DE NAVEGAÇÃO-->
        <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="imagens/logo.png" alt="Logo">
            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cardapio.php">
                            Cardápio
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="sobrenos.php">
                            Sobre Nós
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="faleconosco.php">
                            Fale Conosco
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            Entrar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <div class="container hero-content text-center">
            <span class="badge rounded-pill mb-3">
                LANCHONETE
            </span>
            <h1>
                Seu lanche favorito<br>
                <span>em um só lugar!</span>
            </h1>
            <p>
                Lanches e bebidas.
            </p>
        </div>
    </header>

    <main id="cardapio" class="container py-5">
        <div class="text-center mb-5">
            <h2>
                Nosso Cardápio
            </h2>
        </div>



        <!--CAMPO DE BUSCA-->

        <form method="GET" class="mb-5">
            <div class="input-group">

                <!-- Campo onde o usuário digita o nome do lanche -->
                <input
                    type="text"
                    name="busca"
                    class="form-control"
                    placeholder="Digite o nome do lanche..."
                    value="<?= htmlspecialchars($busca) ?>">

                <!-- Botão responsável por realizar a busca -->
                <button type="submit" class="btn btn-danger">
                    Buscar
                </button>
            </div>
        </form>



        <!--TÍTULO DA CATEGORIA LANCHES-->

        <div class="titulo mb-5">
            LANCHES
        </div>

        <!--LISTAGEM DOS LANCHES DO BANCO-->
        <div class="row g-4">
            <?php
            // Verifica se existem lanches encontrados.
            if ($result && $result->num_rows > 0): while ($lanche = $result->fetch_assoc()):
            ?>

            <!-- CARD DO LANCHE-->

            <div class="col-md-6 col-lg-4">

                <div class="menu-card h-100">
                    <?php
                        // IMAGEM DO LANCHE
                        // Verifica se existe uma imagem cadastrada.
                        if (!empty($lanche['lan_foto'])) {$foto = $lanche['lan_foto'];
                            } else {$foto = '';
                            }
                            ?>

                            <?php if ($foto != ''): ?>
                                <!-- IMAGEM CADASTRADA-->
                                <img src="<?= htmlspecialchars($foto) ?>"alt="<?= htmlspecialchars($lanche['lan_nome']) ?>"class="img-fluid rounded mb-3">
                            <?php else: ?>

                            <!--ESPAÇO PARA IMAGEM CASO NÃO TENHA FOTO-->
                        <div class="img_geral">
                        </div>
                    <?php endif; ?>



                    <!--NOME DO LANCHE-->

                    <h3>
                        <?= htmlspecialchars($lanche['lan_nome']) ?>
                    </h3>



                    <!--DESCRIÇÃO DO LANCHE-->

                    <p>

                        <?= htmlspecialchars($lanche['lan_descricao']) ?>

                    </p>



                    <!-- PREÇO DO LANCHE-->

                    <div class="preco">
                        R$
                        <?= number_format($lanche['lan_preco'],2,',','.') ?>

                    </div>

                    <div class="mt-3">
                        <a
                            href="index.php?id=<?= $lanche['lan_id'] ?>#detalhes" class="btn btn-danger">
                            Ver detalhes
                        </a>
                    </div>
                </div>
            </div>
        <?php

        // Finaliza o while dos lanches.
        endwhile;
        else:
        ?>

        <!--CASO NÃO ENCONTRE NENHUM LANCHE-->
        <div class="col-12 text-center text-muted">
            <p>
                Nenhum lanche encontrado.
            </p>
        </div>
    <?php endif; ?>
    </div>


    <!--MENSAGEM DA BUSCA-->
    <?php if (!empty($busca)): ?>
        <div class="alert alert-info mt-4">
            Exibindo resultados para:
            <strong><?= htmlspecialchars($busca) ?></strong>
        </div>
    <?php endif; ?>


        <!--DETALHES DO LANCHE SELECIONADO-->

    <?php if ($lancheDetalhes): ?>

        <div
            id="detalhes"
            class="container mt-5 mb-5">

            <!--TÍTULO DA ÁREA DE DETALHES-->

            <div class="text-center mb-4">
                <h2>
                    Detalhes do Lanche
                </h2>
            </div>


            <!--CARD DE DETALHES-->

            <div class="card shadow-sm">
                <div class="row g-0">
                    <!--IMAGEM DO LANCHE-->
                    <div class="col-md-5">
                        <?php
                        // Verifica se o lanche possui foto.
                        if (!empty($lancheDetalhes['lan_foto'])) {

                            $fotoDetalhes =
                                $lancheDetalhes['lan_foto'];

                        } else {

                            // Caso não possua foto,
                            // não coloca uma imagem inexistente.
                            $fotoDetalhes = '';
                        }
                        ?>

                        <?php if ($fotoDetalhes != ''): ?>

                            <img src="<?= htmlspecialchars($fotoDetalhes) ?>" alt="<?= htmlspecialchars($lancheDetalhes['lan_nome']) ?>
                            "class="img-fluid rounded-start" style="width:100%; height:100%; object-fit:cover;">

                        <?php else: ?>

                            <!-- Caso não exista foto -->
                            <div
                                class="img_geral"
                                style="height:100%; min-height:300px;">
                            </div>
                        <?php endif; ?>
                    </div>


                        <!--INFORMAÇÕES DO LANCHE -->

                    <div class="col-md-7">
                        <div class="card-body">

                                <!-- Nome lanche-->
                            <h3 class="card-title">
                                <?= htmlspecialchars($lancheDetalhes['lan_nome']) ?>
                            </h3>


                            <!--ID lanche-->
                            <p>
                                <strong>
                                    Código:
                                </strong>
                                <?= $lancheDetalhes['lan_id'] ?>
                            </p>


                            <!--Descrição lanche-->
                            <p>
                                <strong>
                                    Descrição:
                                </strong>
                                <br>
                                <?= nl2br(htmlspecialchars($lancheDetalhes['lan_descricao'])) ?>
                            </p>

                            <!--Preço lanche-->
                            <p>
                                <strong>
                                    Preço:
                                </strong>
                                <span class="preco">
                                    R$
                                    <?= number_format($lancheDetalhes['lan_preco'],2,',','.') ?>
                                </span>
                            </p>

                            <!-- BOTÃO PARA FECHAR OS DETALHES-->
                            <a
                                href="index.php#cardapio" class="btn btn-secondary mt-2">
                                    Voltar para o cardápio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <!--LANCHES GOURMET-->

    <div class="titulo2 mb-5">
        LANCHES GOURMET
    </div>

    <div class="row g-4">

        <div class="col-md-6 col-lg-4">
            <div class="menu-card h-100">
                <div class="img_geral"></div>
                    <h3>
                        X-Burger G.
                    </h3>
                    <p>
                        Pão, hambúrguer artesanal, queijo, alface,
                        tomate, molho especial, maionese da casa.
                    </p>
                    <div class="preco">
                        R$ 18,90
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="menu-card h-100">
                    <div class="img_geral"></div>
                    <h3>
                        X-Frango G.
                    </h3>
                    <p>
                        Pão, Frango grelhado, queijo, alface,
                        tomate, maionese da casa e molho especial.
                    </p>
                    <div class="preco">
                        R$ 20,90
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="menu-card h-100">
                    <div class="img_geral"></div>
                    <h3>
                        hot dog G.
                    </h3>
                    <p>
                        Salsicha, molho de tomate, milho, batata palha,
                        molho especial, maionese da casa e cheddar.
                    </p>
                    <div class="preco">
                        R$ 14,90
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="menu-card h-100">
                    <div class="img_geral"></div>
                    <h3>
                        X-bacon G.
                    </h3>
                    <p>
                        Pão, hambúrguer artesanal, bacon fatiado,
                        queijo prato, molho especial, maionese da casa
                        e tomate picado.
                    </p>
                    <div class="preco">
                        R$ 12,90
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--RODAPÉ-->

    <footer>
        <div class="container text-center">
            <strong>
                Sabor na Chapa
            </strong>
            <p>
                Rua do Sabor, 123 • São Paulo - SP
            </p>
            <small>
                © 2026 Sabor na Chapa.
                Todos os direitos reservados.
            </small>
        </div>
    </footer>
</body>
</html>