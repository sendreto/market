function CriaRequest() {
    try {
        request = new XMLHttpRequest();
    } catch (IEAtual) {

        try {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (IEAntigo) {

            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (falha) {
                request = false;
            }
        }
    }

    if (!request)
        alert("Seu Navegador não suporta Ajax!");
    else
        return request;
}

function getDados() {

    var nome = document.getElementById("txtnome").value;
    var result = document.getElementById("date");
    var xmlreq = CriaRequest();

    result.innerHTML = '<p id="img-load"><img class="img-fluid" width="100px" height="100px" src="/market/view/img/loading-gif-transparent-10.gif"/></p>';

    xmlreq.open("GET", "../service/productSearch.php?txtnome=" + nome, true);

    xmlreq.onreadystatechange = function () {

        if (xmlreq.readyState == 4) {

            if (xmlreq.status == 200) {
                result.innerHTML = xmlreq.responseText;
            } else {
                result.innerHTML = "Erro: " + xmlreq.statusText;
            }
        }
    };
    xmlreq.send(null);
}