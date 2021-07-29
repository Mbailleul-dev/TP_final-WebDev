<?php

class admin extends user
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


}