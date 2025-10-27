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
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="icon"> <!-- Ícone da aba do navegador -->
    <title>Monitoramento Manutenção</title>
    <link rel="stylesheet" href="../css/monitoramento_manutencao.css?v=<?php echo time(); ?>">
    <script src="../javascript/dashboard_geral.js?v=<?php echo time(); ?>"></script>
</head>

<body>
    <header>
        <!--buton tem 3 pra poder controlar pelo CSS-->
        <br>
        <h1>Manutenção</h1>
        <div id="butoesjuntos">
            <div id="buton1">
                 <button>Não Iniciado</button>
            </div>
            <div id="buton2">
                <button>Fazendo</button>
            </div>
            <div id="buton3">
                <button>Finalizado</button>
            </div>
        </div>
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
                <li><a href="dash_board_geral.php">Dashboard</a></li>
                <li><a href="relatorio_analise.php">Relatórios</a></li>
                <li><a href="central_apoio_condutor.php">Central de Apoio</a></li>
                <li><input type="submit" name="BotaoSair" id="BotaoSair" value="Sair"></li>
            </form>
        </ul>
    </nav>

    <section id="trens">

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
            </div>
            <div id="table5">
                <h2>Status</h2>
            </div>
        </div>
        <div id="divbody"> <!--Essa div mostra os status do trem-->
            <div id="table4">
                
            </div>
            <div id="table5">
                
            </div>
        </div>

    </section>

    <section id="alertas_tempo">

        <div id="table1">
            <div id="table2">
                <h3>Notificação</h3>
            </div>
            <div id="table3">
                <h3>Em tempo real</h3>
            </div>
        </div>


        <div id="divfinal">
            <br>
            <h4>O trem “Cascata” precisará de manutenção emergencial quando chegar na estação</h4>

            <h4>O trem “Centro Histórico” precisará de manutenção preventiva antes de ser inaugurado</h4>

            <h4>O trem “Norte-Sul” precisa de uma porta de caldeira nova (resolvido)</h4>

            <h4>O trem “Escola SESI Moinho” tem defeito na caldeira, com risco de reação exlosiva (resolvido)</h4>

            <h4>O trem “Cascata” precisa ter sua pintura re-feita (resolvido)</h4>
            <br>
        </div>

    </section>

    <section id="reportar_problema">

        <div id="table1_centro">
            <div id="table2_centro">
                <h3>Reportar problemas</h3>
            </div>
        </div>
        <div id="white_centro">

            <div class="white">

                <img
                    src="https://portais.univasf.edu.br/reitoria/imagens/03756058d18f4250bfeac9f5074209f1.png/@@images/a02cbd53-ddcd-4503-9013-4b3e08be317f.png">
                <a href="central_apoio_condutor.php">Central de Apoio ao Condutor</a>
            </div>

            <div class="white">
                <img
                    src="https://images.icon-icons.com/1744/PNG/512/3643728-balloon-chat-conversation-speak-word_113413.png">
                <a href="central_de_manutencao.php">Enviar Relatório</a>
            </div>

        </div>

    </section>

</body>
<script src="../javascript/monitoramento.js?v=<?php echo time(); ?>"></script>
<script src="../javascript/teste.js?v=<?php echo time(); ?>"></script>

</html>