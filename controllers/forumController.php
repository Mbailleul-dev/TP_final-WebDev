<?php

$topic = new topic();

$error = null;

if (!empty($_POST['addCategoryTopic']) && !empty($_POST['addTitleTopic']) && !empty($_POST['addTextTopic'])) {
    $topic->category = $_POST['addCategoryTopic'];
    $topic->title = $_POST['addTitleTopic'];
    $topic->release = date('Y-m-d H:i:s');
    $topic->text = $_POST['addTextTopic'];
    $topic->id_users = $_SESSION['id'];
    $topic->addTopic();
        
} else {
    $error = 'Il manque un critère !';
}

$topicsList = $topic->getTopicsList();
