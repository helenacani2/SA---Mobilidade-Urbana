<?php

require_once("train_info_bd.php");

session_start();

$Invalido = false;


$sql = "SELECT * FROM funcionario";
$resultado = $conn->query($sql);


if ($resultado && $resultado->num_rows >= 1) {

    $dados = $resultado->fetch_all(MYSQLI_ASSOC);

}

    $NomeS = $_SESSION['NomeTran'];
    $EmailS = $_SESSION['EmailTran'];
    $SenhaS = $_SESSION['SenhaTran'];
    $CpfS = $_SESSION['CpfTran'];
    $RgS = $_SESSION['RgTran'];
    $TelefoneS = $_SESSION['TelefoneTran'];
    $NasceS = $_SESSION['NascTran'];
    $EnderS = $_SESSION['EnderTran'];
    $PlanS = $_SESSION['PlanTran'];
    $CartS = $_SESSION['CartTran'];
    $GestorS = $_SESSION['GestorTran'];
    $CargoS = $_SESSION['CargoTran'];

    //O CÓDIGO DAQUI VAI CHECAR SE OS PARÂMETROS DO CADASTRO SÃO VÁLIDOS. SE FOREM INVÁLIDOS, a variável "$Invalido" ficará "true"


    if (!empty($dados)) {

        foreach ($dados as $linha) {

            if ($linha['email_funcionario'] == $EmailS) {

                $Invalido = true;

            }

            if ($linha['cpf_funcionario'] == $CpfS) {

                $Invalido = true;

            }

        }
        
    }

    //verificação de telefone:

    $TelefoneS = preg_replace('/[^0-9]/', '', $TelefoneS);

    if (!preg_match('/^(?:[14689]\d|2[12478]|31|51|3[7-8])(?:9\d{8}|[1-5]\d{4}\d{4})$/', $TelefoneS)) { 

        $Invalido = true;

    }


    if (!preg_match('/^.{8,}$/', $SenhaS)) {
        $Invalido = true;
    
    }

//verificação de email:


    if (!filter_var($EmailS, FILTER_VALIDATE_EMAIL)) {

        $Invalido = true;

    }

    //verificação de cpf:

    // 1. extrai somente os números
    $CpfS = preg_replace('/[^0-9]/is', '', $CpfS);
    
    // 2. verifica se tem 11 dígitos
    if (strlen($CpfS) != 11) {
        $Invalido = true;
        echo "CPF inválido.";
    }

        if (strlen($CpfS) < 11) {

        $Invalido = true;

    } else {

      for ($t = 9; $t < 11; $t++) {
        $soma = 0;
        $multiplicador = $t + 1; // Começa em 10 (para o 1º dígito) e em 11 (para o 2º)
       
        // loop para somar os produtos dos 9 ou 10 primeiros dígitos
        for ($i = 0; $i < $t; $i++) {
            $soma += (int)$CpfS[$i] * ($multiplicador - $i);
        }
       
        // 4. calcula o dígito verificador ($d)
        $resto = $soma % 11;
        $digito_calculado = ($resto < 2) ? 0 : 11 - $resto;
       
        // 5. compara o dígito calculado com o dígito do CPF informado
        // O dígito verificador a ser comparado está na posição $t (9 ou 10)
        if ((int)$CpfS[$t] != $digito_calculado) {

            $Invalido = true;

        }

    }  

    }
 
    //O CÓDIGO DAQUI VAI CHECAR SE O USUÁRIO SENDO CADASTRADO JÁ EXISTE NO BANCO DE DADOS. SE EXISTIR, MENSAGEM DE ERRO. SENÃO, O USUÁRIO É ADICIONADO AO BANCO.

    if($Invalido === false) {

        $stmt = $conn->prepare("INSERT INTO funcionario (nome_funcionario, email_funcionario, senha_funcionario, cpf_funcionario, rg_funcionario, telefone_funcionario, dt_nasc_funcionario, endereco_funcionario, plan_saude_funcionario, cart_plan_saude_funcionario, gestor_funcionario, cargo_funcionario) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if (empty($stmt)) {
            echo "Erro ao gerar statement";
        }

        $stmt->bind_param("ssssssssssss", $NomeS, $EmailS, $SenhaS, $CpfS, $RgS, $TelefoneS, $NasceS, $EnderS, $PlanS, $CartS, $GestorS, $CargoS);

    }

if (!$Invalido) {

if($stmt->execute()) {

    header("Location: pagina_cadastro.php");
    exit;

} 

$stmt->close();

} else {

    header("Location: pagina_cadastro.php");
    exit;

};

$conn->close();

?>