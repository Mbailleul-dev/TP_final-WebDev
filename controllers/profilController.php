<?php

$user = new user;

$formErrors = [];
if (!empty($_POST['avatar'])) {
    if ($_FILES['avatar']['error'] == 0) {
        $fileInfos = pathinfo($_FILES['avatar']['name']);
        $avatarExtension = strtolower($fileInfos['extension']);
        $authorizedMimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif'
        ];
        if (array_key_exists($avatarExtension, $authorizedMimeTypes) && mime_content_type($_FILES['avatar']['tmp_name']) == $authorizedMimeTypes[$avatarExtension]) {
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], 'http://localhost/DMGP/assets/img/userMedias/' . $_FILES['avatar']['name'])) {
                chmod('http://localhost/DMGP/assets/img/userMedias/' . $_FILES['avatar']['name'], 0644);
                $user->avatar = 'http://localhost/DMGP/assets/img/userMedias/' . $_FILES['avatar']['name'];
                $user->id = $_SESSION['id'];
                $avatar = $user->addAvatar();
                header('Refresh:0');
            } else {
                $formErrors['avatar'] = 'Une erreur est survenue';
            }
        } else {
            $formErrors['avatar'] = 'L\'image de l\'avatar n\'est pas au bon format';
        }
    }
}
