<?php

require_once "train_info_bd.php";

session_start();

if (!isset($_SESSION["conectado"]) || $_SESSION["conectado"] != true) {

    header("Location: pagina_login.php");

    exit;
   
}

if ($_SESSION["cargo_funcionario"] != "Gerente") {

    header("Location: pagina_login.php");

    exit;
   
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['BotaoSair'])) {

        session_unset();

        session_destroy();

        header("Location: pagina_login.php");
    }
}


$stmt = $conn->prepare("SELECT * FROM funcionario");
$stmt->execute();

$resultado = $stmt->get_result();


if($resultado && $resultado->num_rows >= 1) {

    $funcionarios = $resultado->fetch_all(MYSQLI_ASSOC);
    
}


?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="icon">
    <title>Todos os usuários</title>
    <link rel="stylesheet" href="../css/todos_usuarios.css">
</head>

<body>

    <table>

        <thead>

            <tr>

                <th class="cellHead">ID</th>

                <th class="cellHead">Nome</th>

                <th class="cellHead">E-Mail</th>

                <th class="cellHead">CPF</th>

                <th class="cellHead">RG</th>

                <th class="cellHead">Telefone</th>

                <th class="cellHead">DT Nascimento</th>

                <th class="cellHead">Endereço</th>

                <th class="cellHead">Plano de Saúde</th>

                <th class="cellHead">n° Plano de Saúde</th>

                <th class="cellHead">Gestor</th>

                <th class="cellHead">Cargo</th>

            </tr>

        </thead>

        <tbody>

            <?php


            if (!empty($funcionarios)) {

                foreach ($funcionarios as $linha) {

                    echo '<tr>

                            <td class="cell"> ' . $linha['id_funcionario'] . ' </td>

                            <td class="cell"> ' . $linha['nome_funcionario'] . ' </td>

                            <td class="cell"> ' . $linha['email_funcionario'] . ' </td>

                            <td class="cell"> ' . $linha['cpf_funcionario'] . ' </td>

                            <td class="cell"> ' . $linha['rg_funcionario'] . ' </td>

                            <td class="cell"> ' . $linha['telefone_funcionario'] . ' </td>

                            <td class="cell"> ' . $linha['dt_nasc_funcionario'] . ' </td>

                            <td class="cell"> ' . $linha['endereco_funcionario'] . ' </td>

                            <td class="cell"> ' . $linha['plan_saude_funcionario'] . ' </td>

                            <td class="cell"> ' . $linha['cart_plan_saude_funcionario'] . ' </td>

                            <td class="cell"> ' . $linha['gestor_funcionario'] . ' </td>

                            <td class="cell"> ' . $linha['cargo_funcionario'] . ' </td>

                        </tr>
                    ';

                }

            }

            ?>
        </tbody>
    </table>

    <br>

    <a href="pagina_inicial.php" id="PaginaInicial">Voltar pra tela inicial</a>

</body>