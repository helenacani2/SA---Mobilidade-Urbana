<?php

session_start();

require_once "train_info_bd.php";

//(nome_trem, estacao_atual_trem, linha_atual_trem, data_fabricacao_trem, fabricante_trem, maquinista_trem)

$NomeTrem = $_POST['TremNome'];

$FabricanteTrem = $_POST['TremFabricante'];

$FabricacaoTrem = $_POST['TremData'];

$EstacaoTrem = $_POST['TremEstacao'];

$LinhaTrem = $_POST['TremLinha'];

$MaquinistaTrem = $_POST['TremMaquinista'];

echo date("Y-m-d", strtotime($FabricacaoTrem));


$stmt = $conn->prepare("INSERT INTO trens (nome_trem, estacao_atual_trem, linha_atual_trem, data_fabricacao_trem, fabricante_trem, maquinista_trem) VALUES (?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssss", $NomeTrem, $EstacaoTrem, $LinhaTrem, $FabricacaoTrem, $FabricanteTrem, $MaquinistaTrem);

if($stmt->execute()) {

    header("Location: cadastrar_trem.php");

    exit;

} else {

    echo "Erro ao inserir: " . $stmt->error;

}

    $stmt->close();
    $conn->close();


?>