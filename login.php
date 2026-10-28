<?php
session_start();
include "conexao.php";
$erro = "";
/* O login precisa solicitar acesso ao servidor
SGBD MySQL para verificar o login e senha */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usu_id = $_POST['usu_id'];
    $usuAdm_email = $_POST['usuAdm_email'];
    $usuAdm_senha = $_POST['usuAdm_senha'];
    /* Consulta o administrador no banco de dados */
    $sql = "SELECT * FROM usuario_adm
    WHERE usu_id = ? AND usuAdm_email = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usu_id, $usuAdm_email);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        if ($usuAdm_senha === $usuario['usuAdm_senha']) {
            $_SESSION['admin'] = $usuario['usuAdm_email'];
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
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Login Usuario</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <!-- Ícones -->
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
    font-family: Arial, sans-serif;
    background-color: #10151c;
    min-height: 100vh;
}
/* LOGIN */
.login-container {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px 15px;
}
/* CAIXA DO LOGIN */
.login-box {
    background-color: #1a222c;
    width: 100%;
    max-width: 400px;
    padding: 35px;
    border-radius: 12px;
    border: 1px solid #343d48;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
}
/* LOGO */
.logo-login {
    display: block;
    width: 110px;
    height: 110px;
    object-fit: contain;
    margin: 0 auto 15px;
}
/* TÍTULO */
.login-box h1 {
    color: white;
    text-align: center;
    font-weight: bold;
    margin-bottom: 10px;
}
.login-box .subtitulo {
    color: #cccccc;
    text-align: center;
    margin-bottom: 30px;
}
/* LABEL */
.login-box label {
    color: white;
    font-weight: bold;
    margin-bottom: 7px;
}
/* CAMPOS */
.login-box input {
    width: 100%;
    padding: 12px;
    background-color: #10151c;
    color: white;
    border: 1px solid #3d4650;
    border-radius: 6px;
    transition: 0.3s;
}
.login-box input::placeholder {
    color: #999;
}
.login-box input:focus {
    background-color: #10151c;
    color: white;
    border-color: #e64b23;
    box-shadow: 0 0 0 2px rgba(230, 75, 35, 0.2);
    outline: none;
}
/* ÍCONES */
.input-icon {
    position: relative;
}
.input-icon i {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
}
/* ERRO */
.alert-danger {
    background-color: #3a1c20;
    color: #ffb3b3;
    border: 1px solid #842029;
    border-radius: 6px;
}
/* BOTÃO */
.btn-entrar {
    width: 100%;
    padding: 11px;
    margin-top: 10px;
    border: none;
    border-radius: 6px;
    background-color: #198754;
    color: white;
    font-weight: bold;
    transition: 0.3s;
}
.btn-entrar:hover {
    background-color: #157347;
    transform: translateY(-2px);
}
/* LINK VOLTAR */
.voltar {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #cccccc;
    text-decoration: none;
}
.voltar:hover {
    color: #e64b23;
}
/* RESPONSIVO */
@media (max-width: 576px) {
    .login-container {
        padding: 20px 15px;
    }
    .login-box {
        padding: 25px 18px;
    }
    .logo-login {
        width: 90px;
        height: 90px;
    }
}
</style>
<body>
<!-- LOGIN -->
<div class="login-container">
    <div class="login-box">
        <!-- LOGO -->
        <img
            src="imagens/logo.png"
            alt="Logo Sabor na Chapa"
            class="logo-login">
        <h1>
            Login
        </h1>
        <?php if($erro): ?>
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle"></i>
                <?= $erro ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
           
            <!-- EMAIL -->
            <div class="mb-3">
                <label for="usuAdm_email">
                    E-mail
                </label>
                <div class="input-icon">
                    <input
                        type="email"
                        name="usuAdm_email"
                        id="usuAdm_email"
                        class="form-control"
                        placeholder="Digite seu e-mail"
                        required>
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
            <!-- SENHA -->
            <div class="mb-3">
                <label for="usuAdm_senha">
                    Senha
                </label>
                <div class="input-icon">
                    <input
                        type="password"
                        name="usuAdm_senha"
                        id="usuAdm_senha"
                        class="form-control"
                        placeholder="Digite sua senha"
                        required>
                    <i class="bi bi-lock"></i>
                </div>
            </div>
            <!-- BOTÃO -->
            <button
                type="submit"
                class="btn-entrar">
                <i class="bi bi-box-arrow-in-right"></i>
                Entrar
            </button>
        </form>
        <!-- VOLTAR -->
        <a href="index.php" class="voltar">
            <i class="bi bi-arrow-left"></i>
            Voltar para o início
        </a>
    </div>
</div>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>
</body>
</html>