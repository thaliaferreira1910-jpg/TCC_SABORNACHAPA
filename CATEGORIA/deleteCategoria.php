<?php
include "../conexao.php";
$cat_id = $_GET['cat_id'];

$sql="DELETE FROM categoria WHERE
cat_id=$cat_id";
$conn->query($sql);
header("Location:formCategoria.php");
?>