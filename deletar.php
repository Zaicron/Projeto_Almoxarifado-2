<?php

include("conexao.php");

$codigo = $_GET['codigo'];

$resultado = mysqli_query($conexao, "DELETE FROM produtos WHERE codigo=$codigo");

header("Location:relatorio.php");
?>
