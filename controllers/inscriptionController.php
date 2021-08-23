<?php

// J'instancie un nouvel utilisateur de classe user
$user = new user;

//si j'ai au moins un champs du formulaire
if (count($_POST) > 0) {

   // je crée un tableau pour recueillir  les erreurs 
   $formErrors = [];

   // Je vérifie si login est n'est pas vide
   if (!empty($_POST['login'])) {
      // j'applique la regex pour verifier le format 
      if (preg_match($regex['login'], $_POST['login'])) {
         // filtre les chars pour eviter les injections SQL (ex: < >)
         $user->login = htmlspecialchars($_POST['login']);
         // Je vérifie si le login existe déjà
         $checkIfUserExists = $user->checkIfUserExists();
         // si il n'existe pas j'ajoute le login à user
         if ($checkIfUserExists->count > 0) {
            $formErrors['login'] = EXISTS_LOGIN;
         }
      } else { // si regex alors invalide
         $formErrors['login'] = INVALID_LOGIN;
      }
   } else { // si absent msg erreur
      $formErrors['login'] = EMPTY_LOGIN;
   }

   //ensuite je vérifie les 2 mots de passe
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
   if ($user->password != NULL and $password2 != NULL) {
      // je vérifie qu'ils soient identiques
      if ($user->password == $password2) {
         // je hashe le mdp
         $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      } else {
         $formErrors['invalidMDP'] = INVALID_PASSWORD;
      }
   }

   // je vérifie ensuite la présence d'une adresse mail
   if (!empty($_POST['mail'])) {
      //Le filter_var() sert de regex pour l'adresse mail.
      if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
         $user->mail = htmlspecialchars($_POST['mail']);
         //Je vérifie l'existence de l'adresse email dans userModel.php
         $checkIfThisMailExists = $user->checkIfMailExists();
         if ($checkIfThisMailExists->count > 0) {
            $formErrors['mailExist'] = EXIST_MAIL;
         }
      } else {
         $formErrors['mail'] = INVALID_MAIL;
      }
   } else {
      $formErrors['mail'] = EMPTY_MAIL;
   }


   if (count($formErrors) == 0) {
      // je crée un utilisateur
     $newUser = $user->addUser();
     $_SESSION['login'] = $user->login;
     $_SESSION['mail'] = $user->mail;
     header('Location:profil.php');
     exit;
   }

}
