<?php

session_start();

require_once "train_info_bd.php";

$ProblemaSaude = $_POST['ProblemaSaude'];

$DataAtualString = date("Y-m-d H:i:s");


$stmt = $conn->prepare("INSERT INTO registro_medico (problema_medic, data_medic, funcionario_medic, tipo_medic) VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssis", $ProblemaSaude, $DataAtualString, $_SESSION["id_funcionario"], $_SESSION['ProblemaSaudeTipo']);

if($stmt->execute()) {

    header("Location: central_apoio_condutor.php");

    exit;

} else {

    echo "Erro ao inserir: " . $stmt->error;

}

    $stmt->close();
    $conn->close();


?>