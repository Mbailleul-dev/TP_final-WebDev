//je crée un objet XMLHttpRequest
let xmlhttp = new XMLHttpRequest();
//on initialise la requete avec open()
xmlhttp.open('GET', 'URL ??');
//on veut une reponse au format JSON
xmlhttp.reponseType = "json"; //ou texte ?
//on envoie la requete
xmlhttp.send();
//dès que la réponse est reçue
xmlhttp.onload = function() {
    //si statut n'est pas égal à 200(=succès)
    if (xmlhttp.status != 200) {
        //on affiche le statut et le message correspondant
        alert("erreur" + xmlhttp.status + " : " + xmlhttp.statusText);
    } else {
        //si statut HTTP = 200 on affiche la réponse
        alert(JSON.stringify(xmlhttp.response));
    }
}

//si requete echoue
xmlhttp.onerror = function() {
    alert("La requête a échouée !");
}


$(function() {
    // MOn API boursière
    $.get({
        url: 'http://api.marketstack.com/v1/Tickers/EDV/eod',
        data: {
            access_key: '1264cdd4f7dcfa790d7b2f226608330b'
        },
        dataType: 'json',
        success: function(apiResponse) {
            console.log(apiResponse);
            if (Array.isArray(apiResponse['data'])) {
                apiResponse['data'].forEach(stockData => {
                    console.log(`Ticker ${stockData['symbol']}`,
                        `has a day high of ${stockData['high']}`,
                        `on ${stockData['date']}`);
                });
            }
        }
    });
})


// Graphique
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'Premier ETF',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});