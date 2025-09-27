<?php

require_once "train_info_bd.php";

session_start();

?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="icon"> <!-- Ícone da aba do navegador -->
    <link rel="stylesheet" href="../css/pagina_cadastro.css">

    <title>Cadastro</title>
</head>

<body> 
<!-- <body> -->

    <section id="login">

        <form action="cadastro_aux.php" id="checar" method="POST">

            <img src="../midias/logotraininfo.png" id="logo">

            <div class="entrar">
                <div class="form-group">
                    <label for="nome">Nome completo:*</label>
                    <br>
                    <input type="text" id="nome" name="Nome" required>
                </div>



                <div class="form-group">
                    <label for="e-mail">EmailAAA*:</label>
                    <br>
                    <input type="email" id="e-mail" name="usuario" required>
                </div>

                <div class="form-group">
                    <label  for="senha">Senha*:</label>
                    <br>
                    <input type="password" id="senha" name="senha_usuario" required>

                    <div class="mostrarsenha" onclick="mostrar()">
                        <input type="checkbox" id="item2" name="mostrar_senha" value="Mostrar_senha">
                        Mostrar Senha
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <label for="cpf">CPF:*</label>
                    <br>
                    <input type="text" id="cpf" name="CPF" required>
                </div>

                <div class="form-group">
                    <label for="rg">RG:*</label>
                    <br>
                    <input type="text" id="rg" name="RG" required>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone:*</label>
                    <br>
                    <input type="tel" id="telefone" name="Telefone" required>
                </div>

                <div class="form-group">
                    <label for="data">Data de Nascimento:*</label>
                    <br>
                    <input type="date" id="data" name="Nascimento" required>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço:*</label>
                    <br>
                    <input type="text" id="endereco" name="Endereco" required>
                </div>

                <div class="form-group">
                    <label for="plano_saude">Plano de saúde:*</label>
                    <br>
                    <input type="text" id="plano_saude" name="Plano" required>
                </div>

                <div class="form-group">
                    <label for="num_plano_saude">Número da Carteira de Plano de Saúde:*</label>
                    <br>
                    <input type="text" id="num_plano_saude" name="Carteira" required>
                </div>

                <div class="form-group">
                    <label for="gestor">Gestor:*</label>
                    <br>
                    <input type="text" id="gestor" name="Gestor" required>
                </div>

                <div class="form-group">
                    <label for="cargo">Cargo:*</label>

                    <br>
                    <select id="cargo" name="Cargo" required>
                        <option value="">Selecione...</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Equipe_Manutencao">Equipe de Manutenção</option>
                        <option value="Equipe_Atendimento">Equipe de Apoio ao Condutor</option>
                        <option value="Maquinista">Maquinista</option>
                    </select>
                </div>
            </div>

            <input type="submit" class="BotaoContinuar" onclick="Continuar(event)" name="BotaoCadastrar" id="BotaoCadastrar" value="Continuar">

            </div>
        </form>

        <script src="../javascript/cadastro.js"></script>
        <script src="../javascript/mostrar_senha.js"></script>
    </section>

</body>

</html>