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

    public function updateArticle()
    {
        $updateArticle = $this->db->prepare('UPDATE shd113_articles 
        SET `title`=:ModalLabel, `text`=:ModalBody, `id_users`=:id_users
        WHERE `id`=:newId');
        $updateArticle->bindValue(':newId', $this->id, PDO::PARAM_INT);
        $updateArticle->bindValue(':ModalLabel', $this->title, PDO::PARAM_STR);
        $updateArticle->bindValue(':ModalBody', $this->text, PDO::PARAM_STR);
        $updateArticle->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $updateArticle->execute();
    }

    public function deleteArticle()
    {
        $deleteArticle = $this->db->prepare('DELETE FROM shd113_articles
        WHERE `id`= :deleteSelect');
        $deleteArticle->bindValue(':deleteSelect', $this->id, PDO::PARAM_INT);
        return $deleteArticle->execute();
    }

    public function getArticlesWithComments()
    {
        $getList = 'SELECT shd113_articlescomments.id as idComment, 
        shd113_articlescomments.text as textComment,
       shd113_articlescomments.release as releaseComment, id_article, id_user,
       shd113_articles.id as idArticle, shd113_articles.title as titleArticle, shd113_articles.text as textArticle,
       shd113_articles.release as releaseArticle, shd113_articles.id_users, commentUser.login as commentLogin, authorUser.login as authorLogin
       FROM shd113_articles
       LEFT JOIN shd113_articlescomments ON shd113_articles.id = shd113_articlescomments.id_article
       LEFT JOIN shd113_users as commentUser ON commentUser.id = shd113_articlescomments.id_user
       LEFT JOIN shd113_users as authorUser ON authorUser.id = shd113_articles.id_users
       ORDER BY shd113_articles.release DESC, shd113_articlescomments.release';
        $getListExecute = $this->db->query($getList);
        $getListResult = $getListExecute->fetchAll(PDO::FETCH_OBJ); //fetchAll est une methode de l'objet "queryExecute"
        return $getListResult;
    }
}
