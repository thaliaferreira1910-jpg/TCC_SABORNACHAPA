<?php

// Conexão com o banco.
require_once __DIR__ . "/conexao.php";

$erroGaleria = "";
// Busca as 5 fotos mais recentes.
$sqlGaleria = "SELECT
                    f.gf_id AS id,
                    f.caminho_imagem,
                    f.legenda,
                    f.data_cadastro,
                    g.titulo AS titulo_galeria,
                    g.descricao
               FROM galeria_fotos AS f
               INNER JOIN galeria AS g
                   ON g.id = f.galeria_id
               ORDER BY f.data_cadastro DESC, f.gf_id DESC
               LIMIT 5";

$resultGaleria = $conn->query($sqlGaleria);

$imagensGaleria = [];

if ($resultGaleria && $resultGaleria->num_rows > 0) {
    while ($imagemGaleria = $resultGaleria->fetch_assoc()) {

        // Ajusta o caminho para a pasta uploads ao lado do index.php.
        // Exemplo: "../uploads/foto.jpg" vira "uploads/foto.jpg".
        $caminho = str_replace(
            '\\',
            '/',
            trim($imagemGaleria['caminho_imagem'] ?? '')
        );

        $imagemGaleria['caminho_imagem'] = preg_replace(
            '#^\.\./uploads/#',
            'uploads/',
            $caminho
        );

        $imagensGaleria[] = $imagemGaleria;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor na Chapa</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background-color: #10151c;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
        }

        /*NAVBAR*/
        .navbar {
            background-color: #111820 !important;
        }

        .navbar-brand {
            color: white !important;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .navbar-nav .nav-link {
            color: white !important;
            margin: 0 8px;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #e64b23 !important;
        }

        /*CARROSSEL*/
        #inicio {
            padding-top: 20px;
        }

        .carousel {
            max-width: 1200px;
            margin: auto;
            overflow: hidden;
            border-radius: 18px;
        }

        .carousel-item img {
            width: 100%;
            height: 430px;
            object-fit: cover;
        }

        /*BANNER - FAÇA SEU PEDIDO*/
        .banner-pedido {
            width: 96%;
            max-width: 1500px;
            height: 195px;
            margin: 30px auto 45px;
            position: relative;
            overflow: hidden;
            border: 3px solid #f26a21;
            border-radius: 18px;
            background-image: url("imagens/pedido.jpg");
            background-size: cover;
            background-position: center;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
            transition: 0.3s;
        }

        .banner-pedido:hover {
            transform: scale(1.01);
            box-shadow: 0 5px 25px rgba(242, 90, 36, 0.5);
        }

        .banner-pedido::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.10);
            z-index: 1;
        }

        .banner-pedido a {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
            color: white;
            z-index: 2;
        }

        /*PINCELADA LARANJA*/
        .pincel-laranja {
            position: absolute;
            left: 31%;
            top: 12%;
            width: 43%;
            height: 76%;
            background: #f15a24;
            clip-path: polygon(
                4% 18%,
                13% 8%,
                25% 11%,
                37% 4%,
                49% 10%,
                61% 5%,
                74% 11%,
                87% 7%,
                97% 18%,
                94% 30%,
                99% 43%,
                94% 56%,
                98% 70%,
                89% 84%,
                76% 78%,
                63% 91%,
                51% 84%,
                38% 94%,
                26% 84%,
                14% 91%,
                4% 79%,
                8% 65%,
                1% 51%,
                7% 38%,
                2% 27%
            );
            z-index: 2;
        }

        /*PINCELADA PRETA*/
        .pincel-preto {
            position: absolute;
            left: 32.5%;
            top: 17%;
            width: 40%;
            height: 66%;
            background: #080808;
            clip-path: polygon(
                3% 20%,
                11% 10%,
                23% 13%,
                35% 6%,
                48% 12%,
                61% 7%,
                73% 13%,
                87% 8%,
                98% 20%,
                93% 32%,
                99% 45%,
                94% 57%,
                98% 72%,
                88% 84%,
                75% 78%,
                63% 90%,
                51% 82%,
                38% 92%,
                27% 82%,
                14% 89%,
                4% 77%,
                8% 63%,
                2% 50%,
                7% 37%,
                2% 27%
            );
            z-index: 3;
        }

        /*RISCOS DA PINCELADA*/
        .risco {
            position: absolute;
            background: #111;
            z-index: 4;
            transform: rotate(-8deg);
        }

        .risco1 {
            width: 35px;
            height: 5px;
            left: 33%;
            top: 27%;
        }

        .risco2 {
            width: 25px;
            height: 5px;
            left: 35%;
            top: 70%;
        }

        .risco3 {
            width: 32px;
            height: 5px;
            left: 70%;
            top: 27%;
        }

        .risco4 {
            width: 25px;
            height: 4px;
            left: 69%;
            top: 70%;
        }

        /*TEXTO DO BANNER*/
        .texto-pedido {
            position: absolute;
            left: 53%;
            top: 50%;
            transform: translate(-50%, -50%) rotate(-2deg);
            width: 38%;
            text-align: center;
            z-index: 6;
            font-family: Impact, Haettenschweiler, "Arial Black", sans-serif;
            font-size: clamp(28px, 3.2vw, 54px);
            line-height: 0.95;
            letter-spacing: 1px;
            color: white;
            text-shadow:
                3px 3px 0 #222,
                4px 4px 5px rgba(0, 0, 0, 0.8);
        }

        .texto-pedido span {
            display: block;
            margin-top: 10px;
            color: #f15a24;
            font-size: 1.05em;
            text-shadow:
                3px 3px 0 #000,
                4px 4px 5px rgba(0, 0, 0, 0.8);
        }

        /*ÍCONE DA MÃO*/
        .icone-pedido {
            position: absolute;
            right: 17%;
            top: 50%;
            transform: translateY(-50%);
            z-index: 7;
            font-size: 58px;
            color: white;
            filter: drop-shadow(3px 3px 3px #000);
            animation: clique 1.4s infinite;
        }

        @keyframes clique {
            0% {
                transform: translateY(-50%) scale(1);
            }

            50% {
                transform: translateY(-50%) scale(1.12);
            }

            100% {
                transform: translateY(-50%) scale(1);
            }
        }

        /*CARDÁPIO*/
        .titulo {
            text-align: center;
            color: #e64b23;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .card {
            background-color: #111820;
            color: white;
            border: 1px solid #333;
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: #e64b23;
        }

        .card img {
            width: 100%;
            height: 230px;
            object-fit: cover;
        }

        .card-title {
            color: #e64b23;
            font-weight: bold;
        }

        /*AVALIAÇÕES*/
        .avaliacao {
            background-color: #111820;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #333;
            height: 100%;
        }

        .avaliacao i {
            color: #ffc107;
        }

        /*FOOTER*/
        footer {
            background-color: #0b1016;
            margin-top: 50px;
            padding: 40px 20px 20px;
        }

        footer h5 {
            color: #e64b23;
            font-weight: bold;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            color: #e64b23;
        }

        .social-icons a {
            font-size: 25px;
            margin-right: 15px;
        }

        /*CELULAR*/
        @media (max-width: 768px) {
            .carousel-item img {
                height: 280px;
            }

            .banner-pedido {
                height: 150px;
                width: 94%;
                border-radius: 15px;
            }

            .pincel-laranja {
                left: 19%;
                width: 65%;
            }

            .pincel-preto {
                left: 21%;
                width: 61%;
            }

            .texto-pedido {
                left: 51%;
                width: 57%;
                font-size: 20px;
            }

            .texto-pedido span {
                margin-top: 6px;
            }

            .icone-pedido {
                right: 4%;
                font-size: 38px;
            }
        }
    </style>
</head>

<body>
    <!--NAVBAR-->
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

    <!--======================INÍCIO DO CARROSSEL=======================-->

    <main id="inicio">

        <?php if ($erroGaleria != ""): ?>

            <div class="container mt-4">
                <div class="alert alert-danger">
                    <?= htmlspecialchars($erroGaleria, ENT_QUOTES, "UTF-8") ?>
                </div>
            </div>

        <?php elseif (count($imagensGaleria) > 0): ?>

            <section class="container mt-4"
                     aria-label="Destaques da galeria">

                <div id="carouselGaleria"
                     class="carousel slide carousel-fade shadow rounded overflow-hidden"
                     data-bs-ride="carousel">

                    <div class="carousel-indicators">

                        <?php foreach ($imagensGaleria as $indice => $imagem): ?>

                            <button type="button"
                                    data-bs-target="#carouselGaleria"
                                    data-bs-slide-to="<?= $indice ?>"
                                    class="<?= $indice === 0 ? 'active' : '' ?>"
                                    aria-current="<?= $indice === 0 ? 'true' : 'false' ?>"
                                    aria-label="Slide <?= $indice + 1 ?>">
                            </button>

                        <?php endforeach; ?>

                    </div>

                    <div class="carousel-inner">

                        <?php foreach ($imagensGaleria as $indice => $imagem): ?>

                            <div class="carousel-item <?= $indice === 0 ? 'active' : '' ?>"
                                 data-bs-interval="4000">

                                <!--
                                    O banco guarda caminhos como:
                                    uploads/galeria/nome-da-imagem.jpg
                                -->
                                <img
                                    src="<?= htmlspecialchars(
                                        $imagem["caminho_imagem"] ?? "",
                                        ENT_QUOTES,
                                        "UTF-8"
                                    ) ?>"
                                    class="d-block w-100"
                                    alt="<?= htmlspecialchars(
                                        $imagem["legenda"] ?: $imagem["titulo_galeria"],
                                        ENT_QUOTES,
                                        "UTF-8"
                                    ) ?>"
                                >

                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">

                                    <h5>
                                        <?= htmlspecialchars(
                                            $imagem["titulo_galeria"],
                                            ENT_QUOTES,
                                            "UTF-8"
                                        ) ?>
                                    </h5>

                                    <?php if (!empty($imagem["legenda"])): ?>

                                        <p>
                                            <?= htmlspecialchars(
                                                $imagem["legenda"],
                                                ENT_QUOTES,
                                                "UTF-8"
                                            ) ?>
                                        </p>

                                    <?php elseif (!empty($imagem["descricao"])): ?>

                                        <p>
                                            <?= htmlspecialchars(
                                                $imagem["descricao"],
                                                ENT_QUOTES,
                                                "UTF-8"
                                            ) ?>
                                        </p>

                                    <?php endif; ?>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                    <button class="carousel-control-prev"
                            type="button"
                            data-bs-target="#carouselGaleria"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"
                              aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>

                    <button class="carousel-control-next"
                            type="button"
                            data-bs-target="#carouselGaleria"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon"
                              aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>

                </div>

            </section>

        <?php else: ?>

            <div class="container mt-4">
                <div class="alert alert-info mb-0">
                    Ainda não existem imagens cadastradas na galeria.
                </div>
            </div>

        <?php endif; ?>

        <!--============FINAL DO CARROSSEL=========================-->

        <!--BANNER FAÇA SEU PEDIDO-->

        <div class="banner-pedido">
            <a href="pedido.html">

                <!-- PINCELADA LARANJA -->
                <div class="pincel-laranja"></div>

                <!-- PINCELADA PRETA -->
                <div class="pincel-preto"></div>

                <!-- RISCOS -->
                <div class="risco risco1"></div>
                <div class="risco risco2"></div>
                <div class="risco risco3"></div>
                <div class="risco risco4"></div>

                <!-- TEXTO -->
                <div class="texto-pedido">
                    FAÇA SEU

                    <span>
                        PEDIDO AQUI!
                    </span>
                </div>

                <!-- MÃOZINHA -->
                <div class="icone-pedido">
                    <i class="bi bi-hand-index-thumb"></i>
                </div>

            </a>
        </div>

        <!-- ==========================
             CARDÁPIO
        ========================== -->

        <section id="cardapio" class="container">

            <h2 class="titulo">
                Os Mais Pedidos
            </h2>

            <div class="row g-4">

                <!-- PRODUTO 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">

                        <img src="imagens/l3.jpg"
                             class="card-img-top"
                             alt="Hambúrguer Especial">

                        <div class="card-body">

                            <h5 class="card-title">
                                Hambúrguer Especial
                            </h5>

                            <p class="card-text">
                                Hambúrguer artesanal com ingredientes
                                selecionados e muito sabor.
                            </p>

                        </div>
                    </div>
                </div>

                <!-- PRODUTO 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">

                        <img src="imagens/l1.jpg"
                             class="card-img-top"
                             alt="Hambúrguer Clássico">

                        <div class="card-body">

                            <h5 class="card-title">
                                Hambúrguer Clássico
                            </h5>

                            <p class="card-text">
                                Um hambúrguer clássico preparado
                                especialmente para você.
                            </p>

                        </div>
                    </div>
                </div>

                <!-- PRODUTO 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">

                        <img src="imagens/l2.jpg"
                             class="card-img-top"
                             alt="Hambúrguer Premium">

                        <div class="card-body">

                            <h5 class="card-title">
                                Hambúrguer Premium
                            </h5>

                            <p class="card-text">
                                Uma combinação especial de sabores
                                para deixar seu pedido ainda melhor.
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ==========================
             AVALIAÇÕES
        ========================== -->

        <section class="container mt-5">

            <h2 class="titulo">
                Avaliações dos Clientes
            </h2>

            <div class="row g-4">

                <!-- AVALIAÇÃO 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="avaliacao">

                        <div>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>

                        <p class="mt-3">
                            "Hambúrguer muito saboroso!"
                        </p>

                        <strong>
                            Cliente
                        </strong>

                    </div>
                </div>

                <!-- AVALIAÇÃO 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="avaliacao">

                        <div>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>

                        <p class="mt-3">
                            "Ótimo atendimento e comida excelente."
                        </p>

                        <strong>
                            Cliente
                        </strong>

                    </div>
                </div>

                <!-- AVALIAÇÃO 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="avaliacao">

                        <div>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>

                        <p class="mt-3">
                            "Com certeza vou pedir novamente!"
                        </p>

                        <strong>
                            Cliente
                        </strong>

                    </div>
                </div>

                <!-- AVALIAÇÃO 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="avaliacao">

                        <div>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>

                        <p class="mt-3">
                            "Um dos melhores hambúrgueres que já comi."
                        </p>

                        <strong>
                            Cliente
                        </strong>

                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- ==========================
         RODAPÉ
    ========================== -->

    <footer id="sobre">
        <div class="container">
            <div class="row">

                <div class="col-md-6">

                    <h5>
                        Sabor na Chapa
                    </h5>

                    <p>
                        O melhor sabor para deixar
                        seu momento ainda mais especial.
                    </p>

                </div>

                <div class="col-md-6">

                    <h5>
                        Contato
                    </h5>

                    <p>
                        <i class="bi bi-telephone"></i>
                        (12) 4002-8922
                    </p>

                    <p>
                        <i class="bi bi-envelope"></i>
                        contato@sabornachapa.com
                    </p>

                    <div class="social-icons">

                        <a href="#">
                            <i class="bi bi-instagram"></i>
                        </a>

                        <a href="#">
                            <i class="bi bi-facebook"></i>
                        </a>

                        <a href="#">
                            <i class="bi bi-whatsapp"></i>
                        </a>

                    </div>

                </div>

            </div>

            <hr>

            <p class="text-center mb-0">
                © 2026 Sabor na Chapa -
                Todos os direitos reservados.
            </p>

        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>