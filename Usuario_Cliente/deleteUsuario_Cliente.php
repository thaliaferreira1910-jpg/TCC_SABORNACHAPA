<?php
include "../conexao.php";
$usucli_id = $_GET['usucli_id'];

$sql="DELETE FROM usuario_cliente WHERE
usucli_id=$usucli_id";
$conn->query($sql);
header("Location:formUsuario_Cliente.php");
?>