const boton1 = document.getElementById("buton1");
const boton2 = document.getElementById("buton2");
const boton3 = document.getElementById("buton3");


 //1 é para não iniciado, 2 é para em processo e 3 é em finalizado

function andamento1() {
   

}
function andamento2() {
  
}
function andamento3() {
   

}

boton3.addEventListener("click", andamento3);
boton2.addEventListener("click", andamento2);
boton1.addEventListener("click", andamento1);

function Comeco() {

    document.getElementById("Finalizado").style.display = "none";
    document.getElementById("Fazendo").style.display = "none";
    document.getElementById("NaoIniciado").style.display = "block";

}

function NaoIniciado() {

    document.getElementById("Finalizado").style.display = "none";
    document.getElementById("Fazendo").style.display = "none";
    document.getElementById("NaoIniciado").style.display = "block";

}

function Fazendo() {

    document.getElementById("Finalizado").style.display = "none";
    document.getElementById("Fazendo").style.display = "block";
    document.getElementById("NaoIniciado").style.display = "none";

}

function Finalizado() {

    document.getElementById("Finalizado").style.display = "block";
    document.getElementById("Fazendo").style.display = "none";
    document.getElementById("NaoIniciado").style.display = "none";

}