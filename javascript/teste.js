document.addEventListener('DOMContentLoaded', function teste_hamburguer() {
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.querySelector('.menu-hamburguer');
    
    document.addEventListener('click', function(event) {
        const isClickInsideMenu = menu.contains(event.target);
        const isClickOnToggle = event.target === menuToggle || event.target === document.querySelector('label[for="menu-toggle"]');
        
        if (!isClickInsideMenu && !isClickOnToggle) {
            menuToggle.checked = false;
        }
    });
});

//quando clicar fora, o menu hambúrguer some

function Comeco() {

    document.getElementById("RegistrosResolvidos").style.display = "none";
    document.getElementById("RegistrosNaoResolvidos").style.display = "block";

}

function BotaoNaoResolvidos() {

    document.getElementById("RegistrosResolvidos").style.display = "none";
    document.getElementById("RegistrosNaoResolvidos").style.display = "block";

}

function BotaoResolvidos() {

    document.getElementById("RegistrosResolvidos").style.display = "block";
    document.getElementById("RegistrosNaoResolvidos").style.display = "none";

}