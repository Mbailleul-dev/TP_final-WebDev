<?php

class etf extends database
{
    protected $db = null;
    public $id = 0; 
    public $investor = ' ';
    public $name = ' ';
    public $ticker = ' ';
    
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function getEtfsList()
    {
        $getList = 'SELECT `id`,`investor`, `name`,`ticker`
        FROM shd113_etf
        ORDER BY `id`';
        $getListExecute = $this->db->query($getList);
        $getListResult = $getListExecute->fetchAll(PDO::FETCH_OBJ); //fetchAll est une methode de l'objet "queryExecute"
        return $getListResult;
    }
}