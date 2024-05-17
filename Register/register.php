<?php
include_once('conexao.php');

function generateUUID() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

if(isset($_POST['submit']))
{
    // Utilize mysqli_real_escape_string para evitar injeção de SQL
    $username = mysqli_real_escape_string($mysqli, $_POST['input-username']);
    $email = mysqli_real_escape_string($mysqli, $_POST['input-email']);
    $password = mysqli_real_escape_string($mysqli, $_POST['input-password']);
    $nickname = mysqli_real_escape_string($mysqli, $_POST['input-nickname']);
    $biography = mysqli_real_escape_string($mysqli, $_POST['input-biography']);

    $max_attempts = 5;  // Limite de tentativas para evitar um loop infinito

    while ($max_attempts > 0) {
        $perfil_usuario_id = generateUUID();

        // Inserir na tabela db_table_perfil_usuarios
        $stmt_perfil = $mysqli->prepare("INSERT INTO db_table_perfil_usuarios (id, db_column_apelido, db_column_biografia) VALUES (?, ?, ?)");
        $stmt_perfil->bind_param("sss", $perfil_usuario_id, $nickname, $biography);

        try {
            $stmt_perfil->execute();
            break; // Se a execução for bem-sucedida, saia do loop
        } catch (mysqli_sql_exception $e) {
            // Se ocorrer uma exceção (duplicação de chave primária), tente novamente
            $max_attempts--;
        }

        $stmt_perfil->close();
    }

    if ($max_attempts <= 0) {
        // Limite de tentativas atingido, exibir mensagem de erro e encerrar
        die("Erro ao tentar inserir na tabela de perfil. Limite de tentativas atingido.");
    }

    // Inserir na tabela db_table_login_usuarios
    $stmt_login = $mysqli->prepare("INSERT INTO db_table_login_usuarios (id, db_column_nome, db_column_email, db_column_senha) VALUES (?, ?, ?, ?)");
    $stmt_login->bind_param("ssss", $perfil_usuario_id, $username, $email, $password);
    
    if ($stmt_login->execute()) {
        // Redirecione após a inserção bem-sucedida
        header('Location: http://localhost/LoginDT/login.php');
        exit();
    } else {
        // Trate erros durante a execução
        die("Erro ao inserir na tabela de login: " . $stmt_login->error);
    }

    // Feche a instrução preparada de login
    $stmt_login->close();
}

// Feche a conexão com o banco de dados (se necessário)
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/header-register.css">
    <link rel="stylesheet" href="style/main-register.css">
    <link rel="stylesheet" href="style/footer-register.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://i.imgur.com/1LdRVjc.png" type="image/x-icon">
    <title>Sign In</title>
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
        <!--FORMULÁRIO DE REGISTRO-->
        <form class="card" action="register.php" method="POST">
            <h1>Create your account</h1>
            <div class="textfield">
                <input type="email" name="input-email" placeholder="Email adress" required>
            </div>
            <div class="textfield">
                <input type="text" name="input-username" placeholder="Username" required>
            </div>
            <div class="textfield">
                <input type="password" name="input-password" placeholder="Password" required>
            </div>
            <input class="submit-register" type="submit" name="submit">
            <div class="link-login">
                <p>Already have an account? &nbsp;</p>
                <a href="http://localhost/LoginDT/login.php">Login</a>
            </div>
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
                        <a class="words-rodape" href="http://localhost/Inicialpage/privacy-polity/privacy.html">Privacy Policy</a>
                        <a class="words-rodape" href="https://www.youtube.com/">Contact</a>
                    </div>
                </div>
                <div class="topic-right">
                    <p class="title-topic-right">Navegation</p>
                    <div class="text-topic-right">
                        <a class="words-rodape" href="http://localhost/Inicialpage/inicialpage.html">Inicial Page</a>
                        <a class="words-rodape" href="http://localhost/LoginDT/login.php">Log In Koiso</a>
                    </div>
                </div>
            </div>
        </section>
    </footer>
</body>
</html>