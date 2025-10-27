<?php

require_once "train_info_bd.php";


session_start();

if (!isset($_SESSION["conectado"]) || $_SESSION["conectado"] != true) {

    header("Location: pagina_login.php");

    exit;
}

if ($_SESSION["cargo_funcionario"] != (("Gerente") || ("Equipe_Atendimento"))) {

    header("Location: pagina_login.php");

    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['BotaoSair'])) {

        session_unset();

        session_destroy();

        header("Location: pagina_login.php");
    }
};

$stmt = $conn->prepare("SELECT * FROM funcionario WHERE id_funcionario = $_SESSION[IDFuncionarioEscolhido]");
$stmt->execute();

$resultado = $stmt->get_result();

$FuncionarioEscolhido = $resultado->fetch_assoc();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* $Contador = 1;

    foreach ($FuncionarioEscolhido as $linhaRedirect) {

        if (isset($_POST["Botao$Contador"])) {

            $sql = "UPDATE registro_medico SET resolvido_medic='Sim' WHERE id_medic = $Contador AND funcionario_medic = $_SESSION[IDFuncionarioEscolhido]";

            $conn->query($sql);
        }

        $Contador++;
    } */

    $query = "SELECT id_medic FROM registro_medico";





    $stmt = $conn->prepare($query);
    $stmt->execute();

    /* store the result in an internal buffer */
    $stmt->store_result();




    $QuantidadeDeLinhas = $stmt->num_rows;


    for ($i = 1; $i <= $QuantidadeDeLinhas; $i++) {

        if (isset($_POST["Botao$i"])) {

            $sql = "UPDATE registro_medico SET resolvido_medic='Sim' WHERE id_medic = $i AND funcionario_medic = $_SESSION[IDFuncionarioEscolhido]";

            $conn->query($sql);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/perfil_condutor.css?v=<?php echo time(); ?>">

    <title>Perfil do Condutor</title>
</head>

<body onload="Comeco()">

    <div class="tudo">
        <header>
            <p id="perfil">Perfil do Condutor</p>
            <div id="hr">
                <hr>
            </div>
        </header>

        <nav class="menu-hamburguer">
            <input type="checkbox" id="menu-toggle" />
            <label for="menu-toggle" class="menu-icon">☰</label>

            <ul class="menu-opcoes">
                <form method="post">
                    <li><a href="pagina_inicial.php">Início</a></li>
                    <li><a href="pagina_cadastro.php">Criar usuário</a></li>
                    <li><a href="todos_usuarios.html">Todos os usuários</a></li>
                    <li><input type="submit" name="BotaoSair" id="BotaoSair" value="Sair"></li>
                </form>
            </ul>
        </nav>

        <br>
        <div class="bolinha_selecao"></div>
        <div id="foto_nome">
            <?php echo '<p>' . $FuncionarioEscolhido["nome_funcionario"] . '</p>' ?>
        </div>
        <br>
        <hr>

        <div id="vvi">
            <fieldset>

                <div id="bodydiv">

                    <?php

                    echo '<h5>' . 'Cargo: ' . str_replace("_", " de ", $FuncionarioEscolhido["cargo_funcionario"]) . '</h5>';
                    echo '<h5>' . 'Email: ' . $FuncionarioEscolhido["email_funcionario"] . '</h5>';
                    echo '<h5>' . 'Gestor: ' . $FuncionarioEscolhido["gestor_funcionario"] . '</h5>';
                    echo '<h5>' . 'Plano de Saúde: ' . $FuncionarioEscolhido["plan_saude_funcionario"] . '</h5>';
                    echo '<h5>' . 'Número da Carteira de Plano de Saúde: ' . $FuncionarioEscolhido["cart_plan_saude_funcionario"] . '</h5>';      //Dados do condutor
                    echo '<h5>' . 'Telefone: ' . $FuncionarioEscolhido["telefone_funcionario"] . '</h5>';
                    echo '<h5>' . 'RG: ' . $FuncionarioEscolhido["rg_funcionario"] . '</h5>';
                    echo '<h5>' . 'CPF: ' . $FuncionarioEscolhido["cpf_funcionario"] . '</h5>';
                    echo '<h5>' . 'Data de Nascimento: ' . $FuncionarioEscolhido["dt_nasc_funcionario"] . '</h5>';
                    echo '<h5>' . 'Endereço: ' . $FuncionarioEscolhido["endereco_funcionario"] . '</h5>';

                    ?>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <div id="bodydiv">

                    <button id="BotaoNaoResolvidos" onclick="BotaoNaoResolvidos()" class="cellHead">Não Resolvidos</button>
                    <button id="BotaoResolvidos" onclick="BotaoResolvidos()" class="cellHead">Resolvidos</button>

                    <div id="RegistrosNaoResolvidos">

                        <h4>Registros médicos não resolvidos:</h4>

                        <?php

                        $stmt = $conn->prepare("SELECT * FROM registro_medico WHERE funcionario_medic = $_SESSION[IDFuncionarioEscolhido] AND resolvido_medic='Não'");
                        $stmt->execute();

                        $resultado = $stmt->get_result();

                        $ProblemasMedicos = $resultado->fetch_all(MYSQLI_ASSOC);

                        if (!empty($ProblemasMedicos)) {

                            echo '<form method="POST">

                        <table>

                        <thead>

                            <tr>

                                <th class="cellHead">ID</th>

                                <th class="cellHead">Problema descrito</th>

                                <th class="cellHead">Data de envio</th>

                                <th class="cellHead">Tipo de problema</th>

                                <th class="cellHead">Resolvido</th>

                            </tr>

                        </thead>

                        <tbody>';

                            foreach ($ProblemasMedicos as $linhaMedico) {

                                $ValorBotao = $linhaMedico['id_medic'];

                                echo '<tr>

                                <td class="cell"> ' . $linhaMedico["id_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["problema_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["data_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["tipo_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["resolvido_medic"] . ' </td>

                            ';

                                echo "<td><input class='cellHeadConcluir' type='submit' value='Marcar como resolvido' name='Botao$ValorBotao'></td>

                            </tr>";

                                /*
                            
                                echo "<td><input class='cellHead' type='submit' value='Acessar Perfil' name='Funcionario$ValorFuncionario'></td>

                            </tr>";

                            */
                            }

                            echo "</tbody>

                        </table>
                    
                        </form>";
                        } else {

                            echo "<h5>Nenhum registro médico foi feito por este usuário</h5>";
                        }



                        ?>

                    </div>

                    <div id="RegistrosResolvidos">

                        <h4>Registros médicos resolvidos:</h4>

                        <?php

                        $stmt = $conn->prepare("SELECT * FROM registro_medico WHERE funcionario_medic = $_SESSION[IDFuncionarioEscolhido] AND resolvido_medic='Sim'");
                        $stmt->execute();

                        $resultado = $stmt->get_result();

                        $ProblemasMedicos = $resultado->fetch_all(MYSQLI_ASSOC);

                        if (!empty($ProblemasMedicos)) {

                            echo '

                        <table>

                        <thead>

                            <tr>

                                <th class="cellHead">ID</th>

                                <th class="cellHead">Problema descrito</th>

                                <th class="cellHead">Data de envio</th>

                                <th class="cellHead">Tipo de problema</th>

                                <th class="cellHead">Resolvido</th>

                            </tr>

                        </thead>

                        <tbody>';

                            foreach ($ProblemasMedicos as $linhaMedico) {

                                $ValorBotao = $linhaMedico['id_medic'];

                                echo '<tr>

                                <td class="cell"> ' . $linhaMedico["id_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["problema_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["data_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["tipo_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["resolvido_medic"] . ' </td>

                            </tr>';
                            }

                            echo "</tbody>

                        </table>";
                        } else {

                            echo "<h5>Nenhum registro médico foi feito por este usuário</h5>";
                        }



                        ?>

                    </div>




                </div>
            </fieldset>


            <br>
            <br>
        </div>
</body>

<footer>
    <br>
    <br>
    <br>
    <br>
    <br>
</footer>

<script src="../javascript/teste.js?v=<?php echo time(); ?>"></script>

<script>

/* function Comeco() {

        console.log("<?php /* echo "$QuantidadeDeLinhas" */ ?>");

        setInterval(Comeco, 1000);

    } */

</script>

</html>