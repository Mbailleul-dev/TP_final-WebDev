<?php

$user = new user;

if (count($_POST) > 0) {

   $formErrors = [];

   if (!empty($_POST['login'])) {
      if (preg_match($regex['login'], $_POST['login'])) {
         // filtre les chars pour eviter les injections SQL (ex: < >)
         $user->login = htmlspecialchars($_POST['login']);

         $thisUserExists = $user->verifyIfUserExists();
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
         $hash = $user->getHash();
         
         if (!password_verify($_POST['password'], $hash->password)) {
            //    $user->password = $_POST['password'];
            // }
            // else {
            $formErrors['password'] = 'L\'identifiant ou le mdp est incorrect';
         }
      }
   } else {
      $formErrors['paswword'] = EMPTY_PASSWORD;
   }
   


   if (count($formErrors) == 0) {
      // 

      $connectUser = $user->userConnexion();
      $_SESSION['id'] = $connectUser->id;
      $_SESSION['login'] = $user->login;
      $_SESSION['mail'] = $connectUser->mail;
      $_SESSION['id_userTypes'] = $connectUser->id_userTypes;
     
   } else if ($thisUserExists->count == 0) {
      // sinon j'affiche un message d'erreur.
      $formErrors['userNotExist'] = INVALID_USER;
   }
}
