<?php

// Je crée la classe utilisateur, enfant de la classe database
class user extends database
{
    // j'initialise les valeurs utilisateur
    protected $db = null;
    public $id = 0;
    public $login = ' ';
    public $password = ' ';
    public $mail = ' ';
    public $id_userTypes = 0;

    /** La fonction magique __construct se lance automatiquement à l'appel de la classe
     * le deuxième construc fait référence à celui de database et permet de garder 
     * la connexion avec la BDD */
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    // Je vérifie si l'utilisateur existe 
    public function checkIfUserExists()
    {
        // Je prépare la requête car je ne connais pas le login
        $doesThisUserExists = $this->db->prepare('SELECT COUNT(`login`) as count FROM shd113_users WHERE `login` = :login');
        // bindValue vérifie l'entrée de login
        $doesThisUserExists->bindValue(':login', $this->login, PDO::PARAM_STR);
        $doesThisUserExists->execute(); // on execute la requete
        // et on obtient un resultat sous forme d'objet
        $doesThisUserExistsResult = $doesThisUserExists->fetch(PDO::FETCH_OBJ);
        // le resultat est obtenu sous forme de boleen (true ou false)
        return $doesThisUserExistsResult;
    }

    // même chose pour les emails
    public function checkIfMailExists()
    {
        $doesThisMailExists = $this->db->prepare('SELECT COUNT(mail) as count FROM shd113_users WHERE mail=:mail');
        $doesThisMailExists->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $doesThisMailExists->execute();
        $doesThisMailExistsResult = $doesThisMailExists->fetch(PDO::FETCH_OBJ);
        return $doesThisMailExistsResult;
    }

    // si tout est ok on inscrit le nouvel utilisateur dans la BDD
    public function addUser()
    {
        $createUser = $this->db->prepare('INSERT INTO shd113_users(login, password, mail, id_userTypes) VALUES(:login,:password,:mail, 2)');
        $createUser->bindValue(':login', $this->login, PDO::PARAM_STR);
        $createUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $createUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $createUser->execute();
    }

    // méthode pour vérifier la correspondance du mot de passe à la connexion
    public function getHash()
    {
        $getHash = $this->db->prepare('SELECT password FROM shd113_users WHERE login=:login');
        $getHash->bindValue(':login', $this->login, PDO::PARAM_STR);
        $getHash->execute();
        $getHashResult = $getHash->fetch(PDO::FETCH_OBJ);
        return $getHashResult;
    }

    // méthode de connexion de l'utilisateur
    public function userConnexion()
    {
        $userConnects = $this->db->prepare('SELECT id, mail, id_userTypes FROM shd113_users
        WHERE login = :login');
        $userConnects->bindValue(':login', $this->login, PDO::PARAM_STR);
        $userConnects->execute();
        $userConnectsResult = $userConnects->fetch(PDO::FETCH_OBJ);
        return $userConnectsResult;
    }

    //méthode pour ajouter une photo de profil
    public function addAvatar()
    {
        $avatar = $this->db->prepare('UPDATE shd113_users SET avatar = :avatar 
        WHERE id = :id');
        $avatar->bindValue('id', $this->id, PDO::PARAM_INT);
        $avatar->bindValue('avatar', $this->id, PDO::PARAM_STR);
        return $avatar->execute();
    }
}
