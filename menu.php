<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu - Sabor na Chapa</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{background:#f4f7fb;color:#212529}.page-header{min-height:300px;display:flex;align-items:center;color:white;background:#e64b23}.page-header .badge{background:#e64b23}.content-card{background:white;border-radius:22px;box-shadow:0 12px 35px rgba(0,0,0,.10);padding:40px;margin-top:-55px;position:relative;z-index:2}.menu-item{display:flex;flex-direction:column;align-items:center;justify-content:center;text-decoration:none;color:#212529;background:white;border:1px solid #e9ecef;border-radius:18px;padding:25px 15px;min-height:220px;box-shadow:0 8px 25px rgba(0,0,0,.08);transition:.2s}.menu-item:hover{transform:translateY(-5px);box-shadow:0 12px 30px rgba(0,0,0,.14);color:#e64b23}.menu-item img{width:130px;height:130px;object-fit:contain;margin-bottom:15px}.menu-item p{margin:0;font-size:19px;font-weight:700}footer{margin-top:30px;padding:35px 0;background:#e64b23;color:white}@media(max-width:767px){.content-card{padding:28px;margin-top:-25px}.menu-item{min-height:190px}.menu-item img{width:105px;height:105px}}
</style></head>
<body>
<header class="page-header"><div class="container py-5"><span class="badge rounded-pill px-3 py-2 mb-3">SABOR NA CHAPA</span><h1 class="display-5 fw-bold">Menu ADM</h1><p class="lead mb-0">Escolha uma opção para gerenciar o sistema.</p></div></header>
<main class="container pb-5"><section class="content-card">
<div class="text-center mb-4"><p class="text-uppercase fw-bold text-secondary mb-2">Painel administrativo</p><h2 class="fw-bold">Menu de opções</h2><p class="text-secondary mb-0">Selecione o que deseja acessar.</p></div>
<div class="row g-4 justify-content-center">
<div class="col-md-5"><a href="LANCHES/formLanches.php" class="menu-item"><img src="imagens/lanches-removebg-preview.png" alt="Lanches"><p>Lanches</p></a></div>
<div class="col-md-5"><a href="CATEGORIA/formCategoria.php" class="menu-item"><img src="imagens/options-lines.png" alt="Categoria"><p>Categoria</p></a></div>
<div class="col-md-5"><a href="bebidas/formBebidas.php" class="menu-item"><img src="imagens/bebidas-removebg-preview.png" alt="Bebidas"><p>Bebidas</p></a></div>
<div class="col-md-5"><a href="#" class="menu-item"><img src="imagens/logout.png" alt="Sair do Sistema"><p>Sair do Sistema</p></a></div>
</div></section></main>
<footer class="text-center"><p class="mb-0">&copy; <?= date('Y') ?> - Sabor na Chapa</p></footer>
</body></html>
