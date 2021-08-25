<?php

$article = new article();

$error = null;

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


if (!empty($_POST['ModalLabel']) && !empty($_POST['ModalBody'])) {
    $article->id = $_POST['newId'];
    $article->title = $_POST['ModalLabel'];
    $article->text = $_POST['ModalBody'];
    $article->id_users = $_SESSION['id'];
    $alterArticle = $article->updateArticle();
} else {
    $error = "Toutes les valeurs ne sont pas renseignées";
}

if(!empty($_POST['deleteSelect']))
{
    $article->title= $_POST['deleteSelect'];
    $deleteArticle = $article->deleteArticle();
}

$articlesList = $article->getArticlesList();