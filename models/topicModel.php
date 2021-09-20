<?php

class topic extends database
{
    protected $db = null;
    public $id = 0;
    public $category = null;
    public $title = ' ';
    public $release = '1970-01-01';
    public $text = ' ';
    public $id_users = 0;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function getTopicsList()
    {
        $getList = 'SELECT shd113_topics.id,`category`, `title`
        FROM shd113_topics
        ORDER BY `release` DESC';
        $getListExecute = $this->db->query($getList);
        $getListResult = $getListExecute->fetchAll(PDO::FETCH_OBJ); //fetchAll est une methode de l'objet "queryExecute"
        return $getListResult;
    }

    public function addTopic()
    {
        $addTopic = $this->db->prepare('INSERT INTO shd113_topics(`category`,`title`, `release`, `text`, id_users)
        VALUES (:category, :title, :release, :text, :id_users)');
        $addTopic->bindValue(':category', $this->category, PDO::PARAM_STR);
        $addTopic->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addTopic->bindValue(':release', $this->release, PDO::PARAM_STR);
        $addTopic->bindValue(':text', $this->text, PDO::PARAM_STR);
        $addTopic->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $addTopic->execute();
    }
    public function getTopic()
    {
        $getTopic = $this->db->prepare('SELECT shd113_topics.id,`category`, `title`,`release`,`text`,`id_users`,`login`
        FROM shd113_topics
        INNER JOIN shd113_users ON shd113_topics.id_users = shd113_users.id
        WHERE shd113_topics.id = :id');
        $getTopic->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $getTopic->fetch(PDO::FETCH_OBJ);
    }
}
