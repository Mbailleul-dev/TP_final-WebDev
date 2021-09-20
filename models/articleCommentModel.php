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

    public function getArticleComments()
    {
        $getList = $this->db->prepare('SELECT shd113_articlescomments.id, shd113_articlescomments.text,shd113_articlescomments.release,`id_article`,`id_user`
        FROM shd113_articlescomments
        INNER JOIN shd113_articles ON shd113_articles.id = shd113_articlescomments.id_article
        INNER JOIN shd113_users ON shd113_users.id = shd113_articlescomments.id_user
        WHERE shd113_articles.id = :id
        ORDER BY shd113_articlescomments.id DESC');
        $getList->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getList ->execute();
        $getListResult = $getList->fetchAll(PDO::FETCH_OBJ); //fetchAll est une methode de l'objet "queryExecute"
        return $getListResult;
    }

    public function addArticleComment()
    {
        $newComment = $this->db->prepare('INSERT INTO `shd113_articlescomments`(`text`, `release`, `id_article`, `id_user`) 
        VALUES (:text, :release, :id_article, :id_user)');
        $newComment->bindValue(':text', $this->text, PDO::PARAM_STR);
        $newComment->bindValue(':release', $this->release, PDO::PARAM_STR);
        $newComment->bindValue(':id_article', $this->id_article, PDO::PARAM_INT);
        $newComment->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        return $newComment->execute();
    }
}
