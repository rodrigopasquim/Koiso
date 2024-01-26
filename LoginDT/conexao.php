<?php

$database = 'db_koiso_1.0';
$usuario = 'root';
$host = 'localhost';
$senha = '';

// Conectar ao banco de dados
$mysqli = new mysqli($host, $usuario, $senha, $database);

// Checar a conexão
if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

?>