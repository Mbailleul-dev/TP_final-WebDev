<?php

$book = new book();

$booksList = $book->getBooksList();

$error = null;

$error = null;

if (isset($_POST['author']) && isset($_POST['title']) && isset($_POST['resume']) && isset($_POST['release'])) {
   
    $book->author = $_POST['author'];
    $book->title = $_POST['title'];
    $book->resume = $_POST['resume'];
    $book->release = $_POST['release'];
    $book->addBook();

    header('Refresh:0');
    
} else {
    $error = "Toutes les valeurs ne sont pas renseignées";
}