function ao_entrar() {

    document.getElementById("linha").innerHTML = "Norte-Sul - Linha Roxa";
    
    document.getElementById("preco_passagem").innerHTML = "9.99";
    
    document.getElementById("linha_nome").innerHTML = "📍 Linha Férrea da Paçoca";

};

/* function rota_1() {

    var image = document.getElementById("imagem_rota");

    var trem = document.getElementById("imagem_trem");

    if (image.src != "../midias/rota_um.png") {

        image.src = "../midias/rota_um.png";

        trem.src = "../midias/trem1.png";
        
    };

    document.getElementById("linha").innerHTML = "Norte-Sul - Linha Roxa";
    
    document.getElementById("preco_passagem").innerHTML = "9,99";
    
    document.getElementById("linha_nome").innerHTML = "📍 Linha Férrea da Paçoca";

    em_viagem();

};

function rota_2() {

    var image = document.getElementById("imagem_rota");

    var trem = document.getElementById("imagem_trem");

    if (image.src != "../midias/rota_dois.png") {

        image.src = "../midias/rota_dois.png";

        trem.src = "../midias/trem2.png";
        
    };

    document.getElementById("linha").innerHTML = "Sul-Centro - Linha Ciano";
    
    document.getElementById("preco_passagem").innerHTML = "10,85";
    
    document.getElementById("linha_nome").innerHTML = "📍 Linha Férrea do Pastel";

    em_viagem();

};

function rota_3() {

    var image = document.getElementById("imagem_rota");

    var trem = document.getElementById("imagem_trem");

    if (image.src != "../midias/rota_tres.png") {

        image.src = "../midias/rota_tres.png";

        trem.src = "../midias/trem3.png";

    };

    document.getElementById("linha").innerHTML = "Cascata - Linha Azul";
    
    document.getElementById("preco_passagem").innerHTML = "9999999,99";
    
    document.getElementById("linha_nome").innerHTML = "📍 Linha Férrea da Coxinha";

    em_viagem();

}; */

function tempo_estimado() {

    const data = new Date();

    var h = data.getHours();

    var m = data.getMinutes() + 45;

    if(m >= 60) {

        m-=60;      /* essa parte foi feito pelo João, créditos a ele */

        h++;

    };

    h = hora_zero(h);

    m = minuto_zero(m);

    document.getElementById('hora').innerHTML = "Chega na estação às " + h + ":" + m;

    setTimeout(tempo_estimado, 100);

};

function hora_zero(h) {

    if (h < 10) {

        h = "0" + h;
    };

    return h;
};

function minuto_zero(m) {

    if (m < 10) {

        m = "0" + m;

    };

    return m;
};

function em_viagem() {

    var zero_um;

    zero_um = Math.random(1);

    if (zero_um >= 0.5) {

        viagem();

    } else {

        estacao();

    };
    
};

function viagem() {

    document.getElementById("em_viagem").innerHTML = "✰ Em viagem";

};

function estacao() {

    document.getElementById("em_viagem").innerHTML = "✰ Na estação";

};