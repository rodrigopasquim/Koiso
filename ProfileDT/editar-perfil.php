<?php
// Processar a atualização no banco de dados quando o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter o novo apelido do formulário
    $novoApelido = $_POST["nickname-user"];

    // Atualizar o apelido no banco de dados (substitua com sua consulta SQL)
    $sql = "UPDATE db_table_perfil_usuarios SET db_column_apelido = '$novoApelido' WHERE ..."; // Substitua ... com sua condição WHERE
    if ($conn->query($sql) === TRUE) {
        echo "Apelido atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar apelido: " . $conn->error;
    }
}

// Fechar a conexão com o banco de dados (opcional, pois o PHP fecha automaticamente ao final da execução do script)
$conn->close();
?>