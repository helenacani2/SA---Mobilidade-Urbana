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
<title>Erro 404</title>
<link rel="stylesheet" href="../css/erro404.css?v=<?php echo time(); ?>">
</head>

<body>
    <br>
    <br>
    <br>


    <section id="tudo">

        <img src="../midias/erro404.png" id="erro">

        <h2 id="indisponivel">Página indisponível<h2>

                <section id="botoes"> <!--Essa section define os botões-->

                    <div id="preto" onclick="inicial()">

                        <a href="pagina_inicial.php">Voltar para a página inicial</a>

                    </div>

                    <br>

                    <div id="preto" onclick="recarregar()">

                        <a href="erropadrao.html">Recarregar página</a>

                    </div>

                    <br>
                    <div id="preto" onclick="sair()">
                        <form method="post">
                           <li><input type="submit" name="BotaoSair" id="BotaoSair" value="Sair">• Sair</li>
                    </form>
                    </div>

                </section>

    </section>

</body>

<footer>

    <script src="../javascript/erro.js"></script>

</footer>