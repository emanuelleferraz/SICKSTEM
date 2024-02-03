<?php
// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conexao.php";
    
    // Receber o valor do campo Nome
    $nome = $_POST["nome"];

    // Verificar se $nome não é nulo antes de continuar
    if ($nome !== null) {
        // Preparar a instrução SQL DELETE
        $sql = "DELETE FROM doenca WHERE nome = ? ";

        // Preparar e executar a instrução SQL usando prepared statements para evitar injeção de SQL
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nome);

        if ($stmt->execute()) {
            // Redirecionar para a página pesquisa_doenca.php após a exclusão
            header("Location: pesquisa_doenca.php");
            exit(); // Importante: garantir que o script seja encerrado após o redirecionamento
        } else {
            echo "Erro ao excluir doença: " . $stmt->error;
        }

        // Fechar a instrução e a conexão
        $stmt->close();
    } else {
        echo "O campo Nome não foi enviado corretamente.";
    }

    $conn->close();
}
?>
