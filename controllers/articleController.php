<?php

$article = new article();

$articlesList = $article->getArticlesList();

$error = null;

if (isset($_POST['title']) && isset($_POST['text'])) {
   
    $article->title = $_POST['title'];
    $article->release = date('Y-m-d H:i:s');
    $article->id_users = $_SESSION['id'];
    $article->text = $_POST['text'];
    $article->addArticle();

    header('Refresh:0');
    
} else {
    $error = "Toutes les valeurs ne sont pas renseignées";
}
