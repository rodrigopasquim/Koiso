<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'db_koiso_1.0';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->connect_error);
}

?>