<?php

require_once "train_info_bd.php";

session_start();

if (!isset($_SESSION["conectado"]) || $_SESSION["conectado"] != true) {

    header("Location: pagina_login.php");

    exit;
    
}

if ($_SESSION["cargo_funcionario"] != (("Gerente") || ("Equipe_Atendimento"))) {

    header("Location: pagina_login.php");

    exit;
   
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['BotaoSair'])) {

        session_unset();

        session_destroy();

        header("Location: pagina_login.php");

    }

};

$stmt = $conn->prepare("SELECT * FROM funcionario WHERE id_funcionario = $_SESSION[IDFuncionarioEscolhido]");
$stmt->execute();

$resultado = $stmt->get_result();

$FuncionarioEscolhido = $resultado->fetch_assoc();

//$_SESSION["IDFuncionarioEscolhido"]
?> 

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/perfil_condutor.css">

    <title>Perfil do Condutor</title>
</head>

<body>

<?php

//echo '<p>' . $FuncionarioEscolhido["nome_funcionario"] . '</p>';

?>

    <div class="tudo">
        <header>
            <p id="perfil">Perfil do Condutor</p>
            <div id="hr">
                <hr>
            </div>
        </header>

        <nav class="menu-hamburguer">
            <input type="checkbox" id="menu-toggle" />
            <label for="menu-toggle" class="menu-icon">☰</label>

            <ul class="menu-opcoes">
                <form method="post">
                    <li><a href="pagina_inicial.php">Início</a></li>
                    <li><a href="pagina_cadastro.php">Criar usuário</a></li>
                    <li><a href="todos_usuarios.html">Todos os usuários</a></li>
                    <li><input type="submit" name="BotaoSair" id="BotaoSair" value="Sair">• Sair</li>
                </form>
            </ul>
        </nav>

        <br>
        <div class="bolinha_selecao"></div>
        <div id="foto_nome">
            <?php echo '<p>' . $FuncionarioEscolhido["nome_funcionario"] . '</p>' ?>
        </div>
        <br>
        <hr>

        <div id="vvi">
            <fieldset>

                <div id="bodydiv">

                <?php

                    echo '<h5>' . 'Cargo: ' . str_replace("_", " de ", $FuncionarioEscolhido["cargo_funcionario"]) . '</h5>';
                    echo '<h5>' . 'Email: ' . $FuncionarioEscolhido["email_funcionario"] . '</h5>';
                    echo '<h5>' . 'Gestor: ' . $FuncionarioEscolhido["gestor_funcionario"] . '</h5>';
                    echo '<h5>' . 'Plano de Saúde: ' . $FuncionarioEscolhido["plan_saude_funcionario"] . '</h5>';
                    echo '<h5>' . 'Número da Carteira de Plano de Saúde: ' . $FuncionarioEscolhido["cart_plan_saude_funcionario"] . '</h5>';      //Dados do condutor
                    echo '<h5>' . 'Telefone: ' . $FuncionarioEscolhido["telefone_funcionario"] . '</h5>';
                    echo '<h5>' . 'RG: ' . $FuncionarioEscolhido["rg_funcionario"] . '</h5>';
                    echo '<h5>' . 'CPF: ' . $FuncionarioEscolhido["cpf_funcionario"] . '</h5>';
                    echo '<h5>' . 'Data de Nascimento: ' . $FuncionarioEscolhido["dt_nasc_funcionario"] . '</h5>';
                    echo '<h5>' . 'Endereço: ' . $FuncionarioEscolhido["endereco_funcionario"] . '</h5>';

                    ?>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <div id="bodydiv">

                <h4>Registros médicos:</h4>

                <?php

                    echo '<h5>Registro 1</h5>';
                    echo '<br>';
                    echo '<h5>Registro 2</h5>';        //Não é possível fazer isso agora
                    echo '<br>';
                    echo '<h5>Registro 3</h5>';
                    echo '<br>';

                ?>

            </fieldset>
        </div>

        <br>
        <br>
    </div>
</body>

<footer>
    <br>
    <br>
    <br>
    <br>
    <br>
</footer>

<script src="../javascript/teste.js"></script>

</html>