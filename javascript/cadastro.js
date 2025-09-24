function ValidarCpf(cpf) {
    cpf = cpf.replace(/[^\d]+/g, ''); // Remove caracteres não numéricos
    //cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d)/, "$1.$2.$3-$4"); // Formata CPF

    if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
        return false;
    }

    let soma = 0;
    let resto;

    // Valida segundo dígito
    for (let i = 1; i <= 9; i++) {
        soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
    }
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) {
        return false;
    }

    soma = 0;

    // Valida segundo dígito
    for (let i = 1; i <= 10; i++) {
        soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
    }
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(10, 11))) {
        return false;
    }

    return true;
}

function ValidarTelefone(telefone) {
    telefone = telefone.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (telefone.length !== 11) {
        return false;
    }

    const regex = /^[1-9]{2}9[0-9]{8}$/; // Formato de telefone brasileiro (11 dígitos, começando com 9)
    return regex.test(telefone);
}

function ValidarEmail(email) {

    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

}

function Continuar(event) {

    event.preventDefault();

    const cpf = document.getElementById('cpf').value;

    let isValid = true;

    if (!ValidarCpf(cpf)) {

        alert('Cpf inválido.');

        isValid = false;

    } else {

        window.open("pagina_login.php");

        window.close("pagina_cadastro.php");

    };

    const telefone = document.getElementById('telefone').value;

    if (!ValidarTelefone(telefone)) {

        alert('Telefone inválido.');

        isValid = false;

    } else {

        window.open("pagina_login.php");

        window.close("pagina_cadastro.php");

    };

    const email = document.getElementById('e-mail').value;

    if (!ValidarEmail(email)) {

        alert('Email inválido.');

        isValid = false;

    } else {

        window.open("pagina_login.php");

        window.close("pagina_cadastro.php");

    };

};