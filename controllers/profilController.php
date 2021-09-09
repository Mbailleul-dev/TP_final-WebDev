<?php

$user = new user;

$formErrors = [];
$error = null;
//Je vérifie la présence du pseudo et du mail (non effacé)
if (!empty($_POST['updateLogin']) && !empty($_POST['updateMail'])) {
    //Je vérifie la présence du 'file'
    if (!empty($_FILES['avatar'])) {
        if ($_FILES['avatar']['error'] == 0) {
            //pathinfo extrait les informtations du fichier (taille/format/extension/etc)
            $fileInfos = pathinfo($_FILES['avatar']['name']);
            //je met toutes les extensions en minuscules pour faciliter la corrspondance avec le tableau d'ext
            $avatarExtension = strtolower($fileInfos['extension']);
            // je crée un tableau de valeurs d'extensions
            $authorizedMimeTypes = [
                'png' => 'image/png',
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'gif' => 'image/gif'
            ];
            //je défini le chemin d'accès de l'image et depalce le fichier
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], '../assets/img/userMedias/' . $_FILES['avatar']['name'])) {
                //chmod change le nom du fichier par celui du chemin daccès, 0644 lecture pour tous
                chmod('../assets/img/userMedias/' . $_FILES['avatar']['name'], 0644);
                // j'enregiste le chemin d'accès dans la BDD
                $user->avatar = '../assets/img/userMedias/' . $_FILES['avatar']['name'];
            } else {
                $formErrors['avatar'] = 'Une erreur est survenue';
            }
        } else {
            $formErrors['avatar'] = 'L\'image de l\'avatar n\'est pas au bon format';
        }
    }
    //Je re-rempli les données utilisateurs
    $user->id = $_SESSION['id'];
    $user->login = $_POST['updateLogin'];
    $user->mail = $_POST['updateMail'];
    if ($user->updateUser()) {
        $_SESSION['login'] = $user->login;
        $_SESSION['mail'] = $user->mail;
        $_SESSION['avatar'] = $user->avatar;
    }
}
//Condition pour qu'un utilisateur supprime son compte
if (!empty($_POST['deleteProfil'])) {
    $user->login = $_POST['deleteProfil'];
    $deleteUser = $user->deleteUser();
    header('Location:deconnexion.php');
    exit;
}
//Condition pour que l'admin supprime un utilisateur
if (!empty($_POST['login1'])) {
    if (!empty($_POST['login2'])) {
        if ($_POST['login1'] == $_POST['login2']) {
            $user->login = $_POST['login1'];
            $killUser = $user->deleteUser();
        } else {
            $error = 'Les deux pseudos ne sont pas identiques';
        }
    } else {
        $error = 'Le deuxième pseudo doit être renseigné';
    }
} else {
    $error = 'Il faut entrer le pseudo';
}
