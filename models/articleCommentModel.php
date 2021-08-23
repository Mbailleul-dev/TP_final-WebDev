<?php

class articleComment extends database
{
    protected $db = null;
    public $id = 0; //on initialise les valeurs
    public $text = ' ';
    public $release = '1970-01-01';
    public $id_articles = 0;
    public $id_users = 0;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

   
}