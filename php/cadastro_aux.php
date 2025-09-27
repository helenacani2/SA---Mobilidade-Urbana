<?php

require_once("train_info_bd.php");

session_start();

$Invalido = false;


$sql = "SELECT * FROM funcionario";
$resultado = $conn->query($sql);


if ($resultado && $resultado->num_rows >= 1) {

    $dados = $resultado->fetch_all(MYSQLI_ASSOC);

}


    


    $NomeC = trim($_POST['Nome'] ?? '');
    $EmailC = trim($_POST['usuario'] ?? '');
    $SenhaC = trim($_POST['senha_usuario'] ?? '');
    $CpfC = trim($_POST['CPF'] ?? '');
    $RgC = trim($_POST['RG'] ?? '');
    $TelefoneC = trim($_POST['Telefone'] ?? '');
    $NasceC = trim($_POST['Nascimento'] ?? '');
    $EnderC = trim($_POST['Endereco'] ?? '');
    $PlanC = trim($_POST['Plano'] ?? '');
    $CartC = trim($_POST['Carteira'] ?? '');
    $GestorC = trim($_POST['Gestor'] ?? '');
    $CargoC = trim($_POST['Cargo'] ?? '');






    //O CÓDIGO DAQUI VAI CHECAR SE OS PARÂMETROS DO CADASTRO SÃO VÁLIDOS. SE FOREM INVÁLIDOS, a variável "$Invalido" ficará "true"






    if (!empty($dados)) {

        foreach ($dados as $linha) {

            if ($linha['email'] == $EmailC) {

                $Invalido = true;

            }

        }
        
    }





    //O CÓDIGO DAQUI VAI CHECAR SE O USUÁRIO SENDO CADASTRADO JÁ EXISTE NO BANCO DE DADOS. SE EXISTIR, MENSAGEM DE ERRO. SENÃO, O USUÁRIO É ADICIONADO AO BANCO.

    if($Invalido === false) {

        $stmt = $conn->prepare("INSERT INTO funcionario (nome_funcionario, email_funcionario, senha_funcionario, cpf_funcionario, rg_funcionario, telefone_funcionario, dt_nasc_funcionario, endereco_funcionario, plan_saude_funcionario, cart_plan_saude_funcionario, gestor_funcionario, cargo_funcionario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssssdsssss", $NomeC, $EmailC, $SenhaC); //INCOMPLETO

    }






if($stmt->execute()) {

        header(("Location: pagina_cadastro.php"));
        exit;

    } else {

        echo "Erro ao inserir: " . $stmt->error;

    };

$stmt->close();
$conn->close();

?>