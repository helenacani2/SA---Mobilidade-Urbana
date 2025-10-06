const boton1 = document.getElementById("buton1");
const boton2 = document.getElementById("buton2");
const boton3 = document.getElementById("buton3");


 //1 é para não iniciado, 2 é para em processo e 3 é em finalizado

function andamento1() {
    document.getElementById("table4").innerHTML = "<h3>Sul- Centro</h3><hr><h3>Norte-Sul</h3><hr><h3>Cascata</h3><hr><h3>Bombarde</h3><hr><h3>Escola SESI</h3>";
    document.getElementById("table5").innerHTML = "<h3>Marcado para 15/05/25 a troca do motor</h3><hr><h3>Marcado para 19/06/25 troca das rodas</h3><hr><h3>Marcado para 14/06/25 revisão do trem</h3><hr><h3>Marcado para 20/10/25 troca dos bancos</h3><hr><h3>Marcado para 20/12/25 aposentadoria do trem</h3>";
}

function andamento2() {
    document.getElementById("table4").innerHTML = "<h3>Sul- Centro</h3><hr><h3>Norte-Sul</h3><hr><h3>Cascata</h3><hr><h3>Bombarde</h3><hr><h3>Escola SESI</h3>";
    document.getElementById("table5").innerHTML = "<h3>Trocando as rodas</h3><hr><h3>Retirando roedor do motor</h3><hr><h3>Restaurando a Pintura</h3><hr><h3>Arrumando a lataria</h3><hr><h3>Troca do sistema elétrico em andamento</h3>";
}

function andamento3() {
    document.getElementById("table4").innerHTML = "<h3>Sul- Centro</h3><hr><h3>Norte-Sul</h3><hr><h3>Cascata</h3><hr><h3>Bombarde</h3><hr><h3>Escola SESI</h3>";
    document.getElementById("table5").innerHTML = "<h3>Troca do motor feita dia 25/03</h3><hr><h3>Troca dos Bancos efetuada dia 24/02</h3><hr><h3>Retirada da ratazana feita dia 12/01</h3><hr><h3>Troca do parabriza efetuada dia 14/02</h3><hr><h3>Descarte efetuado dia 19/05</h3>";

}

boton3.addEventListener("click", andamento3);
boton2.addEventListener("click", andamento2);
boton1.addEventListener("click", andamento1);