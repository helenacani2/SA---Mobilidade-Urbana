function ValidarEmail(email) {

    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

}

function Continuar(event) {
    
    event.preventDefault();
    
        const email = document.getElementById('e-mail').value;
    
        let isValid = true;
    
        if (!ValidarEmail(email)) {

            alert('Email inválido.');

            isValid = false;

        } else {

            window.open("pagina_inicial.html");

            window.close("pagina_login.html")

        };

};

//verificar email