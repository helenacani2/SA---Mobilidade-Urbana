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