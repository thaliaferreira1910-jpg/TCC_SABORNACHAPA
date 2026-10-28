<?php
include "../conexao.php";
/*As variáveis criadas do PHP recebem
o name do HTML */
$lan_id = $_POST['lan_id'];
$lan_nome = $_POST['lan_nome'];
$lan_preco = $_POST['lan_preco'];
$lan_descricao = $_POST['lan_descricao'];
$lan_foto = $_POST['lan_foto'];
$cat_id = $_POST['cat_id'];

$sql = "UPDATE lanches SET 
lan_id = '$lan_id', 
lan_nome = '$lan_nome',
lan_preco = '$lan_preco',
lan_descricao = '$lan_descricao',
lan_foto = '$lan_foto',
cat_id = '$cat_id'
WHERE cat_id=$lan_id";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados alterados com sucesso!');
    window.location.href='formLanches.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}




?>