<?php
include('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {

    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM db_table_login_usuarios WHERE db_column_email = '$email' AND db_column_senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {
        $usuario = $sql_query->fetch_assoc();

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['db_column_nome'] = $usuario['db_column_nome'];


        header("Location: http://localhost/ProfileDT/profile.php");
    } else {
        echo"<script>
                abaixar_popup();
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/main-login.css">
    <link rel="stylesheet" href="styles/header-login.css">
    <link rel="stylesheet" href="styles/footer-login.css">
    <link rel="stylesheet" href="styles/aviso.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://i.imgur.com/1LdRVjc.png" type="image/x-icon">
    <title>Log In</title>
</head>
<body>
    <header class="cabecalho">
        <a class="cabecalho-logo-div" href="http://localhost/Inicialpage/inicialpage.html">
            <img class="cabecalho-logo" src="https://i.imgur.com/1LdRVjc.png" alt="">
            <div class="cabecalho-logo-texts">
                <div class="cabecalho-text-logo">Koiso</div>
            </div>
        </a>
        <div></div>
    </header>
    <main>
        <!--POPUP DE AVISO-->
        <div id="informacoes_incorretas">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.002 22C17.5248 22 22.002 17.5228 22.002 12C22.002 6.47715 17.5248 2 12.002 2C6.47911 2 2.00195 6.47715 2.00195 12C2.00195 17.5228 6.47911 22 12.002 22ZM9.91617 8.5C9.52565 8.10948 8.89248 8.10948 8.50196 8.5C8.11143 8.89053 8.11143 9.52369 8.50196 9.91422L10.5877 12L8.50195 14.0858C8.11143 14.4763 8.11143 15.1095 8.50195 15.5C8.89248 15.8905 9.52564 15.8905 9.91616 15.5L12.002 13.4142L14.0877 15.5C14.4783 15.8905 15.1114 15.8905 15.502 15.5C15.8925 15.1095 15.8925 14.4763 15.502 14.0858L13.4162 12L15.502 9.91422C15.8925 9.52369 15.8925 8.89053 15.502 8.5C15.1114 8.10948 14.4783 8.10948 14.0877 8.5L12.002 10.5858L9.91617 8.5Z" fill="currentColor"/>
            </svg>
            <p>E-mail or password are wrong</p>
        </div>

        <!--FORMULÁRIO DE LOGIN-->
        <form class="card" action="" method="POST">
            <h1>Log In</h1>
            <div class="textfield">
                <label for="email"></label>
                <input type="email" name="email" placeholder="Email adress" require>
            </div>
            <div class="textfield">
                <label for="password"></label>
                <input type="password" name="senha" placeholder="Password" require>
            </div>
            <button type="submit" class="submit-login">Login</button>  
            <div class="forgot-password">
                <p>Forgot your password? &nbsp</p>
                <a href="">Recover</a>
            </div>
            <div class="ou">
                <div class="ou-row"></div><p>&nbsp or &nbsp</p><div class="ou-row"></div>
            </div>
            <a class="registro-atalho" href="http://localhost/register/register.php">Create your account</a>
        </form>
    </main>  

    <footer>
        <section class="footer">
            <div class="left-rodape">
                <a class="words-rodape">KOISO Copyright © 2023</a>
                <div class="socialmedias-rodape-icons">
                    <a href="https://discord.gg/skNHSjaEva">
                        <svg margin-top="40px" width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff"><path d="M5.5 16c5 2.5 8 2.5 13 0M15.5 17.5l1 2s4.171-1.328 5.5-3.5c0-1 .53-8.147-3-10.5-1.5-1-4-1.5-4-1.5l-1 2h-2" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.528 17.5l-1 2s-4.171-1.328-5.5-3.5c0-1-.53-8.147 3-10.5 1.5-1 4-1.5 4-1.5l1 2h2" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.5 14c-.828 0-1.5-.895-1.5-2s.672-2 1.5-2 1.5.895 1.5 2-.672 2-1.5 2zM15.5 14c-.828 0-1.5-.895-1.5-2s.672-2 1.5-2 1.5.895 1.5 2-.672 2-1.5 2z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </a>
                    <a href="https://www.instagram.com/koiso.so/">
                        <svg margin-top="40px" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff"><path d="M12 16a4 4 0 100-8 4 4 0 000 8z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 16V8a5 5 0 015-5h8a5 5 0 015 5v8a5 5 0 01-5 5H8a5 5 0 01-5-5z" stroke="#ffffff" stroke-width="1.5"></path><path d="M17.5 6.51l.01-.011" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </a>
                </div>
            </div>
            <div class="right-rodape">
                <div class="topic-right">
                    <p class="title-topic-right">About</p>
                    <div class="text-topic-right">
                        <a class="words-rodape" href="https://www.youtube.com/">Terms of Service</a>
                        <a class="words-rodape" href="http://localhost/InicialpageDT/privacy-polity/privacy.html">Privacy Policy</a>
                        <a class="words-rodape" href="https://www.youtube.com/">Contact</a>
                    </div>
                </div>
                <div class="topic-right">
                    <p class="title-topic-right">Navegation</p>
                    <div class="text-topic-right">
                        <a class="words-rodape" href="http://localhost/InicialpageDT/inicialpage.html">Inicial Page</a>
                        <a class="words-rodape" href="http://localhost/register/register.php">Sign In Koiso</a>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <script src="aviso.js"></script>
</body>
</html>