<?php
require_once "train_info_bd.php";

session_start();

// Se já estiver logado, vai direto para a turma
if (isset($_SESSION["nome_funcionario"])) {
    header("Location: pagina_inicial.php");
    exit;
};

$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["usuario"] ?? "");
    $senha = trim($_POST["senha_usuario"] ?? "");

    $stmt = $conn->prepare("SELECT id_funcionario, nome_funcionario, senha_funcionario FROM funcionario WHERE email_funcionario = ? AND senha_funcionario = ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $dados = $resultado->fetch_assoc();
        $_SESSION["nome_funcionario"] = $dados["nome_funcionario"];
        $_SESSION["id_funcionario"] = $dados["id_funcionario"];
        $_SESSION["conectado"] = true;

        header("Location: pagina_inicial.php");
        exit;
    } else {
        $erro = "E-mail ou senha inválidos.";
    }
}






?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="../midias/logomenor.png" type="icon"> <!-- Ícone da aba do navegador -->
   <link rel="stylesheet" href="../css/pagina_login.css">

   <title>Login</title>
</head>

<body>

   <section id="login">

      <form id="checar" method="POST">

         <img src="../midias/logotraininfo.png" id="logo">

         <div class="entrar">

            <label type="usuario1" for="e-mail">Email:</label>

            <br>
            <input type="email" id="e-mail" name="usuario" required>

            <br>

            <label type="senha1" for="senha">Senha:</label>

            <br>
            <input type="password" id="senha" name="senha_usuario" required>

            <br>
            <div class="mostrarsenha" onclick="mostrar()">
               <input type="checkbox" id="item2" name="mostrar_senha" value="Mostrar_senha">
               Mostrar Senha </div>

         </div>

         <div>
         <button type="submit" class="BotaoContinuar" onclick="Continuar(event)">
            Entrar
         </div>
      </form>

      <script src="../javascript/mostrar_senha.js"></script>
   <script src="../javascript/pagina_login.js"></script>

</div>
   </section>

</body>
</html>