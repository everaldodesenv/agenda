function CriaRequest() {
    try {
        request = new XMLHttpRequest();
    } catch (IEAtual) {

        try {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (IEAintigo) {

            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (falha) {
                request = false;
            }
        }
    }
    if (!request)
        alert("seu Navegador não suporta Ajax!");
    else
        return request;
}

function getDados() {
    var nome = document.getElementById("txtnome").nodeValue;
    var result = document.getElementById("Resultado");
    var xmlreq = CriaRequest();

    result.innerHTML = '< img src = "Progresso1.gif" / >';

    xmlreq.open("GET", "Contato.php?txtnome=" + nome, true);
    xmlreq.onreadystatechange = function() {

        if (xmlreq.readyState == 4) {

            if (xmlreq.status == 200) {
                result.innerHTML = xmlreq.responseText;
            } else {
                result.innerHTML = "Erro:" + xmlreq.statusText;

            }
        }

    };
    xmlreq.send(null);
}