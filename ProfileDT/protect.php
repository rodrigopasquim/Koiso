<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    /*if(!isset($_SESSION['id'])) {
        die("<h3 class='text'>Você não pode acessar esta página porque não está logado!</h3>
        <p><a href=\"LoginDT\login.php\">Entrar</a></p>
        ");
    }*/

    if (!isset($_SESSION['id'])) {
        header('Location: protect.html');
        exit;
    }
?>

