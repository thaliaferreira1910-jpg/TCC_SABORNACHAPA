<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro da Galeria</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: white;
            margin: 0;
            padding: 30px 15px;
        }

        .container {
            background-color: #1f1f1f;
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 15px;
            border: 1px solid #333;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        h2 {
            text-align: center;
            color: #ff8c00;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 7px;
            font-weight: bold;
            color: #f5f5f5;
        }

        .caixa {
            width: 100%;
            padding: 12px;
            margin-top: 2px;
            background-color: #2b2b2b;
            color: white;
            border: 1px solid #555;
            border-radius: 8px;
            outline: none;
        }

        .caixa:focus {
            border-color: #ff8c00;
            box-shadow: 0 0 5px rgba(255, 140, 0, 0.5);
        }

        textarea.caixa {
            resize: vertical;
        }

        input[type="file"] {
            padding: 10px;
        }

        input[type="file"]::file-selector-button {
            background-color: #ff8c00;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            margin-right: 10px;
        }

        .mensagem {
            padding: 12px;
            background-color: #2b2b2b;
            border-left: 4px solid #ff8c00;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .mensagem a {
            color: #ff8c00;
            text-decoration: none;
        }

        .mensagem a:hover {
            text-decoration: underline;
        }

        .info {
            color: #bbb;
            font-size: 14px;
        }

        .botoes {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 25px;
        }

        button {
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .cadastrar {
            background-color: #28a745;
        }

        .cadastrar:hover {
            background-color: #218838;
        }

        .limpar {
            background-color: #dc3545;
        }

        .limpar:hover {
            background-color: #c82333;
        }

        .voltar {
            text-align: center;
            margin-top: 25px;
        }

        .voltar a {
            color: #ff8c00;
            text-decoration: none;
        }

        .voltar a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            .botoes {
                flex-direction: column;
            }

            button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Cadastro da Galeria de Fotos</h2>

    <?php
    // Recebe o resultado enviado pelo insertGaleria.php.
    $status = isset($_GET["status"]) ? $_GET["status"] : "";
    ?>

    <?php if ($status == "sucesso"): ?>

        <p class="mensagem">
            Galeria cadastrada com sucesso!
            <a href="index.php">Visualizar no site</a>
        </p>

    <?php elseif ($status == "erro"): ?>

        <p class="mensagem">
            Não foi possível cadastrar.
            Confira os dados, as imagens e a estrutura do banco.
        </p>

    <?php endif; ?>

    <!-- enctype é necessário para enviar arquivos. -->
    <form
        action="insertGaleria.php"
        method="post"
        enctype="multipart/form-data"
    >

        <label for="titulo">Título da galeria:</label>

        <input
            type="text"
            id="titulo"
            name="titulo"
            class="caixa"
            maxlength="100"
            required
        >

        <label for="descricao">Descrição:</label>

        <textarea
            id="descricao"
            name="descricao"
            class="caixa"
            maxlength="255"
            rows="3"
            required
        ></textarea>

        <label for="imagens">Selecione as imagens:</label>

        <!-- multiple permite selecionar várias imagens. -->
        <input
            type="file"
            id="imagens"
            name="imagens[]"
            class="caixa"
            accept="image/jpeg,image/png,image/webp"
            multiple
            required
        >

        <p class="info">
            Imagens JPG, PNG ou WEBP, com até 5 MB cada.
        </p>

        <label for="legenda">Legenda das imagens:</label>

        <input
            type="text"
            id="legenda"
            name="legenda"
            class="caixa"
            maxlength="255"
        >

        <div class="botoes">
            <button type="submit" class="cadastrar">
                CADASTRAR
            </button>

            <button type="reset" class="limpar">
                LIMPAR
            </button>
        </div>

        <p class="voltar">
            <a href="../index.php">Voltar ao site</a>
        </p>

    </form>

</div>

</body>
</html>