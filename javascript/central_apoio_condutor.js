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

$_SESSION = [];

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

  /* function outros() {

    document.getElementById("mensagem").innerHTML = "Descreva seu problema relacionado à: " + "outros";

    $_SESSION['ProblemaSaudeTipo'] = "Outros";

  }; */
