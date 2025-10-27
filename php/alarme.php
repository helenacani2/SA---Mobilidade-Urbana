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

<!--Alarme do sistema-->

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="icon"> <!-- Ícone da aba do navegador -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alarme de Emergência</title>
    <link rel="stylesheet" href="../css/alarme.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../javascript/teste.js?v=<?php echo time(); ?>">
</head>

<header>
    <section class="topo">
        <div>
            <h2>Alerta de Emergência</h2>
            <br>
        </div>
        <div class="texto_alarme">
            <p>O alarme de emergência foi acionado. Por favor, siga as instruções de segurança das Centrais de Apoio:

                <br>
                <br>

            <div class="instruções"> <!--Essa div mostra os textos do alarme-->
                <?php

                if (!empty($alertas)) {

                    foreach ($alertas as $alerta) { 

                        echo '<h3>' . $alerta['tipo_alerta'] . '</h3>';
                        echo '<br>';

                        echo '<h4>' . $alerta['mensagem_alerta'] . '</h4>';
                        echo '<br>';

                        echo '<h5>' . $alerta['data_alerta'] . '</h5>';
                        echo '<br>';

                        echo '<hr>';
                    }
                }

                ?>
            </div>
            </p>

            <div class="entrar_pagina2"> <!--Essa div gera o botão que volta pra tela inicial-->
                <a href="pagina_inicial.php"> Voltar</a>
            </div>
    </section>
</header>

<body>

    <br>
    <br>
    <div class="audio"> <!--Essa div declara o som e define a aparência do alarme-->
        <button onclick="som()" class="botao">
            <img src="https://img.freepik.com/vetores-gratis/sino-de-notificacao-vermelho_78370-6897.jpg?semt=ais_hybrid&w=740"
                alt="Tocar som" id="zoomable-image" class="zooming">
        </button>
        <audio id="alarmeAudio" src="../midias/alarme.mp3"></audio>
    </div>
    <script>
        function som() {
            var audio = document.getElementById('alarmeAudio');
            audio.currentTime = 0;
            audio.play();
        }
    </script> <!--Esse script controla o som do site-->



</body>

</html>