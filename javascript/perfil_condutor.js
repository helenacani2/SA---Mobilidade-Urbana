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