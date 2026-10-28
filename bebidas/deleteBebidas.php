<?php
include "../conexao.php";
$be_id = $_GET['be_id'];

$sql="DELETE FROM bebidas WHERE
be_id=$be_id";
$conn->query($sql);
header("Location:formBebidas.php");
?>