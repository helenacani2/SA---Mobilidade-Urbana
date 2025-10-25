<?php

/* require_once "train_info_bd.php";

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
} */
?>

<!-- <meta charset="UTF-8">
<html lang="pt_BR">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="../midias/logomenor.png" type="icon">
<title>Relatórios</title>

<link rel="stylesheet" href="../css/central_apoio_condutor.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="tudo">
        <header>
            <section id="topo">
                <div class="entrar_pagina2 ; texto_topo">
                    <a href="central_apoio_condutor.php">Central de Apoio </a>
                </div>
                <div class="texto_topo">
                    <a href="central_de_manutencao.php">Relatórios</a>
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
               
                <section>
                    
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

<script src="../javascript/central_apoio_condutor.js?v=<?php echo time(); ?>"></script>
<script src="../javascript/teste.js?v=<?php echo time(); ?>"></script>

</html> -->

<?php

require_once "train_info_bd.php";

session_start();

if (!isset($_SESSION["conectado"]) || $_SESSION["conectado"] != true) {

    header("Location: pagina_login.php");

    exit;
}

$_SESSION['ProblemaTremTipo'] = "Não especificado";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['BotaoSair'])) {

        session_unset();

        session_destroy();

        header("Location: pagina_login.php");
    }



    if (isset($_POST['Colisao'])) {

        $_SESSION['ProblemaTremTipo'] = 'Colisão';
    }



    if (isset($_POST['ExamePreventivo'])) {

        $_SESSION['ProblemaTremTipo'] = 'Exame Preventivo';
    }



    if (isset($_POST['Obras'])) {

        $_SESSION['ProblemaTremTipo'] = 'Obras';
    }



    if (isset($_POST['Trilho'])) {

        $_SESSION['ProblemaTremTipo'] = 'Trilho';
    }



    if (isset($_POST['Veiculo'])) {

        $_SESSION['ProblemaTremTipo'] = 'Veículo';
    }



    if (isset($_POST['Outros'])) {

        $_SESSION['ProblemaTremTipo'] = 'Outros';
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
    <link rel="stylesheet" href="../css/central_apoio_condutor.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body onload="loop(), inicio()">
    <div class="tudo">

        <header>
            <section id="topo">
                <div class="texto_topo">
                    <a href="central_apoio_condutor.php">Central de Apoio </a>
                </div>

                <div class="entrar_pagina2 ; texto_topo">
                    <a href="central_de_manutencao.php">Relatórios</a>
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
                        <li><a href="relatorio_analise.php">Relatórios</a></li>
                        <li><input type="submit" name="BotaoSair" id="BotaoSair" value="Sair">• Sair</li>
                    </form>
                </ul>
            </nav>

            <main>

                <form id="meuForm" method="POST" action="registro_manutencao_aux.php">
                    <input type="hidden" id="ProblemaTremTipo" name="ProblemaTremTipo" value="Não especificado">

                    <section class="grid-bolinhas">
                        <div onclick="setProblema('Vômito')">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Colisão</p>
                        </div>

                        <div onclick="setProblema('Exame Preventivo')">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Exame Preventivo</p>
                        </div>

                        <div onclick="setProblema('Obras')">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Obras</p>
                        </div>

                        <div onclick="setProblema('Trilho')">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Trilho</p>
                        </div>

                        <div onclick="setProblema('Veiculo')">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Veículo</p>
                        </div>

                        <div onclick="setProblema('Outros')">
                            <div class="bolinha_selecao"></div>
                            <p class="texto-bolinha">Outros</p>
                        </div>
                    </section>

                    <div class="input-container">
                        <label id="mensagem">Nenhum problema selecionado</label>
                        <textarea name="ProblemaTrem" placeholder="Digite sua descrição aqui..." id="problem-description"></textarea>
                    </div>

                    <input type="submit" value="Enviar Relatório" id="botao_envio_apoio">

                </form>







            </main>

        </div>
    </div>

</body>

<script src="../javascript/central_apoio_condutor.js?v=<?php echo time(); ?>"></script>
<script src="../javascript/teste.js" ?v=<?php echo time(); ?>></script>

</html>