<?php

require_once("train_info_bd.php");

session_start();


$nomeT = trim($_POST['nomeIn'] ?? '');
$emailT = trim($_POST['emailIn'] ?? '');

$stmt = $conn->prepare("INSERT INTO dados (nome, email) VALUES (?, ?)");

$stmt->bind_param("ss", $nomeT, $emailT);


if($stmt->execute()) {

        header(("Location: pagina_cadastro.php"));
        exit;

    } else {

        echo "Erro ao inserir: " . $stmt->error;

    };

$stmt->close();
$conn->close();

?>