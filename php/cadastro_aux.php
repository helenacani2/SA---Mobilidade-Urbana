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
    $NasceC = str_replace("/", "", trim($_POST['Nascimento'] ?? ''));
    $EnderC = trim($_POST['Endereco'] ?? '');
    $PlanC = trim($_POST['Plano'] ?? '');
    $CartC = trim($_POST['Carteira'] ?? '');
    $GestorC = trim($_POST['Gestor'] ?? '');
    $CargoC = trim($_POST['Cargo'] ?? '');

    //O CÓDIGO DAQUI VAI CHECAR SE OS PARÂMETROS DO CADASTRO SÃO VÁLIDOS. SE FOREM INVÁLIDOS, a variável "$Invalido" ficará "true"


    if (!empty($dados)) {

        foreach ($dados as $linha) {

            if ($linha['email_funcionario'] == $EmailC) {

                $Invalido = true;

            }

            if ($linha['cpf_funcionario'] == $CpfC) {

                $Invalido = true;

            }

        }
        
    }

    //verificação de telefone:

    $TelefoneC = preg_replace('/[^0-9]/', '', $TelefoneC);

    if (!preg_match('/^(?:[14689]\d|2[12478]|31|51|3[7-8])(?:9\d{8}|[1-5]\d{4}\d{4})$/', $TelefoneC)) { 

        $Invalido = true;

        return false;

    }

    //verificação de senha:

    if (!preg_match('/^.{8,}$/', $SenhaC)) {
        $Invalido = true;
        return false;
    }

//verificação de email:


    if (!filter_var($EmailC, FILTER_VALIDATE_EMAIL)) {

        $Invalido = true;

        return false;

    }

    //verificação de cpf:

    // 1. extrai somente os números
    $CpfC = preg_replace('/[^0-9]/is', '', $CpfC);
    
    // 2. verifica se tem 11 dígitos
    if (strlen($CpfC) != 11) {
        $Invalido = true;
        return false;
    }

    // 3. faz o cálculo para validar os dígitos verificadores
    for ($t = 9; $t < 11; $t++) {
        $soma = 0;
        $multiplicador = $t + 1; // Começa em 10 (para o 1º dígito) e em 11 (para o 2º)
        
        // Loop para somar os produtos dos 9 ou 10 primeiros dígitos
        for ($i = 0; $i < $t; $i++) {
            $soma += (int)$CpfC[$i] * ($multiplicador - $i);
        }
        
        // 4. calcula o dígito verificador ($d)
        $resto = $soma % 11;
        $digito_calculado = ($resto < 2) ? 0 : 11 - $resto;
        
        // 5. compara o dígito calculado com o dígito do CPF informado
        // O dígito verificador a ser comparado está na posição $t (9 ou 10)
        if ((int)$CpfC[$t] != $digito_calculado) {
            $Invalido = true;
            return false;
        }
    }
    
    // 6. se tudo deu certo, o CPF é válido
    return true;
 
    //O CÓDIGO DAQUI VAI CHECAR SE O USUÁRIO SENDO CADASTRADO JÁ EXISTE NO BANCO DE DADOS. SE EXISTIR, MENSAGEM DE ERRO. SENÃO, O USUÁRIO É ADICIONADO AO BANCO.

    if($Invalido === false) {

        $stmt = $conn->prepare("INSERT INTO funcionario (nome_funcionario, email_funcionario, senha_funcionario, cpf_funcionario, rg_funcionario, telefone_funcionario, dt_nasc_funcionario, endereco_funcionario, plan_saude_funcionario, cart_plan_saude_funcionario, gestor_funcionario, cargo_funcionario) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if (empty($stmt)) {
            echo "<div>Erro ao gerar statement</div>";
        }

        $stmt->bind_param("ssssssssssss", $NomeC, $EmailC, $SenhaC, $CpfC, $RgC, $TelefoneC, $NasceC, $EnderC, $PlanC, $CartC, $GestorC, $CargoC);

    }

if (!$Invalido) {

if($stmt->execute()) {

        header("Location: pagina_cadastro.php");
        exit;

    } 

$stmt->close();

} else {

        echo "Erro ao inserir: ";

};

$conn->close();

?>