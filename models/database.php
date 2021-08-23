<?php

class database
{
    protected $db = null;
    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=dmgp;charset=utf8", 'root', 'root');
            return $this->db;
        } catch (PDOException $error) {
            die($error->getMessage());
        }
    }
}