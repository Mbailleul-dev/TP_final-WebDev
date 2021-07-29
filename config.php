<?php

$regex = ['login' => '/[a-zA-Z0-9]/'];
// Permet de créer une constante PHP ('NOM', 'Valeur')
define('EMPTY_LOGIN', 'Le pseudo est obligatoire');
define('INVALID_LOGIN', 'Le pseudo est invalide ! Il doit contenir uniquement des lettres et des chiffres.');
define('EMPTY_MAIL', 'L\' adresse mail est obligatoire');
define('INVALID_MAIL', 'L\' adresse mail est invalide ! Il doit contenir des caractères valides et un @.');
define('EMPTY_PASSWORD', 'Le mot de passe est obligatoire');
define('EMPTY_PASSWORD2', 'La confirmation du mot de passe est obligatoire');
define('INVALID_PASSWORD', 'Les mots de passes sont différents');