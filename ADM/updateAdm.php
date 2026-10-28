<?php
include "../conexao.php";

if (!isset($_POST['usu_id'])) {
    die("ID não informado.");
}

$usu_id = intval($_POST['usu_id']);
$cpf = $_POST['usuAdm_cpf'];
$email = $_POST['usuAdm_email'];
$senha = $_POST['usuAdm_senha'];

// Se a senha foi digitada, cria hash novo. Se não, mantém a antiga
if (!empty($senha)) {
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "UPDATE usuario_adm SET usuAdm_cpf = ?, usuAdm_email = ?, usuAdm_senha = ? WHERE usu_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $cpf, $email, $senha_hash, $usu_id);
} else {
    $sql = "UPDATE usuario_adm SET usuAdm_cpf = ?, usuAdm_email = ? WHERE usu_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $cpf, $email, $usu_id);
}

if ($stmt->execute()) {
    header("Location: formAdm.php?msg=editado");
    exit;
} else {
    echo "Erro ao atualizar: " . $conn->error;
}
?>