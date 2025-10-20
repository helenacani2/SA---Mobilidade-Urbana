<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../midias/logomenor.png" type="icon">
    <link rel="stylesheet" href="../css/cadastrar_trem.css?v=<?php echo time(); ?>">
    <title>Cadastrar novo trem</title>
</head>

<body>

    <form action="cadastrar_trem_aux.php" method="POST">

        <label for="TremNome" class="Legenda">Nome do Trem</label>
        
        <input type="text" id="TremNome" class="Texto" name="TremNome" required>

        <br>

        <label for="TremData" class="Legenda">Data de Fabricação do Trem</label>
        
        <input type="text" id="TremData"class="Texto" name="TremData" required>

        <br>

        <label for="TremFabricante" class="Legenda">Fabricante do Trem</label>
        
        <input type="text" id="TremFabricante"class="Texto" name="TremFabricante" required>

    </form>

</body>

</html>

