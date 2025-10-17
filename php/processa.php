<?php
// processa.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //echo "$_POST[Vomito]";

    if (isset($_POST['Vomito'])) {

        $_SESSION['ProblemaSaudeTipo'] = filter_input(INPUT_POST, 'Vomito');

        /* if (!$_SESSION['ProblemaSaudeTipo']) {

            echo "Problema inválido.";

            exit;

        } */

        

        echo "Problema = " . htmlspecialchars($_SESSION['ProblemaSaudeTipo']);

    } else {

        echo "Requisição inválida.";

    }






    if (isset($_POST['Enxaqueca'])) {

        $_SESSION['ProblemaSaudeTipo'] = filter_input(INPUT_POST, 'Enxaqueca');

        /* if (!$_SESSION['ProblemaSaudeTipo']) {

            echo "Problema inválido.";

            exit;

        } */

        

        echo "Problema = " . htmlspecialchars($_SESSION['ProblemaSaudeTipo']);

    } else {

        echo "Requisição inválida.";

    }






    if (isset($_POST['Nausea'])) {
    }






    if (isset($_POST['Cansaco'])) {
    }






    if (isset($_POST['Febre'])) {
    }






    if (isset($_POST['Outros'])) {
    }














    /* $_SESSION['ProblemaSaudeTipo'] = filter_input(INPUT_POST, 'problema');

    if (!$_SESSION['ProblemaSaudeTipo']) {
        echo "Problema inválido.";
        exit;
    }

    // Aqui você pode fazer o que quiser com os dados (salvar no banco, enviar email etc)
    
    echo "Problema = " . htmlspecialchars($nome);
} else {
    echo "Requisição inválida."; */

    //echo "$_SESSION[ProblemaSaudeTipo]";


}
