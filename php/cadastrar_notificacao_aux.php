<?php

session_start();

require_once "train_info_bd.php";

$TituloNotificacao = $_POST['NotificacaoTitulo'];

$MensagemNotificacao = $_POST['NotificacaoMensagem'];

$stmt = $conn->prepare("INSERT INTO notificacao (titulo_notificacao, mensagem_notificacao) VALUES (?, ?)");

$stmt->bind_param("ss", $TituloNotificacao, $MensagemNotificacao);

if($stmt->execute()) {

    header("Location: cadastrar_notificacao.php");

    exit;

} else {

    echo "Erro ao inserir: " . $stmt->error;

}

    $stmt->close();
    $conn->close();


?>