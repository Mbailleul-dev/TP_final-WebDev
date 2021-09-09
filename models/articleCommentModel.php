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

    // public function getArticleListWithComments()
    // {
    //     $getList = 'SELECT shd113_articlescomments.id as idComment, 
    //     shd113_articlescomments.text as textComment,
    //     shd113_articlescomments.release as releaseComment, id_article, id_user,
    //     shd113_articles.id as idArticle, shd113_articles.title as titleArticle, 
    //     shd113_articles.release as releaseArticle, shd113_articles.text as textArticle, 
    //     shd113_articles.id_users, shd113_users.login as login
    //     FROM shd113_articlescomments
    //     RIGHT JOIN shd113_articles ON shd113_articles.id = shd113_articlescomments.id_article
    //     LEFT JOIN shd113_users ON shd113_users.id = shd113_articlescomments.id_user
    //     ORDER BY shd113_articles.release DESC';
    //     $getListExecute = $this->db->query($getList);
    //     $getListResult = $getListExecute->fetchAll(PDO::FETCH_OBJ); //fetchAll est une methode de l'objet "queryExecute"
    //     return $getListResult;
    // }

    public function getArticleComments()
    {
        $getList = $this->db->prepare('SELECT shd113_articlescomments.id, shd113_articlescomments.text,shd113_articlescomments.release,`id_article`,`id_user`
        FROM shd113_articlescomments
        INNER JOIN shd113_articles ON shd113_articles.id = shd113_articlescomments.id_article
        INNER JOIN shd113_users ON shd113_users.id = shd113_articlescomments.id_user
        WHERE shd113_articles.id = :id
        ORDER BY `release` DESC');
        $getList->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getList ->execute();
        $getListResult = $getList->fetchAll(PDO::FETCH_OBJ); //fetchAll est une methode de l'objet "queryExecute"
        return $getListResult;
    }

}
