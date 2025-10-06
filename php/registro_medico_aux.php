<?php

session_start();

require_once "train_info_bd.php";

$ProblemaSaude = $_POST['ProblemaSaude'];








$stmt = $conn->prepare("INSERT INTO registro_medico (problema_medic, funcionario_medic) VALUES (?, ?)");

$stmt->bind_param("si", $ProblemaSaude, $_SESSION["id_funcionario"]);

if($stmt->execute()) {

    header("Location: central_apoio_condutor.php");

    exit;

} else {

    echo "Erro ao inserir: " . $stmt->error;

}

    $stmt->close();
    $conn->close();


?>