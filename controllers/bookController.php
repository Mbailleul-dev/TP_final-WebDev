<?php

$book = new book();

$error = null;

if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['resume']) && !empty($_POST['release'])) {
    $book->author = $_POST['author'];
    $book->title = $_POST['title'];
    $book->resume = $_POST['resume'];
    $book->release = $_POST['release'];
    $newBook = $book->addBook();
    header('Refresh:0');
    exit;
} else {
    $error = "Toutes les valeurs ne sont pas renseignées";
}

if(!empty($_POST['bookId']) && !empty($_POST['updateBookTitle']) && !empty($_POST['updateBookResume'])){
    $book->id = $_POST['bookId'];
    $book->title = $_POST['title'];
    $book->resume = $_POST['resume'];
    $alterBook = $book->updateBook();
}

$booksList = $book->getBooksList();