<?php

require_once "train_info_bd.php";

session_start();

if (!isset($_SESSION["conectado"]) || $_SESSION["conectado"] != true) {

    header("Location: pagina_login.php");

    exit;
}

$_SESSION['ProblemaSaudeTipo'] = "Não especificado";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['BotaoSair'])) {

        session_unset();

        session_destroy();

        header("Location: pagina_login.php");
    }



    if (isset($_POST['Vomito'])) {

        $_SESSION['ProblemaSaudeTipo'] = 'Vômito';
    }



    if (isset($_POST['Enxaqueca'])) {

        $_SESSION['ProblemaSaudeTipo'] = 'Enxaqueca';
    }



    if (isset($_POST['Nausea'])) {

        $_SESSION['ProblemaSaudeTipo'] = 'Náusea';
    }



    if (isset($_POST['Cansaco'])) {

        $_SESSION['ProblemaSaudeTipo'] = 'Cansaço';
    }



    if (isset($_POST['Febre'])) {

        $_SESSION['ProblemaSaudeTipo'] = 'Febre';
    }



    if (isset($_POST['Outros'])) {

        $_SESSION['ProblemaSaudeTipo'] = 'Outros';
    }
}

//$Problema = "";



?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="icon"> <!-- Ícone da aba do navegador -->
    <title>Central de Apoio</title>
    <link rel="stylesheet" href="../css/central_apoio_condutor.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body onload="loop(), inicio()">
    <div class="tudo">

        <header>
            <section id="topo">
                <div class="texto_topo">
                    <a href="central_apoio_condutor.php">Central de Apoio </a>
                    <hr>
                </div>

                <div class="entrar_pagina2 ; texto_topo">
                    <a href="central_de_manutencao.php">Relatórios</a>
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

                <!--<form id="meuForm" method="POST" action="registro_medico_aux.php">

                    <section class="grid-bolinhas">

                        <div name="bolinha" data-id="Vomito" id="VomitoBolinha">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Vômito</p>
                        </div>


                        <div name="bolinha" data-id="Enxaqueca" id="EnxaquecaBolinha">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Enxaqueca</p>
                        </div>


                        <div name="bolinha" data-id="nausea" id="NauseaBolinha">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Náusea</p>
                        </div>


                        <div name="bolinha" data-id="cansaco" id="CansacoBolinha">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Cansaço</p>
                        </div>


                        <div name="bolinha" data-id="Febre" id="FebreBolinha">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Febre</p>
                        </div>


                        <div name="bolinha" data-id="Outros" id="OutrosBolinha">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Outros</p>
                        </div>

                    </section>




                    


                    <section>

                        <div id="RadioTudo">

                                <input class="ProblemaSaudeRadio" type="radio" name="ProblemaSaudeRadio" value="Vômito" onclick="vomito()" id="VomitoInput">
                                <input class="ProblemaSaudeRadio" type="radio" name="ProblemaSaudeRadio" value="Enxaqueca" onclick="enxaqueca()" id="EnxaquecaInput">
                                <input class="ProblemaSaudeRadio" type="radio" name="ProblemaSaudeRadio" value="Náusea" onclick="nausea()" id="NauseaInput">


                                <input class="ProblemaSaudeRadio" type="radio" name="ProblemaSaudeRadio" value="Cansaco" onclick="cansaco()" id="CansacoInput">
                                <input class="ProblemaSaudeRadio" type="radio" name="ProblemaSaudeRadio" value="Febre" onclick="febre()" id="FebreInput">
                                <input class="ProblemaSaudeRadio" type="radio" name="ProblemaSaudeRadio" value="Outros" onclick="outros()" id="OutrosInput">

                        </div>

                        <div class="input-container">
                            <label for="problem-description" id="mensagem">Nenhum problema selecionado</label>
                            <textarea type="text" id="problem-description" name="ProblemaSaude" placeholder="Digite sua descrição aqui..."></textarea>
                        </div>

                        <div class="botao_envio">
                            <input id="botao_envio_apoio" type="submit" value="Enviar Relatório">

                            <div id="resultado"></div>
                        </div>



                    </section>
                </form> -->







                <form id="meuForm" method="POST" action="registro_medico_aux.php">
                    <input type="hidden" id="ProblemaSaudeTipo" name="ProblemaSaudeTipo" value="Não especificado">

                    <section class="grid-bolinhas">
                        <div onclick="setProblema('Vômito')">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Vômito</p>
                        </div>

                        <div onclick="setProblema('Enxaqueca')">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Enxaqueca</p>
                        </div>

                        <div onclick="setProblema('Náusea')">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Náusea</p>
                        </div>

                        <div onclick="setProblema('Cansaço')">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Cansaço</p>
                        </div>

                        <div onclick="setProblema('Febre')">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Febre</p>
                        </div>

                        <div onclick="setProblema('Outros')">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Outros</p>
                        </div>
                    </section>

                    <div class="input-container">
                        <label id="mensagem">Nenhum problema selecionado</label>
                        <textarea name="ProblemaSaude" placeholder="Digite sua descrição aqui..." id="problem-description"></textarea>
                    </div>

                    <input type="submit" value="Enviar Relatório" id="botao_envio_apoio">

                </form>







            </main>

        </div>
    </div>

</body>

<script src="../javascript/central_apoio_condutor.js?v=<?php echo time(); ?>"></script>
<script src="../javascript/teste.js" ?v=<?php echo time(); ?>></script>

<script>
    



    /* function outros() {

        document.getElementById("mensagem").innerHTML = "Descreva seu problema relacionado à: " + "outros";

        <?php /* $_SESSION['ProblemaSaudeTipo'] = "Outros"; */ ?>

        

    }; */
</script>

</html>