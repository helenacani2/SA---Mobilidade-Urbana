<?php

session_start();

require_once "train_info_bd.php";

$NomeTrem = $_POST['TremNome'];

$FabricanteTrem = $_POST['TremFabricante'];

$FabricacaoTrem = $_POST['TremData'];

$EstacaoTrem = "Estação Placeholder";

$LinhaTrem = "Linha Placeholder";

echo date("Y-m-d", strtotime($FabricacaoTrem));


$stmt = $conn->prepare("INSERT INTO trens (nome_trem, estacao_atual_trem, linha_atual_trem, data_fabricacao_trem, fabricante_trem) VALUES (?, ?, ?, ?, ?)");

$stmt->bind_param("sssss", $NomeTrem, $EstacaoTrem, $LinhaTrem, $FabricacaoTrem, $FabricanteTrem);

if($stmt->execute()) {

    header("Location: cadastrar_trem.php");

    exit;

} else {

    echo "Erro ao inserir: " . $stmt->error;

}

    $stmt->close();
    $conn->close();


?>