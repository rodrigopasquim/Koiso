<?php

$nome_usuario = $_GET['nome-user'];

$result_usuario = "UPDATE usuarios SET nome = '$nome_usuario' WHERE id = 0";

$resultado_usuario = mysqli_query($mysqli, $result_usuario);

?>