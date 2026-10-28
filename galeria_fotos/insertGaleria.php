<?php

// Importa a conexão com o banco.
//require_once __DIR__ . "../conexao.php";
include "../conexao.php";

// Permite tratar falhas nas consultas com try e catch.
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Se não recebeu POST, retorna ao formulário.
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: formGaleria.php");
    exit;
}

// Recebe os textos do formulário.
$titulo = isset($_POST["titulo"]) && is_string($_POST["titulo"])
    ? trim($_POST["titulo"]) : "";

$descricao = isset($_POST["descricao"]) && is_string($_POST["descricao"])
    ? trim($_POST["descricao"]) : "";

$legenda = isset($_POST["legenda"]) && is_string($_POST["legenda"])
    ? trim($_POST["legenda"]) : "";

// Recebe os arquivos enviados.
$arquivos = isset($_FILES["imagens"])
    ? $_FILES["imagens"] : null;

// Verifica os campos obrigatórios.
if (
    $titulo == "" ||
    $descricao == "" ||
    !$arquivos ||
    !isset($arquivos["name"]) ||
    !is_array($arquivos["name"])
) {
    header("Location: formGaleria.php?status=erro");
    exit;
}

// Pasta física onde os arquivos serão guardados.
$pastaFisica = __DIR__ . "/../uploads/";

// Caminho que será cadastrado no banco.
$caminhoBanco = "../uploads/";

// Tipos permitidos e suas extensões.
$tiposPermitidos = [
    "image/jpeg" => "jpg",
    "image/png" => "png",
    "image/webp" => "webp"
];

// Limite de 5 MB por imagem.
$limite = 5 * 1024 * 1024;

// Identifica o tipo real do arquivo.
$finfo = new finfo(FILEINFO_MIME_TYPE);

$imagensValidas = [];

// Confere todas as imagens antes de gravar no banco.
foreach ($arquivos["name"] as $indice => $nomeOriginal) {

    $erroUpload = $arquivos["error"][$indice]
        ?? UPLOAD_ERR_NO_FILE;

    $tamanho = $arquivos["size"][$indice] ?? 0;

    $temporario = $arquivos["tmp_name"][$indice] ?? "";

    if (
        $erroUpload != UPLOAD_ERR_OK ||
        $tamanho <= 0 ||
        $tamanho > $limite ||
        !is_uploaded_file($temporario)
    ) {
        header("Location: formGaleria.php?status=erro");
        exit;
    }

    $tipo = $finfo->file($temporario);

    // Verifica se o arquivo realmente é uma imagem permitida.
    if (
        !isset($tiposPermitidos[$tipo]) ||
        @getimagesize($temporario) === false
    ) {
        header("Location: formGaleria.php?status=erro");
        exit;
    }

    $imagensValidas[] = [
        "temporario" => $temporario,
        "extensao" => $tiposPermitidos[$tipo]
    ];
}

if (count($imagensValidas) == 0) {
    header("Location: formGaleria.php?status=erro");
    exit;
}

// Cria a pasta, caso ainda não exista.
if (!is_dir($pastaFisica)) {

    if (!mkdir($pastaFisica, 0755, true)) {
        header("Location: formGaleria.php?status=erro");
        exit;
    }
}

// Guarda os arquivos movidos para removê-los se ocorrer erro.
$arquivosMovidos = [];
$transacaoIniciada = false;

try {

    // Inicia uma operação conjunta de cadastro.
    $conn->begin_transaction();
    $transacaoIniciada = true;

    // Cadastra a galeria.
    // id é gerado pelo AUTO_INCREMENT.
    // data_cadastro usa o valor padrão CURRENT_TIMESTAMP.
    $sqlGaleria = "
        INSERT INTO galeria (titulo, descricao)
        VALUES (?, ?)
    ";

    $stmtGaleria = $conn->prepare($sqlGaleria);

    $stmtGaleria->bind_param(
        "ss",
        $titulo,
        $descricao
    );

    $stmtGaleria->execute();

    // Recupera o ID da galeria recém-cadastrada.
    $galeriaId = $conn->insert_id;

    $stmtGaleria->close();

    // Prepara o cadastro das imagens.
    // gf_id é gerado pelo AUTO_INCREMENT.
    // Nesta tabela, informamos a data usando NOW().
    $sqlFoto = "
        INSERT INTO galeria_fotos (
            galeria_id,
            caminho_imagem,
            legenda,
            data_cadastro
        )
        VALUES (?, ?, ?, NOW())
    ";

    $stmtFoto = $conn->prepare($sqlFoto);

    foreach ($imagensValidas as $imagem) {

        // Gera um nome único para cada imagem.
        $nomeArquivo = bin2hex(random_bytes(16))
            . "." . $imagem["extensao"];

        $destino = $pastaFisica . $nomeArquivo;

        $caminhoImagem = $caminhoBanco . $nomeArquivo;

        // Move a imagem para a pasta definitiva.
        if (
            !move_uploaded_file(
                $imagem["temporario"],
                $destino
            )
        ) {
            throw new Exception("Não foi possível salvar a imagem.");
        }

        $arquivosMovidos[] = $destino;

        // Relaciona a foto ao ID da galeria.
        $stmtFoto->bind_param(
            "iss",
            $galeriaId,
            $caminhoImagem,
            $legenda
        );

        $stmtFoto->execute();
    }

    $stmtFoto->close();

    // Confirma o cadastro da galeria e das imagens.
    $conn->commit();

    $status = "sucesso";

} catch (Throwable $erro) {

    // Registra o motivo da falha no log do PHP.
    error_log($erro->getMessage());

    // Desfaz os cadastros se ocorrer erro.
    if ($transacaoIniciada) {
        $conn->rollback();
    }

    // Remove os arquivos salvos nessa tentativa.
    foreach ($arquivosMovidos as $arquivo) {

        if (is_file($arquivo)) {
            unlink($arquivo);
        }
    }

    $status = "erro";
}

$conn->close();

// Retorna ao formulário mostrando o resultado.
header("Location: formGaleria.php?status=" . $status);
exit;