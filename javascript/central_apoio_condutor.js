function setProblema(tipo) {

  document.getElementById("mensagem").innerHTML = "Descreva seu problema relacionado à: " + tipo.toLowerCase();
  document.getElementById("ProblemaSaudeTipo").value = tipo;

}