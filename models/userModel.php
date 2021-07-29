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

    public function verifyIfMailExist()
    {
        $doesThisMailExist = $this->db->prepare('SELECT COUNT(mail) as count FROM shd113_users WHERE mail=:mail');
        $doesThisMailExist->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $doesThisMailExist->execute();
        $doesThisMailExistResult = $doesThisMailExist->fetch(PDO::FETCH_OBJ);
        return $doesThisMailExistResult;
        // si pas de correspondance
    }

    public function addInscription()
    {
        $createUser = $this->db->prepare('INSERT INTO shd113_users(login, password, mail, id_userTypes) VALUES(:login,:password,:mail, 2)');
        $createUser->bindValue(':login',$this->login, PDO::PARAM_STR);
        $createUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $createUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $createUser->execute();
    }
}
