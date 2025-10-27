function setProblema(tipo) {

  document.getElementById("mensagem").innerHTML = "Descreva o problema relacionado à: " + tipo.toLowerCase();
  document.getElementById("ProblemaSaudeTipo").value = tipo;

}