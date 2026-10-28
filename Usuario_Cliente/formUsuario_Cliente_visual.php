<?php
include "../conexao.php";
//include"protege.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro do Cliente - Sabor na Chapa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background:#f4f7fb;
            color:#212529;
        }

        .page-header {
            min-height:300px;
            display:flex;
            align-items:center;
            color:white;
            background:#e64b23;
        }

        .page-header .badge {
            background:#e64b23;
            backdrop-filter:blur(5px);
        }

        .content-card {
            background:white;
            border-radius:22px;
            box-shadow:0 12px 35px rgba(0,0,0,.10);
            padding:40px;
            margin-top:-55px;
            position:relative;
            z-index:2;
        }

        .form-label {
            font-weight:700;
            color:#343a40;
        }

        .form-control {
            border-radius:12px;
            padding:12px 14px;
            border:1px solid #dce1e7;
        }

        .form-control:focus {
            border-color:#6c757d;
            box-shadow:0 0 0 .2rem rgba(33,37,41,.1);
        }

        .btn-form {
            border-radius:12px;
            padding:12px 22px;
            font-weight:700;
        }

        .table-card {
            background:white;
            border-radius:22px;
            box-shadow:0 8px 25px rgba(0,0,0,.08);
            padding:28px;
        }

        .table {
            margin-bottom:0;
        }

        .table thead th {
            background:#212529;
            color:white;
            padding:15px;
            white-space:nowrap;
        }

        .table tbody td {
            padding:14px;
            vertical-align:middle;
        }

        .action-link {
            text-decoration:none;
            font-weight:600;
            margin-right:12px;
        }

        footer {
            margin-top:30px;
            padding:35px 0;
            background:#e64b23;
            color:white;
        }

        footer p {
            color:#ffffff;
            margin:0;
        }

        @media (max-width:767px) {
            .content-card {
                padding:28px;
                margin-top:-25px;
            }
        }
    </style>
</head>

<body>

<header class="page-header">
    <div class="container py-5">
        <span class="badge rounded-pill px-3 py-2 mb-3">SABOR NA CHAPA</span>
        <h1 class="display-5 fw-bold">Cadastro de Cliente</h1>
        <p class="lead mb-0">Cadastre e gerencie os clientes do sistema.</p>
    </div>
</header>

<main class="container pb-5">

    <section class="content-card mb-5">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h2 class="fw-bold mb-1">Dados do cliente</h2>
                <p class="text-secondary mb-0">Preencha os campos abaixo.</p>
            </div>
            <a href="../menu.php" class="btn btn-outline-secondary btn-form">
                <i class="bi bi-arrow-left me-2"></i>Voltar ao Menu
            </a>
        </div>

        <form>
            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control" placeholder="Digite o nome">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Digite o email">
                </div>

                <div class="col-md-6">
                    <label class="form-label">CPF</label>
                    <input type="text" class="form-control" placeholder="Digite o CPF">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Endereço</label>
                    <input type="text" class="form-control" placeholder="Digite o endereço">
                </div>

                <div class="col-12 d-flex flex-column flex-sm-row gap-2 mt-4">
                    <button type="reset" class="btn btn-outline-secondary btn-form">
                        <i class="bi bi-arrow-counterclockwise me-2"></i>Limpar
                    </button>

                    <button type="submit" class="btn btn-dark btn-form flex-grow-1">
                        <i class="bi bi-check-lg me-2"></i>Enviar
                    </button>
                </div>

            </div>
        </form>
    </section>

    <section class="table-card">
        <div class="text-center mb-4">
            <p class="text-uppercase fw-bold text-secondary mb-2">Registros</p>
            <h2 class="fw-bold">Clientes cadastrados</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead>
                    <tr>
                       
                        <th>Nome</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Endereço</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                        <th>Número</th>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>CEP</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT * FROM usuario_cliente";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        $usucli_id = $row['usucli_id'];
                        echo "<tr>
                           
                            <td>{$row['usucli_nome']}</td>
                            <td>{$row['usucli_email']}</td>
                            <td>{$row['usucli_cpf']}</td>
                            <td>{$row['usucli_endereco']}</td>
                            <td>{$row['usucli_estado']}</td>
                            <td>{$row['usucli_cidade']}</td>
                            <td>{$row['usucli_numero']}</td>
                            <td>{$row['usucli_rua']}</td>
                            <td>{$row['usucli_bairro']}</td>
                            <td>{$row['usucli_cep']}</td>
                            <td>
                                <a class='action-link text-dark' href='editarformUsuario_Cliente.php?usucli_id=$usucli_id'>Editar</a>
                                <a class='action-link text-danger' href='deleteUsuario_Cliente.php?usucli_id=$usucli_id'
                                   onclick=\"return confirm('Deseja realmente excluir o Cliente? {$row['usucli_id']}?');\">Excluir</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

</main>

<footer class="text-center">
    <p class="mb-0">&copy; <?= date('Y') ?> - Sabor na Chapa</p>
</footer>

</body>
</html>