<?php
include "../conexao.php";

$usuAdm_cpf = $_POST['usuAdm_cpf'];
$usuAdm_email = $_POST['usuAdm_email'];
$usuAdm_senha = $_POST['usuAdm_senha'];

// Criptografa a senha antes de salvar
$senha_hash = password_hash($usuAdm_senha, PASSWORD_DEFAULT);

// Query segura com prepared statement
$sql = "INSERT INTO usuario_adm (usuAdm_cpf, usuAdm_email, usuAdm_senha) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $usuAdm_cpf, $usuAdm_email, $senha_hash);

if ($stmt->execute()) {
    echo "
    <script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formAdm.php';
    </script>";
} else {
    echo 'Erro ao inserir: '.$conn->error;
}
?>