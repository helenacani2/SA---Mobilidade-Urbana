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

<meta charset="UTF-8">
<html lang="pt_BR">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="../midias/logomenor.png" type="icon"> <!-- Ícone da aba do navegador -->
<title>Relatórios</title>

<link rel="stylesheet" href="../css/central_apoio_condutor.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="tudo">
        <header>
            <section id="topo">
                <div class="entrar_pagina2 ; texto_topo">
                    <a href="central_apoio_condutor.html">Central de Apoio </a>
                </div>
                <div class="texto_topo">
                    <a href="central_de_manutencao.html">Relatórios</a>
                    <hr>
                </div>
            </section>
        </header>

        <div class="tudosheader">

            <nav class="menu-hamburguer">
                <input type="checkbox" id="menu-toggle" />
                <label for="menu-toggle" class="menu-icon">☰</label>

                <ul class="menu-opcoes">
                    <form method="post">
                    <li><a href="pagina_inicial.php">Início</a></li>
                    <li><a href="perfil_condutor.php">Perfil</a></li>
                    <li><a href="gestao_rotas.php">Rotas</a></li>
                    <li><a href="dash_board_geral.php">Dashboard</a></li>
                    <li><a href="central_apoio_condutor.php">Central de Apoio</a></li>
                        <li><input type="submit" name="BotaoSair" id="BotaoSair" value="Sair">• Sair</li>
                    </form>
                </ul>
            </nav>

            <main>
                <section class="grid-bolinhas">
                    <div type="radio" name="bolinha" data-id="Colisao">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Colisão</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="exame_preventido">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Exame preventivo</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="obras">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Obras</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="trilho_obstruido">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Trilho
                            obstruído</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="veiculo_parado">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Veículo
                            Parado</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="Outros_relatorio">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Outros</p>
                    </div>
                </section>
                <!--Aqui a baixo fica o lugar para o cliente explicar seu problema-->
                <section>
                    <!-- Contêiner do campo de texto -->
                    <div class="input-container">
                        <label for="problem-description" id="mensagem">Descreva seu problema relacionado à: <span
                                id="selected-option"></span></label>
                        <textarea id="problem-description" placeholder="Digite sua descrição aqui..."></textarea>
                    </div>

                    <div class="botao_envio">
                        <button type="submit">Enviar Relatório</button>
                    </div>

                </section>
            </main>
            <footer></footer>
        </div>
    </div>
</body>

<!-- <script src="central_apoio_condutor.html"></script> -->
<script src="../javascript/teste.js?v=<?php echo time(); ?>"></script>

</html>