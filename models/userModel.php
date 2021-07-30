<?php

class user extends database
{
    protected $db = null;
    public $id = 0; //on initialise les valeurs pour le patient
    public $login = ' ';
    public $password = ' ';
    public $mail = ' ';
    public $id_userTypes = 0;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function verifyIfMailExists()
    {
        $doesThisMailExists = $this->db->prepare('SELECT COUNT(mail) as count FROM shd113_users WHERE mail=:mail');
        $doesThisMailExists->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $doesThisMailExists->execute();
        $doesThisMailExistsResult = $doesThisMailExists->fetch(PDO::FETCH_OBJ);
        return $doesThisMailExistsResult;
        // si pas de correspondance
    }

    public function addInscription()
    {
        $createUser = $this->db->prepare('INSERT INTO shd113_users(login, password, mail, id_userTypes) VALUES(:login,:password,:mail, 2)');
        $createUser->bindValue(':login', $this->login, PDO::PARAM_STR);
        $createUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $createUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $createUser->execute();
    }

    public function verifyIfUserExists()
    {
        $doesThisUserExists = $this->db->prepare('SELECT COUNT(login) as count FROM shd113_users WHERE login= :login');
        $doesThisUserExists->bindValue(':login', $this->login, PDO::PARAM_STR);
        $doesThisUserExists->execute();
        $doesThisUserExistsResult = $doesThisUserExists->fetch(PDO::FETCH_OBJ);
        return $doesThisUserExistsResult;
    }
    public function getHash()
    {
        $getHash = $this->db->prepare('SELECT password FROM shd113_users WHERE login=:login');
        $getHash->bindValue(':login', $this->login, PDO::PARAM_STR);
        $getHash->execute();
        $getHashResult = $getHash->fetch(PDO::FETCH_OBJ);
        return $getHashResult;
    }

    public function userConnexion()
    {
        $userConnects = $this->db->prepare('SELECT id, mail, id_userTypes FROM shd113_users
        WHERE login = :login');
        $userConnects->bindValue(':login', $this->login, PDO::PARAM_STR);
        $userConnects->execute();
        $userConnectsResult = $userConnects->fetch(PDO::FETCH_OBJ);
        return $userConnectsResult;
    }
}
