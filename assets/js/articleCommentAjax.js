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

// function loadArticleComment() {
//     //Etape 1 :
//     //1.4 C'est le paramètre que j'envoie plus bas. C'est une information que je veux envoyer vers le controller. Ici il ne me sert qu'à vérifier dans le php si je dois lancer l'action ou pas
//     let ajax = true;
//     //1.1 On appelle l'objet Javascript qui permet de faire l'ajax
//     var xmlhttp = new XMLHttpRequest();
//     //1.2 On appelle l'évènement readystatechange qui permet de lancer nos actions quand l'ajax est prêt
//     xmlhttp.onreadystatechange = function() {
//         //1.3 Si l'ajax est prêt et que'il n'y a pas d'erreur (status == 200)
//         if (this.readyState == 4 && this.status == 200) {
//             //Etape 3 : on récupère nos données et on les convertit depuis le JSON
//             let data = JSON.parse(this.responseText)
//                 //3.1 ça devient un tableau js, donc pour l'afficher je fais une boucle
//             for (let patient of data) {
//                 //Et j'affiche !
//                 let ul = document.createElement('ul');

//                 ul.innerHTML =
//                     '<li>' + patient.lastname + '</li>' +
//                     '<li>' + patient.firstname + '</li>';
//                 document.getElementById('list').append(ul);
//             }
//         }
//     }

//     //1.4 J'envoie mes infos vers le controller. Ma variable ajax deviendra $_GET['ajax']
//     xmlhttp.open('GET', 'controllers/patientsListController.php?ajax=' + ajax);
//     xmlhttp.send();
// }