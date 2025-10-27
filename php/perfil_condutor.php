<?php

require_once "train_info_bd.php";

session_start();

if (!isset($_SESSION["conectado"]) || $_SESSION["conectado"] != true) {

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

$stmt = $conn->prepare("SELECT * FROM funcionario WHERE id_funcionario = $_SESSION[id_funcionario]");
$stmt->execute();

$resultado = $stmt->get_result();

$DadosFuncionario = $resultado->fetch_assoc();

?> 

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/perfil_condutor.css?v=<?php echo time(); ?>">

    <title>Perfil do Condutor</title>
</head>

<body>
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

<?php

            if ($_SESSION["cargo_funcionario"] == (("Gerente") || ("Equipe_Atendimento"))) {

                echo '

                <li><a href="todos_usuarios.html">Todos os usuários</a></li>

                ';

            }
    
?>
                    
                    <li><input type="submit" name="BotaoSair" id="BotaoSair" value="Sair"></li>
                </form>
            </ul>
        </nav>

        <br>
        <div class="bolinha_selecao">
        </div>
        <div id="foto_nome">
            <?php echo '<p>' . $_SESSION["nome_funcionario"] . '</p>' ?>
        </div>
        <br>
        <hr>

        <div id="vvi">
            <fieldset>

                <div id="bodydiv">

                    <?php

                    echo '<h5>' . 'Cargo: ' . str_replace("_", " de ", $DadosFuncionario["cargo_funcionario"]) . '</h5>';
                    echo '<h5>' . 'Email: ' . $DadosFuncionario["email_funcionario"] . '</h5>';
                    echo '<h5>' . 'Gestor: ' . $DadosFuncionario["gestor_funcionario"] . '</h5>';
                    echo '<h5>' . 'Plano de Saúde: ' . $DadosFuncionario["plan_saude_funcionario"] . '</h5>';
                    echo '<h5>' . 'Número da Carteira de Plano de Saúde: ' . $DadosFuncionario["cart_plan_saude_funcionario"] . '</h5>';      //Dados do condutor
                    echo '<h5>' . 'Telefone: ' . $DadosFuncionario["telefone_funcionario"] . '</h5>';
                    echo '<h5>' . 'RG: ' . $DadosFuncionario["rg_funcionario"] . '</h5>';
                    echo '<h5>' . 'CPF: ' . $DadosFuncionario["cpf_funcionario"] . '</h5>';
                    echo '<h5>' . 'Data de Nascimento: ' . $DadosFuncionario["dt_nasc_funcionario"] . '</h5>';
                    echo '<h5>' . 'Endereço: ' . $DadosFuncionario["endereco_funcionario"] . '</h5>';

                    ?>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <div id="bodydiv">
                    <h5>Senha:</h5>
                    <h5>Email (recuperação e redefinição de senha):</h5>    <!--Dados mais importantes do condutor-->
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

<script src="../javascript/teste.js?v=<?php echo time(); ?>"></script>

</html>