<?php

class article extends database
{
    protected $db = null;
    public $id = 0; //on initialise les valeurs pour le patient
    public $title = ' ';
    public $release = '1970-01-01';
    public $text = ' ';
    public $id_user = 0;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function addArticle()
    {
        $addArticle = $this->db->prepare('INSERT INTO shd113_articles(`title`, `release`, `text`, `id_users`)
        VALUES (:title, :release, :text, :id_users)');
        //var_dump($this->id_users);die;
        $addArticle->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addArticle->bindValue(':release', $this->release, PDO::PARAM_STR);
        $addArticle->bindValue(':text', $this->text, PDO::PARAM_STR);
        $addArticle->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $addArticle->execute();
    }

    public function getArticlesList()
    {
        $getList = 'SELECT shd113_articles.id as ref,`title`,`release`,`text`,`id_users`,`login`
        FROM shd113_articles
        INNER JOIN shd113_users ON shd113_articles.id_users = shd113_users.id
        ORDER BY `release` DESC';
        $getListExecute = $this->db->query($getList);
        $getListResult = $getListExecute->fetchAll(PDO::FETCH_OBJ); //fetchAll est une methode de l'objet "queryExecute"
        return $getListResult;
    }

    public function deleteArticle()
    {

    }

    public function modifyArticle()
    {
        
    }
}