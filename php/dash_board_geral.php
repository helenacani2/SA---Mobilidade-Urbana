<?php

require_once "train_info_bd.php";

session_start();

    $stmt = $conn->prepare("SELECT * FROM trens");
    $stmt->execute();

    $resultado = $stmt->get_result();

    $trens = $resultado->fetch_all(MYSQLI_ASSOC);

    $stmt = $conn->prepare("SELECT * FROM notificacao");
    $stmt->execute();

    $resultado = $stmt->get_result();

    $notificacao = $resultado->fetch_all(MYSQLI_ASSOC);

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
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="icon"> <!-- Ícone da aba do navegador -->
    <title>Dashboard Geral</title>
    <link rel="stylesheet" href="../css/dash_board_geral.css?v=<?php echo time(); ?>">
    <script src="../javascript/dashboard_geral.js?v=<?php echo time(); ?>"></script>
</head>

<body>
    <header>
        <br>
        <h1> Dashboard Geral </h1>
        <br>
    </header>

    <nav class="menu-hamburguer">
        <input type="checkbox" id="menu-toggle" />
        <label for="menu-toggle" class="menu-icon">☰</label>

        <ul class="menu-opcoes">
            <form method="post">
                <li><a href="pagina_inicial.php">Início</a></li>
                <li><a href="perfil_condutor.php">Perfil</a></li>
                <li><a href="gestao_rotas.php">Rotas</a></li>
                <li><a href="relatorio_analise.php">Relatórios</a></li>
                <li><a href="central_apoio_condutor.php">Central de Apoio</a></li>
                <li><input type="submit" name="BotaoSair" id="BotaoSair" value="Sair"></li>
            </form>
        </ul>
    </nav>

    <?php

    if ($_SESSION["cargo_funcionario"] == "Gerente") {

        echo '<a href="cadastrar_trem.php" id="BotaoCadastrarTrem">ㅤCadastrar novo tremㅤ</a>';
        echo '<br>';
        echo '<a href="cadastrar_trem.php" id="BotaoCadastrarNotificacao">ㅤCadastrar nova notificaçãoㅤ</a>';
    }

    ?>

    <div id="table1">

        <div id="table2">
            <h3>Trens</h3>
        </div>
        <div id="table3">
            <h3>Status dos trens</h3>
        </div>
    </div>
    <div id="divbody">
        <div id="table4">
            <h2>Nome Trem</h2>
        </div> <!--Primeira tabela-->
        <div id="table5">
            <h2>Status</h2>
        </div>
    </div>
    <div id="divbody">
        <div id="table4">

            <?php

            if (!empty($trens)) {

                foreach ($trens as $trem) {

                    echo '<h3>' . $trem['nome_trem'] . '</h3><hr>';
                }
            }

            ?>
            </div>

        <div id="table5">
            <?php

            if (!empty($trens)) {

                foreach ($trens as $trem) {

                    echo '<h3>' . $trem['estacao_atual_trem'] . '</h3>';
                
                echo '<hr>';
                }
            }

            ?>
        </div>
    </div>
    <div id="table1">
        <div id="table2">
            <h3>Horários</h3>
        </div> <!--Segunda tabela-->
        <div id="table3">
            <h3>Entrada e Saída de trens</h3>
        </div>
    </div>
    <div id="divbody">
        <div id="table4">
            <h2>Nome Trem</h2>
        </div>
        <div id="table5">
            <h2>Status</h2>
        </div>
    </div>
    <div id="divbody">
        <div id="table4">
            <?php

            if (!empty($trens)) {

                foreach ($trens as $trem) {

                    echo '<h3>' . $trem['nome_trem'] . '</h3><hr>';
                }
            }

            ?>
        </div>
        <div id="table5">

            <?php

            if (!empty($trens)) {

                foreach ($trens as $trem) {

                    echo '<h3>' . 'Placeholder' . '</h3>';
                
                echo '<hr>';
                }
            }

            ?>

        </div>
    </div>
    <div id="table1">
        <div id="table2">
            <h3>Notificações</h3>
        </div> <!--Área das notificações-->
        <div id="table3">
            <h3>Em tempo real</h3>
        </div>
    </div>
    <div id="white">
        <br>

            <?php

            if (!empty($notificacao)) {

                foreach ($notificacao as $notificacoes) {
                    echo '<hr>'; 
                    echo '<h4>' . $notificacoes['titulo_notificacao'] . '</h4>';
                    echo '<div class="notificacao">';
                    echo '<h5>' . $notificacoes['mensagem_notificacao'] . '</h5>';
                    echo '<h6>' . $notificacoes['data_notificacao'] . '</h6><hr>';
                    echo '</div>';
                    echo '<hr>';
                }
            }

            ?>

        <br>
    </div>
</body>

<script src="../javascript/teste.js?v=<?php echo time(); ?>"></script>

</html>