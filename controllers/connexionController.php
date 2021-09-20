<?php

$user = new user;

if (count($_POST) > 0) {

   $formErrors = [];

   if (!empty($_POST['login'])) {
      if (preg_match($regex['login'], $_POST['login'])) {
         // filtre les chars pour eviter les injections SQL (ex: < >)
         $user->login = htmlspecialchars($_POST['login']);
         // je vérifie si le pseudo existe déjà dans la BDD
         $thisUserExists = $user->checkIfUserExists();
         if ($thisUserExists->count == 0) {
            $formError['login'] = 'L\'identifiant ou le mdp est incorrect';
         }
      } else {
         $formErrors['login'] = INVALID_LOGIN;
      }
   } else {
      $formErrors['login'] = EMPTY_LOGIN;
   }

   if (!empty($_POST['password'])) {
      if (!isset($formErrors['login'])) {
         // je récupère le pwd dans la BDD
         $hash = $user->getHash();
         if (!password_verify($_POST['password'], $hash->password)) {
            $formErrors['password'] = 'L\'identifiant ou le mdp est incorrect';
         }
      }
   } else {
      $formErrors['paswword'] = EMPTY_PASSWORD;
   }

   if (count($formErrors) == 0) {

      $connectUser = $user->userConnexion();
      $_SESSION['id'] = $connectUser->id;
      $_SESSION['login'] = $user->login;
      $_SESSION['mail'] = $connectUser->mail;
      $_SESSION['avatar'] = $connectUser->avatar;
      $_SESSION['id_userTypes'] = $connectUser->id_userTypes;
      header('location:profil.php');
      exit;
   }
}
