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

$stmt = $conn->prepare("SELECT * FROM rotas");
$stmt->execute();

$resultado = $stmt->get_result();

$rotas = $resultado->fetch_all(MYSQLI_ASSOC);

$NumeroDeRotas = $resultado->num_rows;

?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="icon"> <!-- Ícone da aba do navegador -->
    <title>Gestão de Rotas</title>
    <link rel="stylesheet" href="../css/gestao_rotas.css?v=<?php echo time(); ?>">
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
            <li><input type="submit" name="BotaoSair" id="BotaoSair" value="Sair"></li>
        </form>
    </ul>
</nav>

<body id="body" onload="ao_entrar(), tempo_estimado(), em_viagem()">

    <br>

    <div id="tudo">

        <div id="topo">

            <section id="rotas"> <!--Essa section define os botões que mudam a rota mostrada-->

                <?php

                //for ($i = 1; $i <= $NumeroDeRotas; $i++) {

                $ContadorRotas = 1;

                foreach ($rotas as $RotaSelecionada) {

                    echo "<li>

                    <input type='radio' id='imag_um' name='bagulho' checked>

                    <label for='imag_um' onclick='rota_$ContadorRotas()'>" . $RotaSelecionada['nome'] . "</label>

                </li>";
                }



                ?>



            </section>

        </div>


        <div id="mapaRota" style="position: relative;">

            <img id="imagem_rota" src="../midias/rota_um.png">

            <div id="legenda_rota_maior">

                <div id="legenda_rota_menor">

                    <h2 id="linha"></h2>

                    <div class="flexivel">

                        <h3 id="rota_atual">Rota atual </h3> <!--Placa que mostra as informações da rota atual-->

                        <div class="flexivel">

                            <h3 id="hora">. Chega na estação àsㅤ</h3>

                            <p id="hora_rota"></p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <br>

        <div id="local_das_imagens">

            <img id="imagem_trem" src="../midias/trem1.png">

        </div>

        <section id="textos_info"> <!--Essa section mostra as informações adicionais da rota atual-->

            <div id="texto_cinza">

                <div class="flexivel">

                    <p id="em_viagem"></p>

                </div>

                <div class="flexivel">

                    <p id="linha_nome"></p>

                </div>

            </div>

            <div class="flexivel">

                <div id="cobranca">

                    <h3>R$</h3>

                    <h3 id="preco_passagem"></h3>

                    <p>│</p>

                    <p>Cobrança atual da passagem</p>

                </div>

            </div>

        </section>

    </div>

</body>

<script src="../javascript/gestao_rotas.js?v=<?php echo time(); ?>"></script>
<script src="../javascript/teste.js?v=<?php echo time(); ?>"></script>

</html>