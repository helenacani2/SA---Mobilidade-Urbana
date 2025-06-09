function todos_os_usuarios() {

    window.location.href = "";

};

function criar_usuario() {

    window.location.href = "pagina_cadastro.html";

};

function informacoes_do_usuario() {

    window.location.href = "";

};

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

function ADM_burger() {

    var menu_ADM = document.getElementById("menu_burger_aparece");

    if (menu_ADM.style.display == "none") {

        menu_ADM.style.display = "block";

        document.getElementById("ADM_burger").innerHTML = "🗙";

        document.getElementById("ADM_burger").style.color = "black";

    } else {

        menu_ADM.style.display = "none";

        document.getElementById("ADM_burger").innerHTML = "☰";

        document.getElementById("ADM_burger").style.color = "white";

    };

};