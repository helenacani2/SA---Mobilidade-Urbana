<?php


require_once "train_info_bd.php";


session_start();


if (!isset($_SESSION["conectado"]) || $_SESSION["conectado"] != true) {


    header("Location: pagina_login.php");


    exit;
   
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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


    if (!empty($dados)) {


        foreach ($dados as $linha) {


            if ($linha['email_funcionario'] == $EmailC) {


                $Invalido = true;

                DadosDuplicado();


            }


            if ($linha['cpf_funcionario'] == $CpfC) {

                $Invalido = true;


                DadosDuplicado();


            }


        }
       
    }


    //verificação de telefone:

    $TelefoneC = preg_replace('/[^0-9]/', '', $TelefoneC);

    if (!preg_match('/^(?:[14689]\d|2[12478]|31|51|3[7-8])(?:9\d{8}|[1-5]\d{4}\d{4})$/', $TelefoneC)) {

        $Invalido = true;

        DadosInvalidos();

    }


    if (!preg_match('/^.{8,}$/', $SenhaC)) {

        $Invalido = true;

        DadosInvalidos();
   
    }

   
    //verificação de email:

    if (!filter_var($EmailC, FILTER_VALIDATE_EMAIL)) {

        $Invalido = true;

        DadosInvalidos();

    }



    //verificação de cpf:


    // 1. extrai somente os números
    $CpfC = preg_replace('/[^0-9]/is', '', $CpfC);
   
    // 2. verifica se tem 11 dígitos
    if (strlen($CpfC) != 11) {

        $Invalido = true;

        DadosInvalidos();

        //echo "CPF inválido.";

    }


    // 3. faz o cálculo para validar os dígitos verificadores e tamanho do cpf
    if (strlen($CpfC) < 11) {

        $Invalido = true;

        DadosInvalidos();

    } else {

      for ($t = 9; $t < 11; $t++) {
        $soma = 0;
        $multiplicador = $t + 1; // Começa em 10 (para o 1º dígito) e em 11 (para o 2º)
       
        // loop para somar os produtos dos 9 ou 10 primeiros dígitos
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

            DadosInvalidos();

        }

    }  

    }


    if($Invalido === false) {

        $_SESSION['NomeTran'] = $NomeC; //Permite transmitir valor de variáveis pra outra página.
        $_SESSION['EmailTran'] = $EmailC;
        $_SESSION['SenhaTran'] = $SenhaC;
        $_SESSION['CpfTran'] = $CpfC;
        $_SESSION['RgTran'] = $RgC;
        $_SESSION['TelefoneTran'] = $TelefoneC;
        $_SESSION['NascTran'] = $NasceC;
        $_SESSION['EnderTran'] = $EnderC;
        $_SESSION['PlanTran'] = $PlanC;
        $_SESSION['CartTran'] = $CartC;
        $_SESSION['GestorTran'] = $GestorC;
        $_SESSION['CargoTran'] = $CargoC;

        header("Location: cadastro_aux.php");

    }

}

?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="icon"> <!-- Ícone da aba do navegador -->
    <link rel="stylesheet" href="../css/pagina_cadastro.css">

    <title>Cadastro</title>
</head>

<body onload="comeco()">
<!-- <body> -->

<?php

function DadosDuplicado() {

    echo "
   
    <section>

        <div class='erro'>
   
            <p class='erroTexto'>E-Mail ou CPF já foram registrados</p>

            <a href='pagina_cadastro.php' class='BotaoOk'>OK</a>

        </div>

    </section>

    ";

}


function DadosInvalidos() {

    echo "

        <div class='erro'>
   
            <p class='erroTexto'>E-Mail, CPF, Senha ou Telefone inválidos</p>

            <a href='pagina_cadastro.php' class='BotaoOk'>OK</a>

        </div>

    </section>

    ";

}

?>

    <section id="login">

        <form id="checar" method="POST">

            <img src="../midias/logotraininfo.png" id="logo">

            <div class="entrar">
                <div class="form-group">
                    <label for="nome">Nome completo:*</label>
                    <br>
                    <input type="text" id="nome" name="Nome" required>
                </div>



                <div class="form-group">
                    <label for="e-mail">Email*:</label>
                    <br>
                    <input type="email" id="e-mail" name="usuario" required>
                </div>

                <div class="form-group">
                    <label  for="senha">Senha*:</label>
                    <br>
                    <input type="password" id="senha" name="senha_usuario" required>

                    <div class="mostrarsenha" onclick="mostrar()">
                        <input type="checkbox" id="item2" name="mostrar_senha" value="Mostrar_senha">
                        Mostrar Senha
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <label for="cpf">CPF:*</label>
                    <br>
                    <input type="text" id="cpf" name="CPF" required>
                </div>

                <div class="form-group">
                    <label for="rg">RG:*</label>
                    <br>
                    <input type="text" id="rg" name="RG" required>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone:*</label>
                    <br>
                    <input type="tel" id="telefone" name="Telefone" required>
                </div>

                <div class="form-group">
                    <label for="data">Data de Nascimento:*</label>
                    <br>
                    <input type="date" id="data" name="Nascimento" required>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço:*</label>
                    <br>
                    <input type="text" id="endereco" name="Endereco" required>
                </div>

                <div class="form-group">
                    <label for="plano_saude">Plano de saúde:*</label>
                    <br>
                    <input type="text" id="plano_saude" name="Plano" required>
                </div>

                <div class="form-group">
                    <label for="num_plano_saude">Número da Carteira de Plano de Saúde:*</label>
                    <br>
                    <input type="text" id="num_plano_saude" name="Carteira" required>
                </div>

                <div class="form-group">
                    <label for="gestor">Gestor:*</label>
                    <br>
                    <input type="text" id="gestor" name="Gestor" required>
                </div>

                <div class="form-group">
                    <label for="cargo">Cargo:*</label>

                    <br>
                    <select id="cargo" name="Cargo" required>
                        <option value="">Selecione...</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Equipe_Manutencao">Equipe de Manutenção</option>
                        <option value="Equipe_Atendimento">Equipe de Apoio ao Condutor</option>
                        <option value="Maquinista">Maquinista</option>
                    </select>
                </div>
            </div>

            <input type="submit" class="BotaoContinuar" onclick="Continuar(event); erro()" name="BotaoCadastrar" id="BotaoCadastrar" value="Continuar">

            </div>
        </form>

        <script src="../javascript/mostrar_senha.js"></script>
        <script src="../javascript/cadastro.js"></script>

    </section>

</body>

</html>