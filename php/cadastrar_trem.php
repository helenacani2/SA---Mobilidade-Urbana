<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="icon">
    <link rel="stylesheet" href="../css/cadastrar_trem.css?v=<?php echo time(); ?>">
    <title>Cadastrar novo trem</title>
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

    <form action="cadastrar_trem_aux.php" method="POST">

        <label for="TremNome" class="Legenda">Nome do Trem</label>
        
        <input type="text" id="TremNome" class="Texto" name="TremNome" required>

        <br>
        <br>

        <label for="TremData" class="Legenda">Data de Fabricação do Trem</label>
        
        <input type="date" id="TremData" class="Texto" name="TremData" required>

        <br>
        <br>

        <label for="TremFabricante" class="Legenda">Fabricante do Trem</label>
        
        <input type="text" id="TremFabricante" class="Texto" name="TremFabricante" required>

        <br>
        <br>

        <label for="TremEstacao" class="Legenda">Estação do Trem</label>
        
        <input type="text" id="TremEstacao" class="Texto" name="TremEstacao" required>

        <br>
        <br>

        <label for="TremLinha" class="Legenda">Linha do Trem</label>
        
        <input type="text" id="TremLinha" class="Texto" name="TremLinha" required>

        <br>
        <br>

        <label for="TremMaquinista" class="Legenda">Maquinista do Trem</label>
        
        <input type="text" id="TremMaquinista" class="Texto" name="TremMaquinista" required>

        <br>
        <br>

        <input type="submit" id="BotaoEnviar" name="BotaoEnviar">

    </form>

</body>

</html>

<script src="../javascript/teste.js?v=<?php echo time(); ?>"></script>