<?php

session_start();

require_once "train_info_bd.php";

$TipoAlerta = $_POST['AlertaTipo'];

$MensagemNotificacao = $_POST['AlertaMensagem'];

$stmt = $conn->prepare("INSERT INTO alertas (tipo_alerta, mensagem_alerta) VALUES (?, ?)");

$stmt->bind_param("ss", $TipoAlerta, $MensagemNotificacao);

if($stmt->execute()) {

    header("Location: cadastrar_alerta.php");

    exit;

} else {

    echo "Erro ao inserir: " . $stmt->error;

}

    $stmt->close();
    $conn->close();


?>