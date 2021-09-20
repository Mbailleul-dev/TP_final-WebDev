// //je crée un objet XMLHttpRequest
// let xmlhttp = new XMLHttpRequest();
// //on initialise la requete avec open()
// xmlhttp.open('GET', 'URL ??');
// //on veut une reponse au format JSON
// xmlhttp.reponseType = "json"; //ou texte ?
// //on envoie la requete
// xmlhttp.send();
// //dès que la réponse est reçue
// xmlhttp.onload = function() {
//     //si statut n'est pas égal à 200(=succès)
//     if (xmlhttp.status != 200) {
//         //on affiche le statut et le message correspondant
//         alert("erreur" + xmlhttp.status + " : " + xmlhttp.statusText);
//     } else {
//         //si statut HTTP = 200 on affiche la réponse
//         alert(JSON.stringify(xmlhttp.response));
//     }
// }

// //si requete echoue
// xmlhttp.onerror = function() {
//     alert("La requête a échouée !");
// }

$('#etfChoice1').change(function() {

    $.ajax({
        url: 'http://api.marketstack.com/v1/tickers/' + $('#etfChoice1').val() + '/eod',
        data: {
            access_key: '1264cdd4f7dcfa790d7b2f226608330b'
        },

        dataType: 'json',
        success: function(apiResponse) {
            let close = [];
            let date = [];
            let i = 100;
            apiResponse.data.eod.forEach(stockData => {
                close[i] = stockData.close;
                var maDate = new Date(stockData.date);
                var newDay, newMonth, newYear;
                var day = maDate.getDate();
                if (day < 10) {
                    newDay = '0' + day;
                } else { newDay = day; }
                var month = maDate.getMonth() + 1;
                if (month < 10) {
                    newMonth = '0' + month;
                } else { newMonth = month; }
                var year = maDate.getFullYear();
                if (year < 10) {
                    newYear = '0' + year;
                } else { newYear = year; }
                date[i] = newDay + '/' + newMonth + '/' + newYear;
                i--;
            });
            //console.log(close);
            //console.log(date);
            // Graphique
            var oldcanv = document.getElementById('firstChart');
            document.getElementById('firstChartDiv').removeChild(oldcanv)
            var canv = document.createElement('canvas');
            canv.id = 'firstChart';
            document.getElementById('firstChartDiv').appendChild(canv);

            var ctx = document.getElementById('firstChart').getContext('2d');
            var firstChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: date,
                    datasets: [{
                        label: 'Premier ETF',

                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'red',
                        data: close,
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });
        }
    });
    $('.canvas').css("background-color", "rgba(255,255,255, 80%)");
})