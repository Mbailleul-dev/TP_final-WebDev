<?php

$article = new article();
$articleComment = new articleComment();
$error = null;

//ajout des articles
if (!empty($_POST['title']) && !empty($_POST['text'])) {

    $article->title = $_POST['title'];
    $article->release = date('Y-m-d H:i:s');
    $article->id_users = $_SESSION['id'];
    $article->text = $_POST['text'];
    $article->addArticle();

    header('Refresh:0');
} else {
    $error = "Toutes les valeurs ne sont pas renseignées";
}

//modification des articles
if (!empty($_POST['ModalLabel']) && !empty($_POST['ModalBody'])) {
    $article->id = $_POST['newId'];
    $article->title = $_POST['ModalLabel'];
    $article->text = $_POST['ModalBody'];
    $article->id_users = $_SESSION['id'];
    $alterArticle = $article->updateArticle();
} else {
    $error = "Toutes les valeurs ne sont pas renseignées";
}

//suppression d'un article
if(!empty($_POST['deleteSelect']))
{
    $article->id= $_POST['deleteSelect'];
    $deleteArticle = $article->deleteArticle();
}

//ajouter des commentaires
if(!empty($_POST['newComment'])){
    $articleComment->text = $_POST['newComment'];
    $articleComment->release = date('Y-m-d H:i:s');
    $articleComment->id_article = $_POST['id_article'];
    $articleComment->id_user = $_SESSION['id'];
    $articleComment->addArticleComment();
}

//liste des articles avec les commentaires
$articlesWithComments = $article->getArticlesWithComments();

foreach ($articlesWithComments as $key => $article) {
    if(!isset($articleShow[$article->idArticle])){
        $articleShow[$article->idArticle]['article']['titleArticle'] = $article->titleArticle;
        $articleShow[$article->idArticle]['article']['textArticle'] = $article->textArticle;
        $articleShow[$article->idArticle]['article']['authorLogin'] = $article->authorLogin;
        $articleShow[$article->idArticle]['article']['releaseArticle'] = $article->releaseArticle;

    }
    $articleShow[$article->idArticle]['comment'][$article->idComment]['textComment'] = $article->textComment;
    $articleShow[$article->idArticle]['comment'][$article->idComment]['releaseComment'] = $article->releaseComment;
    $articleShow[$article->idArticle]['comment'][$article->idComment]['commentLogin'] = $article->commentLogin;
}

