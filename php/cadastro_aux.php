<?php

require_once("train_info_bd.php");

session_start();

$Invalido = false;


/* $sql = "SELECT * FROM funcionario";
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
    $NasceC = str_replace("/", "", trim($_POST['Nascimento'] ?? ''));
    $EnderC = trim($_POST['Endereco'] ?? '');
    $PlanC = trim($_POST['Plano'] ?? '');
    $CartC = trim($_POST['Carteira'] ?? '');
    $GestorC = trim($_POST['Gestor'] ?? '');
    $CargoC = trim($_POST['Cargo'] ?? '');

    //O CÓDIGO DAQUI VAI CHECAR SE OS PARÂMETROS DO CADASTRO SÃO VÁLIDOS. SE FOREM INVÁLIDOS, a variável "$Invalido" ficará "true"





/* 
    if (!empty($dados)) {

        foreach ($dados as $linha) {

            if ($linha['email'] == $EmailC) {

                $Invalido = true;

            }

        }
        
    } */

    function verificaTelefone($TelefoneC) {
    $TelefoneC = preg_replace('/[^0-9]/', '', $TelefoneC);

    if (preg_match('/^(?:[14689]\d|2[12478]|31|51|3[7-8])(?:9\d{8}|[1-5]\d{4}\d{4})$/', $TelefoneC)) {
        return true; 
    } else {
        return false; 
    }
}

function verificaEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true; 
    } else {
        return false; 
    }
}
 




    //O CÓDIGO DAQUI VAI CHECAR SE O USUÁRIO SENDO CADASTRADO JÁ EXISTE NO BANCO DE DADOS. SE EXISTIR, MENSAGEM DE ERRO. SENÃO, O USUÁRIO É ADICIONADO AO BANCO.

    // if($Invalido === false) {

        $stmt = $conn->prepare("INSERT INTO funcionario (nome_funcionario, email_funcionario, senha_funcionario, cpf_funcionario, rg_funcionario, telefone_funcionario, dt_nasc_funcionario, endereco_funcionario, plan_saude_funcionario, cart_plan_saude_funcionario, gestor_funcionario, cargo_funcionario) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if (empty($stmt)) {
            echo "<div>Erro ao gerar statement</div>";
        }

        $stmt->bind_param("ssssssssssss", $NomeC, $EmailC, $SenhaC, $CpfC, $RgC, $TelefoneC, $NasceC, $EnderC, $PlanC, $CartC, $GestorC, $CargoC);

    // }






if($stmt->execute()) {

        header("Location: pagina_cadastros.php");
        exit;

    } else {

        echo "Erro ao inserir: " . $stmt->error;

    };

$stmt->close();
$conn->close();

?>