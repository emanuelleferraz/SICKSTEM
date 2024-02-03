<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $gravidade = $_POST['Gravidade'];
    $classificacao = $_POST['Classificacao'];
    $condicao = $_POST['Condicao'];

    $sql = "UPDATE doenca SET Gravidade = ?, Classificacao = ?, Condicao = ? WHERE Nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $gravidade, $classificacao, $condicao, $nome);

    if ($stmt->execute()) {
        // Redireciona para a página de pesquisa_doenca.php após a edição bem-sucedida
        header("Location: pesquisa_doenca.php");
        exit(); // Certifique-se de sair após o redirecionamento para evitar execução adicional de código
    } else {
        echo "Erro ao editar a doença: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<a href="pagina_inicial.php" class="btn btn-primary">Voltar</a>
