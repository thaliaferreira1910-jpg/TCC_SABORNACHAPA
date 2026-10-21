<?php
//include"protege.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Fale Conosco</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Ícones -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet"
        href="css/style.css">
</head>

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #10151c;
}

/* NAVBAR */

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
    margin-left: 8px;
    margin-right: 8px;
    font-weight: 500;
}

.navbar-nav .nav-link:hover {
    color: #e64b23 !important;
}


/* TÍTULO */

.titulo {
    color: white;
    text-align: center;
}

.titulo h1 {
    font-weight: bold;
    margin-bottom: 10px;
}

.titulo p {
    color: #cccccc;
}


/* FORMULÁRIO */

.formulario {
    background-color: #1a222c;
    padding: 35px;
    margin-top: 25px;
    margin-bottom: 30px;

    border-radius: 12px;

    border: 1px solid #343d48;

    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
}

.formulario label {
    color: white;
    font-weight: bold;
    margin-bottom: 7px;
}

.formulario label::after {
    content: "";
}


/* CAMPOS */

.formulario input,
.formulario textarea {
    width: 100%;
    padding: 12px;

    background-color: #10151c;
    color: white;

    border: 1px solid #3d4650;
    border-radius: 6px;

    transition: 0.3s;
}

.formulario input::placeholder,
.formulario textarea::placeholder {
    color: #999;
}

.formulario input:focus,
.formulario textarea:focus {
    background-color: #10151c;
    color: white;

    border-color: #e64b23;

    box-shadow: 0 0 0 2px rgba(230, 75, 35, 0.2);

    outline: none;
}


/* BOTÕES */

.botoes {
    display: flex;
    justify-content: center;
    align-items: center;

    gap: 12px;
    margin-top: 25px;
}

.btn-limpar,
.btn-enviar {
    padding: 11px 28px;

    border: none;
    border-radius: 6px;

    color: white;
    font-weight: bold;

    transition: 0.3s;
}


/* BOTÃO LIMPAR */

.btn-limpar {
    background-color: #dc3545;
}

.btn-limpar:hover {
    background-color: #bb2d3b;
    transform: translateY(-2px);
}


/* BOTÃO ENVIAR */

.btn-enviar {
    background-color: #198754;
}

.btn-enviar:hover {
    background-color: #157347;
    transform: translateY(-2px);
}


/* DETALHE LARANJA */

.formulario::before {
    content: "";
    display: block;

    width: 60px;
    height: 4px;

    

    margin: 0 auto 25px;

    border-radius: 5px;
}


/* FOOTER */

footer {
    background-color: #0b1016;
    color: white;

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


/* RESPONSIVO */

@media (max-width: 576px) {

    .navbar-brand img {
        width: 60px;
        height: 60px;
    }

    .formulario {
        padding: 25px 18px;
    }

    .botoes {
        flex-direction: column;
    }

    .btn-limpar,
    .btn-enviar {
        width: 100%;
        max-width: 250px;
    }

    footer {
        text-align: center;
    }

    .social-icons a {
        margin: 0 7px;
    }
}

</style>


<body>

<!-- NAVBAR -->

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
                    <a class="nav-link" href="#inicio">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#cardapio">
                        Cardápio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#sobre">
                        Sobre Nós
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#faleconosco">
                        Fale Conosco
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="login.html">
                        Entrar
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>


<!-- FORMULÁRIO -->

<main class="container py-5">

    <div class="titulo">

        <h1>
            Fale Conosco
        </h1>

        <p>
            Preencha o que se pede abaixo.
        </p>

    </div>


    <div class="formulario">

        <form>
            <div class="row g-3">

                <!-- NOME -->

                <div class="col-12 col-md-6">

                    <label for="nome"
                        class="form-label">

                        Nome completo:

                    </label>

                    <input type="text"
                        id="nome"
                        class="form-control"
                        placeholder="Digite seu nome"
                        required>

                </div>


                <!-- EMAIL -->

                <div class="col-12 col-md-6">

                    <label for="email"
                        class="form-label">

                        E-mail:

                    </label>

                    <input type="email"
                        id="email"
                        class="form-control"
                        placeholder="Digite seu e-mail"
                        required>

                </div>


                <!-- ASSUNTO -->

                <div class="col-12">

                    <label for="solicitacoes"
                        class="form-label">

                        Assunto:

                    </label>

                    <textarea id="solicitacoes"
                        class="form-control"
                        rows="4"
                        placeholder="Digite alguma observação"></textarea>

                </div>

            </div>


            <!-- BOTÕES -->

            <div class="botoes">

                <button type="reset"
                    class="btn-limpar">

                    <i class="bi bi-trash"></i>
                    Limpar

                </button>


                <button type="submit"
                    class="btn-enviar">

                    <i class="bi bi-send"></i>
                    Enviar

                </button>

            </div>

        </form>

    </div>

</main>


<!-- FOOTER -->

<footer id="sobre">

    <div class="container">

        <div class="row">

            <div class="col-12 col-md-6 mb-4">

                <h5>
                    Sabor na Chapa
                </h5>

                <p>
                    O melhor sabor para deixar
                    seu momento ainda mais especial.
                </p>

            </div>


            <div class="col-12 col-md-6">

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

            ©️ 2026 Sabor na Chapa -
            Todos os direitos reservados.

        </p>

    </div>

</footer>


<!-- Bootstrap JavaScript -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>