<?php
include "../conexao.php";
$usu_id = $_GET['usu_id'];

$sql="DELETE FROM usuario_adm WHERE
usu_id=$usu_id";
$conn->query($sql);
header("Location:formAdm.php");
?>

