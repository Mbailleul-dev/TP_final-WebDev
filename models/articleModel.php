<?php

class article extends database
{
protected $db = null;
public $id = 0; //on initialise les valeurs pour le patient
public $title = ' ';
public $release = '1970-01-01';
public $text = '';
public $id_users = 0;

public function __construct()
{
    $this->db = parent::__construct();
}


}