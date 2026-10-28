<?php
include "../conexao.php";
$ava_id = $_GET['ava_id'];

$sql="DELETE FROM tbl_aluno WHERE
av_id=$ava_id";
$conn->query($sql);
header("Location:formAvaliacao.php");
?>