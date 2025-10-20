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

<body onload="loop()">
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
                <form id="meuForm" method="POST" action="registro_medico_aux.php">

                    <section class="grid-bolinhas">

                        <button name="Vomito" class="BotaoProblema" value="Vomito">

                            <div type="radio" name="bolinha" data-id="Vomito" onclick="vomito()">
                                <div class="bolinha_selecao"></div>
                                <p class="texto-bolinha">Vômito</p>
                            </div>

                        </button>




                        <button name="Enxaqueca" class="BotaoProblema" value="Enxaqueca">

                            <div type="radio" name="bolinha" data-id="Enxaqueca" onclick="enxaqueca()">
                                <div class="bolinha_selecao"></div>
                                <p class="texto-bolinha">Enxaqueca</p>
                            </div>

                        </button>




                        <button name="nausea" class="BotaoProblema" value="nausea">
                            <div type="radio" name="bolinha" data-id="nausea" onclick="nausea()">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Náusea</p>
                        </div>
                        </button>


                        <button name="casaco"  class="BotaoProblema" id="casaco">
                        <div type="radio" name="bolinha" data-id="cansaco" onclick="cansaco()">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Cansaço</p>
                        </div>
                        </button>

                        
                        <button name="febre" class="BotaoProblema" id="febre">
                        <div type="radio" name="bolinha" data-id="Febre" onclick="febre()">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Febre</p>
                        </div>
                        </button>

                        <button name="outros" class="BotaoProblema" id="outros">
                        <div type="radio" name="bolinha" data-id="Outros" onclick="outros()">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Outros</p>
                        </div>
                        </button>



                    </section>




                    <!--
                
                $_SESSION['ProblemaSaudeTipo'] = 'Vômito''Enxaqueca''Náusea''Cansaço''Febre''Outros'

                -->

                    <!-- <section class="grid-bolinhas">
                    <div type="radio" name="bolinha" data-id="Vomito" onclick="vomito()">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Vômito</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="Enxaqueca" onclick="enxaqueca()">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Enxaqueca</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="nausea" onclick="nausea()">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Náusea</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="cansaco" onclick="cansaco()">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Cansaço</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="Febre" onclick="febre()">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Febre</p>
                    </div>
                    <div type="radio" name="bolinha" data-id="Outros" onclick="outros()">
                        <div class="bolinha_selecao"></div>
                        <p class="texto-bolinha">Outros</p>
                    </div>
                </section> -->

                    <!--Aqui a baixo fica o lugar para o cliente expicar seu problema-->
                    <section>
                        <!-- Contêiner do campo de texto -->
                        <div class="input-container">
                            <label for="problem-description" id="mensagem">Nenhum problema selecionado</label>
                            <textarea type="text" id="problem-description" name="ProblemaSaude" placeholder="Digite sua descrição aqui..."></textarea>
                        </div>

                        <div class="botao_envio">
                            <input id="botao_envio_apoio" type="submit" value="Enviar Relatório">

                            <div id="resultado"></div>
                        </div>



                    </section>
                </form>
            </main>

        </div>
    </div>

</body>

<script src="../javascript/central_apoio_condutor.js?v=<?php echo time(); ?>"></script>
<script src="../javascript/teste.js" ?v=<?php echo time(); ?>></script>

<script>
    function loop() {

        console.log("<?php echo "$_SESSION[ProblemaSaudeTipo]" ?>");

        setTimeout(loop, 1000);

    }



    function outros() {

        document.getElementById("mensagem").innerHTML = "Descreva seu problema relacionado à: " + "outros";

        <?php $_SESSION['ProblemaSaudeTipo'] = "Outros"; ?>

        <?php //header("Location: dash_board_geral.php"); 
        ?>

    };
</script>

</html>