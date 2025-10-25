<?php

session_start();

require_once "train_info_bd.php";

$ProblemaTrem = $_POST['ProblemaTrem'];

$DataAtualString = date("Y-m-d H:i:s");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['ProblemaTremTipo'] = $_POST['ProblemaTremTipo'] ?? 'Não especificado';

    // Exemplo de inserção:
    $tipo = $_SESSION['ProblemaTremTipo'];
    $descricao = $_POST['ProblemaTrem'] ?? '';

    echo "Tipo: " . htmlspecialchars($tipo) . "<br>";
    echo "Descrição: " . htmlspecialchars($descricao);

    // Lógica do INSERT de dados no banco
}





$stmt = $conn->prepare("INSERT INTO manutencao (problema_manutencao, data_inicio_manutencao, tipo_manutencao, trem_manutencao) VALUES (?, ?, ?, ?)");

$stmt->bind_param("sssi", $ProblemaTrem, $DataAtualString, $_SESSION["id_funcionario"], $_SESSION['ProblemaSaudeTipo']);

if($stmt->execute()) {

    header("Location: central_apoio_condutor.php");

    exit;

} else {

    echo "Erro ao inserir: " . $stmt->error;

}

    $stmt->close();
    $conn->close();





?>