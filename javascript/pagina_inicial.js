function barra_paginas() {
    
    document.getElementById("paginas_texto").innerHTML = "Trens";
    
    document.getElementById("paginas_texto").style.color = "white";
    
    var imagem_paginas = document.getElementById("paginas_imagem");
    
    imagem_paginas.src = "https://www.turismo.pr.gov.br/sites/default/arquivos_restritos/files/imagem/2024-05/aaa_3615-2.jpg";
    
    document.getElementById("bola_um").style.opacity = "100%"; //bolinhas do carrossel
    
    document.getElementById("bola_dois").style.opacity = "50%";
    
    document.getElementById("bola_tres").style.opacity = "50%";
    
    document.getElementById("bola_quatro").style.opacity = "50%";
    
    document.getElementById("bola_cinco").style.opacity = "50%";
    
    document.getElementById("bola_um").style.color = "white"; //muda a cor para se adequar com o a foto de fundo
    
    document.getElementById("bola_dois").style.color = "white";
    
    document.getElementById("bola_tres").style.color = "white";
    
    document.getElementById("bola_quatro").style.color = "white";
    
    document.getElementById("bola_cinco").style.color = "white";
    
    setTimeout(barra_paginas_move_dois, 6000); //tempo que mudança carrossel

};

function barra_paginas_move_dois() {

    document.getElementById("paginas_texto").innerHTML = "Rotas";

    document.getElementById("paginas_texto").style.color = "rgb(63, 63, 63)";

    var imagem_paginas = document.getElementById("paginas_imagem");

    imagem_paginas.src = "https://www.metrocptm.com.br/wp-content/uploads/2020/11/mapa-2030-pitu-960x640.jpg";

    document.getElementById("bola_um").style.opacity = "50%";

    document.getElementById("bola_dois").style.opacity = "100%";

    document.getElementById("bola_tres").style.opacity = "50%";

    document.getElementById("bola_quatro").style.opacity = "50%";

    document.getElementById("bola_cinco").style.opacity = "50%";

    document.getElementById("bola_um").style.color = "rgb(63, 63, 63)";

    document.getElementById("bola_dois").style.color = "rgb(63, 63, 63)";

    document.getElementById("bola_tres").style.color = "rgb(63, 63, 63)";

    document.getElementById("bola_quatro").style.color = "rgb(63, 63, 63)";

    document.getElementById("bola_cinco").style.color = "rgb(63, 63, 63)";

    setTimeout(barra_paginas_move_tres, 6000);

};

function barra_paginas_move_tres() { 

    document.getElementById("paginas_texto").innerHTML = "Perfil do Condutor";

    document.getElementById("paginas_texto").style.color = "rgb(63, 63, 63)";

    var imagem_paginas = document.getElementById("paginas_imagem");

    imagem_paginas.src = "https://m.media-amazon.com/images/I/51yaZ1tgGUL._AC_.jpg";

    document.getElementById("bola_um").style.opacity = "50%";

    document.getElementById("bola_dois").style.opacity = "50%";

    document.getElementById("bola_tres").style.opacity = "100%";

    document.getElementById("bola_quatro").style.opacity = "50%";

    document.getElementById("bola_cinco").style.opacity = "50%";

    setTimeout(barra_paginas_move_quatro, 6000);

};

function barra_paginas_move_quatro() {

    document.getElementById("paginas_texto").innerHTML = "Central de apoio ao Condutor";

    document.getElementById("paginas_texto").style.color = "rgb(63, 63, 63)";

    var imagem_paginas = document.getElementById("paginas_imagem");

    imagem_paginas.src = "https://sarar.com.br/wp-content/uploads/2021/01/remedio-para-ansiedade.jpg";

    document.getElementById("bola_um").style.opacity = "50%";

    document.getElementById("bola_dois").style.opacity = "50%";

    document.getElementById("bola_tres").style.opacity = "50%";

    document.getElementById("bola_quatro").style.opacity = "100%";

    document.getElementById("bola_cinco").style.opacity = "50%";

    setTimeout(barra_paginas_move_cinco, 6000);

};

function barra_paginas_move_cinco() {

    document.getElementById("paginas_texto").innerHTML = "Alertas e Notificações";

    document.getElementById("paginas_texto").style.color = "rgb(63, 63, 63)";

    var imagem_paginas = document.getElementById("paginas_imagem");

    imagem_paginas.src = "https://i0.wp.com/wsantacruz.com.br/wp-content/uploads/2023/02/png_20230225_145817_0000553411594307716045.png?fit=1000%2C600&ssl=1";

    document.getElementById("bola_um").style.opacity = "50%";

    document.getElementById("bola_dois").style.opacity = "50%";

    document.getElementById("bola_tres").style.opacity = "50%";

    document.getElementById("bola_quatro").style.opacity = "50%";

    document.getElementById("bola_cinco").style.opacity = "100%";

    setTimeout(barra_paginas_move_um, 6000);

};

function barra_paginas_move_um() {

    document.getElementById("paginas_texto").innerHTML = "Trens";

    document.getElementById("paginas_texto").style.color = "white";

    document.getElementById("bola_um").style.opacity = "100%";

    document.getElementById("bola_dois").style.opacity = "50%";

    document.getElementById("bola_tres").style.opacity = "50%";

    document.getElementById("bola_quatro").style.opacity = "50%";

    document.getElementById("bola_cinco").style.opacity = "50%";

    document.getElementById("bola_um").style.color = "white";

    document.getElementById("bola_dois").style.color = "white";

    document.getElementById("bola_tres").style.color = "white";

    document.getElementById("bola_quatro").style.color = "white";

    document.getElementById("bola_cinco").style.color = "white";

    var imagem_paginas = document.getElementById("paginas_imagem");

    imagem_paginas.src = "https://www.turismo.pr.gov.br/sites/default/arquivos_restritos/files/imagem/2024-05/aaa_3615-2.jpg";

    setTimeout(barra_paginas_move_dois, 6000);

};

function clicar() {

    var imagem_paginas_checar = document.getElementById("paginas_imagem");

    if (imagem_paginas_checar.src === "https://www.turismo.pr.gov.br/sites/default/arquivos_restritos/files/imagem/2024-05/aaa_3615-2.jpg") {
        
        window.location.href = "dash_board_geral.php";

    };

    if (imagem_paginas_checar.src == "https://www.metrocptm.com.br/wp-content/uploads/2020/11/mapa-2030-pitu-960x640.jpg") {

        window.location.href = "gestao_rotas.php";

    };

    if (imagem_paginas_checar.src == "https://m.media-amazon.com/images/I/51yaZ1tgGUL._AC_.jpg") {

        window.location.href = "perfil_condutor.php";

    };

    if (imagem_paginas_checar.src == "https://sarar.com.br/wp-content/uploads/2021/01/remedio-para-ansiedade.jpg") {

        window.location.href = "central_apoio_condutor.php";

    };

    if (imagem_paginas_checar.src == "https://i0.wp.com/wsantacruz.com.br/wp-content/uploads/2023/02/png_20230225_145817_0000553411594307716045.png?fit=1000%2C600&ssl=1") {

        window.location.href = "alarme.php";

    };

};

function dashboard() {

    window.location.href = "dash_board_geral.php";

};

function mapa() {

    window.location.href = "gestao_rotas.php";

};

function cadastrar() {

    window.location.href = "pagina_cadastro.php";

};

function central() {

    window.location.href = "central_apoio_condutor.php";

};

function manutencao() {

    window.location.href = "monitoramento_manutencao_naoiniciado.php";

};

function relatorios() {

    window.location.href = "relatorio_analise.php"

};

function perfil() {

    window.location.href = "perfil_condutor.php"
    
};

function usuarios() {

    window.location.href = "todos_usuarios.php"

};