<?php

$user = new user;

if (count($_POST) > 0) {

   $formErrors = [];

   if (!empty($_POST['login'])) {
      if (preg_match($regex['login'], $_POST['login'])) {
         $user->login = htmlspecialchars($_POST['login']);

         $thisUserExists = $user->checkIfUserExists();
         if ($thisUserExists->count == 0) {
            $formError['login'] = 'L\'identifiant n\'existe pas.';
         }
      } else {
         $formErrors['login'] = INVALID_LOGIN;
      }
   } else {
      $formErrors['login'] = EMPTY_LOGIN;
   }

   if (!empty($_POST['mail'])) {
      if (!isset($formErrors['login'])) {
         if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $user->mail = htmlspecialchars($_POST['mail']);
         }
         $thisMailExists = $user->checkIfMailExists();
         if ($thisMailExists->count == 0) {
            $formError['mail'] = 'Cette adresse mail n\'est pas connue.';
         }
      }
   } else {
      $formErrors['mail'] = EMPTY_MAIL;
   }

   if (count($formErrors) == 0) {
      $to = $_POST['mail'];
      $subject = 'Génération d\'un nouveau mot de passe';
      $message = '<html><body>Ceci contient mon lien avec token</body></html>';
      $headers = implode("\r\n", [
         'From: Administrateur <morgan.bailleul.contact@gmail.com>',
         'Reply-To: morgan.bailleul.contact@gmail.com',
         'MIME-Version: 1.0',
         'Content-Type: text/html; charset=ISO-8859-1',
         'X-Mailer: PHP/' . PHP_VERSION
      ]);
      mail($to, $subject, $message, $headers);
      header('location:connexion.php');
      exit;
   }
}
