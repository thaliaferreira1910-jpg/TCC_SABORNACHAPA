<?php
session_start();
include "conexao.php";
$erro = "";
/*O login precisa solicitar acesso ao servidor
SGBD MySQL para que ele possa verificar o login
e senha para entrar no sistema*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuAdm_cpf = $_POST['usuAdm_cpf'];
    $usuAdm_email = $_POST['usuAdm_email'];
    $usuAdm_senha = $_POST['usuAdm_senha'];

/*Na linha SQL será realizado através do comando
SELECT o login pegando a cpf e a senha do administrador
e adicionado o comando LIMIT 1 para dizer que só
pode pegar 1 dado apenas*/
    $sql = "SELECT * FROM usuario_adm
    WHERE usuAdm_cpf = ? AND usuAdm_email = ? LIMIT 1";
    
/*Na sequência dos códigos abaixo a variável $stmt
recebe o comando SQL e através do bind_param (
que é utilizado para se comunicar com o bd) ele 
envia a quantidade de informações que o banco precisa
para logar, o banco recebe, consulta na tabela
administrador e retorna se este usuário existe*/    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuAdm_cpf, $usuAdm_email); // corrigido
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        //if (password_verify($senha_adm, $usuario['senha_adm'])) { // Linha com criptografia
        if ($usuAdm_senha === $usuario['usuAdm_senha']) {
            $_SESSION['admin'] = $usuario['usuAdm_cpf'];
            $_SESSION['admin_id'] = $usuario['usu_id'];
            header("Location: menu.php");
            exit;
        } else {
            $erro = "Login/senha incorretos.";
        }
    } else {
        $erro = "Login/senha incorretos.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login Administrador</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 350px;">
        <h3 class="text-center mb-4">Login Administrador</h3>

        <?php if($erro): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">CPF</label>
                <input type="text" name="usuAdm_cpf" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="usuAdm_email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" name="usuAdm_senha" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
