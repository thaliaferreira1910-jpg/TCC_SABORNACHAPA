<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sobre nós</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #10151c;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}


/* =========================
   NAVBAR
========================= */

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


/* =========================
   FOTO ANTIGA
========================= */

.foto-antiga {
    width: 100%;
    margin: 0;
    padding: 0;
}

.foto-antiga img {
    width: 100%;
    height: auto;
    display: block;
}


/* =========================
   NOSSA HISTÓRIA
========================= */

.sobre {
    display: flex;
    width: 100%;
    align-items: stretch;
}

.outdoor {
    width: 50%;
    display: flex;
}

.outdoor img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: contain;
}

.texto {
    width: 50%;
    background-color: #188a3b;
    color: white;
    padding: 60px;

    display: flex;
    flex-direction: column;
    justify-content: center;
}

.texto h2 {
    color: rgba(255, 187, 0, 0.93);
    font-size: 35px;
    margin-bottom: 25px;
}

.texto p {
    font-size: 18px;
    line-height: 1.6;
}


/* =========================
   CULTURA
========================= */

.cultura {
    width: 100%;
    margin: 0;
    padding: 0;
}

.cultura img {
    width: 100%;
    height: auto;
    display: block;
}


/* =========================
   O QUE FAZEMOS
========================= */

.oquefazemos {
    display: flex;
    width: 100%;
    align-items: stretch;
}

.funcionarios {
    width: 50%;
    display: flex;
}

.funcionarios img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: contain;
}

.oquefazemos2 {
    width: 50%;
    background-color: rgba(255, 187, 0, 0.93);
    color: white;
    padding: 60px;

    display: flex;
    flex-direction: column;
    justify-content: center;
}

.oquefazemos2 h2 {
    color: #e64b23;
    font-size: 35px;
    margin-bottom: 25px;
}

.oquefazemos2 p {
    font-size: 18px;
    line-height: 1.6;
}


/* =========================
   VALORES
========================= */

.valores {
    width: 100%;
    margin: 0;
    padding: 0;
}

.valores img {
    width: 100%;
    height: auto;
    display: block;
}


/* =========================
   FOOTER
========================= */

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


/* =========================
   RESPONSIVO
========================= */

@media (max-width: 768px) {

    .navbar-brand img {
        width: 60px;
        height: 60px;
    }


    /* HISTÓRIA */

    .sobre {
        flex-direction: column;
    }

    .outdoor,
    .texto {
        width: 100%;
    }

    .outdoor img {
        width: 100%;
        height: auto;
    }

    .texto {
        padding: 40px 25px;
    }

    .texto h2 {
        font-size: 30px;
    }

    .texto p {
        font-size: 16px;
    }


    /* O QUE FAZEMOS */

    .oquefazemos {
        flex-direction: column;
    }

    .funcionarios,
    .oquefazemos2 {
        width: 100%;
    }

    .funcionarios img {
        width: 100%;
        height: auto;
    }

    .oquefazemos2 {
        padding: 40px 25px;
    }

    .oquefazemos2 h2 {
        font-size: 30px;
    }

    .oquefazemos2 p {
        font-size: 16px;
    }


    /* FOOTER */

    footer {
        text-align: center;
    }

    .social-icons a {
        margin: 0 7px;
    }

}

/* RESPONSIVIDADE */

@media (max-width: 768px) {

    .historia {
        flex-direction: column;
        padding: 50px 25px;
    }

    .historia-texto,
    .historia-foto {
        width: 100%;

    }

    .historia-texto h1 {
        font-size: 40px;
    }

    .cultura-container {
        flex-direction: column;
    }

    .cultura-item {
        width: 100%;
    }

    .missao-visao {
        flex-direction: column;
    }

    .missao,
    .visao {
        width: 100%;
    }

    .valores-container {
        flex-wrap: wrap;
    }

    .valores-container div {
        width: 30%;
    }
}
        /*footer*/
        
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
</style>
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
    <main>

<!-- FOTO ANTIGA -->
<section class="foto-antiga">
    <img src="imagens/frenteloja.jpeg" alt="Antiga lanchonete Sabor na Chapa">
</section>


<!-- NOSSA HISTÓRIA -->
<section class="sobre">
    <div class="outdoor">
        <img src="imagens/outdoor.jpeg" alt="Sabor na Chapa">
    </div>

    <div class="texto">
        <h2>Nossa História</h2>
        <p>
        Tudo começou com uma paixão simples: fazer lanches de verdade, com sabor caseiro e aquele toque especial que só uma boa chapa pode dar.
A Sabor na Chapa nasceu do sonho de transformar ingredientes simples em experiências inesquecíveis.
Entre testes de receitas, noites longas e muita dedicação, criamos mais do que uma lanchonete — criamos um lugar onde cada cliente se sente em casa.
        </p>
    </div>
</section>


<!-- CULTURA -->
<section class="cultura">

<img src="imagens/cultura.jpeg">

</section>


<!-- O QUE FAZEMOS -->
<section class="oquefazemos">

    <div class="oquefazemos2">

        <h2>O que fazemos e para quem?</h2>

        <p>
        Na Sabor na Chapa, preparamos hambúrgueres, lanches e porções feitos na hora, com ingredientes selecionados e muito capricho.
Nosso foco é para quem: Ama comida bem feita, Valoriza sabor caseiro, Quer uma refeição rápida, mas sem abrir mão da qualidade.
Seja para um lanche rápido, um encontro com amigos ou aquele momento de conforto, estamos aqui para servir.
        </p>

    </div>


    <div class="funcionarios">
    <img src="imagens/funcionarios.jpeg" alt="Sabor na Chapa">
    </div>

</section>


<!-- VALORES -->
<section class="valores">

    <div class="valores">
    <img src="imagens/valores.jpeg" alt="Sabor na Chapa">
    </div>

</section>

</main>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>
    
</body>
</html>