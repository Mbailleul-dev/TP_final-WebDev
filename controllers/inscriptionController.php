<?php

$user = new user;

if (count($_POST) > 0) {

   $formErrors = [];

   if (!empty($_POST['login'])) {
      if (preg_match($regex['login'], $_POST['login'])) {
         // filtre les chars pour eviter les injections SQL (ex: < >)
         $user->login = htmlspecialchars($_POST['login']);
      } else {
         $formErrors['login'] = INVALID_LOGIN;
      }
   } else {
      $formErrors['login'] = EMPTY_LOGIN;
   }

   if (!empty($_POST['mail'])) {
      //Le filter_var() sert de regex pour l'adresse mail.
      if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
         $user->mail = htmlspecialchars($_POST['mail']);
      } else {
         $formErrors['mail'] = INVALID_MAIL;
      }
   } else {
      $formErrors['mail'] = EMPTY_MAIL;
   }

   if (!empty($_POST['password'])) {
      $user->password = $_POST['password'];
   } else {
      $formErrors['paswword'] = EMPTY_PASSWORD;
   }

   if (!empty($_POST['password2'])) {
      $password2 = $_POST['password2'];
   } else {
      $formErrors['password2'] = EMPTY_PASSWORD2;
   }
   // Je vérifie que les 2 mot de passe existent
   if ($user->password != null and $password2 != null) {
      // je vérifie qu'ils soient identiques
      if ($user->password == $password2) {
         // je hashe le mdp
         $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      } else {
         $formErrors['invalidMDP'] = INVALID_PASSWORD;
      }
   }
   //Je vérifie l'existence de l'adresse email dans userModel.php
$thisMailExist = $user->verifyIfMailExist();

if ($thisMailExist->count == 0) {
   // je crée un utilisateur
   $newUser = $user->addInscription();
} else {
   // sinon j'affiche un message d'erreur.
   $formErrors['mailExist'] = 'Un compte avec cette adresse mail existe déjà !';
}
var_dump($_POST);
var_dump($user);
}

