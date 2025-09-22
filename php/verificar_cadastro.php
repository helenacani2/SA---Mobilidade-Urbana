<?php

require_once "train_info_bd.php";
require_once "pagina_cadastro";

 $email = $_POST['email'];

// Conectar ao banco
$con = new mysqli("localhost", "usuario", "senha", "banco");

// Verificar duplicidade
$sql = "SELECT COUNT(*) as total FROM usuarios WHERE email = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['total'] > 0) {
    echo "Este e-mail já foi cadastrado!";
} else {
    // Inserir o registro
    $insert_sql = "INSERT INTO usuarios (email) VALUES (?)";
    $insert_stmt = $con->prepare($insert_sql);
    $insert_stmt->bind_param("s", $email);
    $insert_stmt->execute();
    echo "Cadastro realizado com sucesso!";
}
?>