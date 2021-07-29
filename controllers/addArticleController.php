<?php

if (count($_POST) > 0) 
{

    $formErrors = []; 

    $article = new article(); 

    if (!empty($_POST['title'])) { 
        if (preg_match($regex['name'], $_POST['title'])) { 
            $patient->title = strtoupper($_POST['title']); 
        } else {
            $formErrors['title'] = INVALID_title; 
        }
    } else {
        $formErrors['title'] = EMPTY_title;
    }

    if (!empty($_POST['release'])) {
        if (preg_match($regex['name'], $_POST['release'])) {
            $patient->release = $_POST['release'];
        } else {
            $formErrors['release'] = INVALID_release;
        }
    } else {
        $formErrors['release'] = EMPTY_release;
    }

    if (!empty($_POST['text'])) {
        if (preg_match($regex['text'], $_POST['text'])) {
            $patient->text = $_POST['text'];
        } else {
            $formErrors['bithdate'] = INVALID_text;
        }
    } else {
        $formErrors['text'] = EMPTY_text;
    }

    
    if (count($formErrors) == 0) {
        $article->addArticle(); 
    }
}
