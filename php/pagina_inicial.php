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
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="icon"> <!-- Ícone da aba do navegador -->
    <title>Bem Vindo</title>
    <link rel="stylesheet" href="../css/pagina_inicial.css">
</head>

<body onload="barra_paginas()">

    <section id="barra_de_cima">

        <div class="barra_alinhar">

            <img id="logo" src="../midias/logotraininfo.png">

        </div>

        <div class="barra_alinhar">

            <div id="pesquisa">

                <p id="lupa_pesquisa">🔍︎</p>

                <p id="texto_pesquisa">Pesquisar</p>
                
            </div>

        </div>

        <br>

        <form method="POST">
            <input type="submit" name="BotaoSair" id="BotaoSair" value="Sair">
        </form>

    </section>

    <section id="barra_paginas">
        
        <h2 id="paginas_texto"></h2>
        
        <div id="segura_imagem">
        
            <img id="paginas_imagem" onclick="clicar()">

        </div>

        <div id="pontos">

            <p id="bola_um">∙</p>

            <p id="bola_dois">∙</p>

            <p id="bola_tres">∙</p>

            <p id="bola_quatro">∙</p>

            <p id="bola_cinco">∙</p>
            </div>

    </section>

    <section id="paginas_redondas">

        <h1>Páginas ></h1>

        <div class="flexivel">

            <div class="redondo">

                <img onclick="dashboard()" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcDbUBMHseZhclrQl3aAD7VD3t6rGU9vQ0yQ&s">

                <h2 onclick="dashboard()">Dashboard</h2>
            
            </div>

            <div class="redondo">

                <img onclick="mapa()" src="https://www.metrocptm.com.br/wp-content/uploads/2019/09/mapa-rede-metro-cptm-0125-abre-1.jpg">

                <h2 onclick="mapa()">Mapa</h2>
            
            </div>

            <div class="redondo">

                <img onclick="central()" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0ihsPCgIqz3F36VJxfbMq3_w-K979rfhuzQ&s">

                <h2 onclick="central()">Central</h2>
            
            </div>

            <?php

            if ($_SESSION["cargo_funcionario"] == "Gerente") {

                echo '

                <div class="redondo">

                    <img onclick="cadastrar()" src="https://s2.glbimg.com/sZhZrPSvCkCcczMBRuDrf8Qk_oU=/smart/e.glbimg.com/og/ed/f/original/2019/07/10/13-estacoes-de-trem-mais-bonitas-do-mundo62.jpg">

                    <h2 onclick="cadastrar()">Cadastrar Usuário</h2>
            
                </div>

                ';

            }

                ?>

        </div>

        <div class="flexivel">

            <div class="redondo">

                <img onclick="manutencao()" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTF6VgephvuGwEgrK6gaIbxqwLV2khVTb-bCA&s">

                <h2 onclick="manutencao()">Manutenção</h2>
            
            </div>

            <div class="redondo">

                <img onclick="relatorios()" src="https://s2-techtudo.glbimg.com/mBdu7y0sX_cbKnieGIleTst1ADY=/0x0:825x619/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2020/u/n/83nNsCQ8SWRrziGD1mAw/stonks-meme.png">

                <h2 onclick="relatorios()">Relatórios e Análises</h2>

            </div>

            <div class="redondo">

                <img onclick="perfil()" src="https://m.media-amazon.com/images/I/618UpHuoc4L._AC_UY1000_.jpg">

                <h2 onclick="perfil()">Perfil do Condutor</h2>

            </div>

            <?php

            if ($_SESSION["cargo_funcionario"] == (("Gerente") || ("Equipe_Atendimento"))) {

                echo '

                <div class="redondo">

                    <img onclick="usuarios()" src="https://cdn-icons-png.flaticon.com/512/6681/6681204.png">

                    <h2 onclick="usuarios()">Todos os Usuários</h2>

                </div>

                ';

            }

            ?>

        </div>

    </section>

    <section id="paginas_linhas">

        <h1>Linhas ></h1>

        <div class="flexivel">

            <div class="quadrado">

                <img src="../midias/rota_um.png">

                <h3>Joinville - SC</h3>

                <h2>Norte-Sul</h2>

            </div>

            <div class="quadrado">

                <img src="../midias/rota_dois.png">

                <h3>Joinville - SC</h3>

                <h2>Sul-Centro</h2>

            </div>

            <div class="quadrado">

                <img src="../midias/rota_tres.png">

                <h3>Joinville - SC</h3>

                <h2>Cascata</h2>

            </div>

        </div>

    </section>

</body>

<script src="../javascript/pagina_inicial.js"></script>

</html>