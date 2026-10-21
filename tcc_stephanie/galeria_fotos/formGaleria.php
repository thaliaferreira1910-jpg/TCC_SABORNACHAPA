<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro da Galeria</title>

    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
        }

        .container {
            background-color: white;
            max-width: 600px;
            margin: 30px auto;
            padding: 25px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        .caixa {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        .mensagem {
            padding: 12px;
            background-color: #e8e8e8;
        }

        button {
            margin-top: 20px;
            padding: 10px;
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

        <p>Imagens JPG, PNG ou WEBP, com até 5 MB cada.</p>

        <label for="legenda">Legenda das imagens:</label>

        <input
            type="text"
            id="legenda"
            name="legenda"
            class="caixa"
            maxlength="255"
        >

        <button type="submit">CADASTRAR</button>
        <button type="reset">LIMPAR</button>

        <p>
            <a href="index.php">Voltar ao site</a>
        </p>

    </form>

</div>

</body>
</html>