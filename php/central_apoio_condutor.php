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
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="icon"> <!-- Ícone da aba do navegador -->
    <title>Central de Apoio</title>
    <link rel="stylesheet" href="../css/central_apoio_condutor.css">
</head>

<body>
    <div class="tudo">

        <header>
            <section id="topo">
                <div class="texto_topo">
                    <a href="central_apoio_condutor.html">Central de Apoio </a>
                    <hr>
                </div>

                <div class="entrar_pagina2 ; texto_topo">
                    <a href="central_de_manutencao.html">Relatórios</a>
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
                        <li><a href="relatorio_analise.php">Relatórios</a></li>
                        <li><input type="submit" name="BotaoSair" id="BotaoSair" value="Sair">• Sair</li>
                    </form>
                </ul>
            </nav>

            <main>
                <section class="grid-bolinhas">
                    <div type="radio" name="bolinha" data-id="Vomito">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Vômito</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="Enxaqueca">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Enxaqueca</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="nausea">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Náusea</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="cansaco">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Cansaço</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="Febre">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Febre</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="Outros">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Outros</p>
                    </div>
                </section>

                <!--Aqui a baixo fica o lugar para o cliente expicar seu problema-->
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

        </div>
    </div>
</body>

<script src="central_apoio_condutor.html"></script>
<script src="../javascript/teste.js"></script>

</html>