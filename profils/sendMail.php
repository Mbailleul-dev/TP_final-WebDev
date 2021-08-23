<?php
session_start();


$to = $_SESSION['mail'];
$subject = 'Génération d\'un nouveau mot de passe';
$message = '<html><body>Ceci contient mon lien avec token</body></html>';
$headers = implode("\r\n", [
'From: Administrateur <morgan.bailleul.contact@gmail.com>',
'Reply-To: morgan.bailleul.contact@gmail.com',
'MIME-Version: 1.0',
'Content-Type: text/html; charset=ISO-8859-1',
'X-Mailer: PHP/' . PHP_VERSION
]);

if(!empty($_POST))
mail($to, $subject, $message, $headers);