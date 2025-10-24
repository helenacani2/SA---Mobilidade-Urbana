/*

const bolinha_selecao = {
    Vomito: "vômito" ,
    Enxaqueca: "Enxaqueca" ,
    nausea: "Náusea" ,
    cansaco: "Cansaço" ,
    Febre: "Febre" ,
    Outros: "Outros" ,
};

const bolinhasElements = document.querySelectorAll('input[name="bolinha"]');

const mensagem = document.getElementById('mensagem');

radios.forEach(radio => {
    radio.addEventListener('change', function() {
      if (this.checked) {
        // Atualiza o texto com o valor da opção selecionada
        problemaRelacionado.textContent = this.value;
        // Exibe a mensagem de confirmação
        alert('Você selecionou: ' + this.value);
      }
    });
  });
  
  */

  /* function inicio() {

    VomWidth = document.getElementById("VomitoBolinha").style.width;
    VomHeight = document.getElementById("VomitoBolinha").style.height;

    VomTop = document.getElementById("VomitoBolinha").style.top;
    VomLeft = document.getElementById("VomitoBolinha").style.left;

    alert(VomWidth);



    document.getElementById("VomitoInput").style.width = VomWidth;
    document.getElementById("VomitoInput").style.height = VomHeight;
    
    document.getElementById("VomitoInput").style.top = VomTop;
    document.getElementById("VomitoInput").style.left = VomLeft;

  } */








    function setProblema(tipo) {
  document.getElementById("mensagem").innerHTML = "Descreva seu problema relacionado à: " + tipo.toLowerCase();
  document.getElementById("ProblemaSaudeTipo").value = tipo;
}










/*

  function vomito() {

    document.getElementById("mensagem").innerHTML = "Descreva seu problema relacionado à: " + "vômito";

  }

  function enxaqueca() {

    document.getElementById("mensagem").innerHTML = "Descreva seu problema relacionado à: " + "enxaqueca";

  }

  function nausea() {

    document.getElementById("mensagem").innerHTML = "Descreva seu problema relacionado à: " + "náusea";

  }

  function cansaco() {
  
    document.getElementById("mensagem").innerHTML = "Descreva seu problema relacionado à: " + "cansaço";

  }

  function febre() {

    document.getElementById("mensagem").innerHTML = "Descreva seu problema relacionado à: " + "febre";

  }

  function outros() {

    document.getElementById("mensagem").innerHTML = "Descreva seu problema relacionado à: " + "outros";

    $_SESSION['ProblemaSaudeTipo'] = "Outros";

  }; */
