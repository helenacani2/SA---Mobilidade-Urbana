<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="icon">
    <link rel="stylesheet" href="../css/cadastrar_trem.css?v=<?php echo time(); ?>">
    <title>Cadastrar novo alerta</title>
</head>

<nav class="menu-hamburguer">
    <input type="checkbox" id="menu-toggle" />
    <label for="menu-toggle" class="menu-icon">☰</label>

    <ul class="menu-opcoes">
        <form method="post">
            <li><a href="pagina_inicial.php">Início</a></li>
            <li><a href="perfil_condutor.php">Perfil</a></li>
            <li><a href="dash_board_geral.php">Dashboard</a></li>
            <li><a href="relatorio_analise.php">Relatórios</a></li>
            <li><a href="central_apoio_condutor.php">Central de Apoio</a></li>
            <li><input type="submit" name="BotaoSair" id="BotaoSair" value="Sair">• Sair</li>
        </form>
    </ul>
</nav>

<body>

    <form action="cadastrar_alerta_aux.php" method="POST">

        <label for="AlertaTipo" class="Legenda">Tipo do Alerta</label>
        
        <input type="text" id="AlertaTipo" class="Texto" name="AlertaTipo" required>

        <br>
        <br>

        <label for="AlertaMensagem" class="Legenda">Mensagem do Alerta</label>
        
        <input type="text" id="AlertaMensagem" class="Texto" name="AlertaMensagem" required>

        <br>
        <br>

        <input type="submit" id="BotaoEnviar" name="BotaoEnviar">

    </form>

</body>

</html>

<script src="../javascript/teste.js?v=<?php echo time(); ?>"></script>