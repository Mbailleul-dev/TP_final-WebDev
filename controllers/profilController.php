<?php

$user = new user;

$formErrors = [];

if (!empty($_POST['updateLogin']) && !empty($_POST['updateMail'])) {
    if (!empty($_FILES['avatar'])) {
        if ($_FILES['avatar']['error'] == 0) {
            $fileInfos = pathinfo($_FILES['avatar']['name']);
            $avatarExtension = strtolower($fileInfos['extension']);
            $authorizedMimeTypes = [
                'png' => 'image/png',
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'gif' => 'image/gif'
            ];

            // if (array_key_exists($avatarExtension, $authorizedMimeTypes) == $authorizedMimeTypes[$avatarExtension]) {

            if (move_uploaded_file($_FILES['avatar']['tmp_name'], '../assets/img/userMedias/' . $_FILES['avatar']['name'])) {
                chmod('../assets/img/userMedias/' . $_FILES['avatar']['name'], 0644);
                $user->avatar = '../assets/img/userMedias/' . $_FILES['avatar']['name'];
            } else {
                $formErrors['avatar'] = 'Une erreur est survenue';
            }
            // } else {
            //     $formErrors['avatar'] = 'L\'image de l\'avatar n\'est pas au bon format';
            // }
        }
    }
    $user->id = $_SESSION['id'];
    $user->login = $_POST['updateLogin'];
    $user->mail = $_POST['updateMail'];
    if ($user->updateUser()) {
        $_SESSION['login'] = $user->login;
        $_SESSION['mail'] = $user->mail;
        $_SESSION['avatar'] = $user->avatar;
    }
}

if (!empty($_POST['deleteProfil'])) {
    $user->login = $_POST['deleteProfil'];
    $killUser = $user->deleteUser();
    header('Location:deconnexion.php');
    exit;
}
