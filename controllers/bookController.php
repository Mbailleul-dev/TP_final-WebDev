<?php

$book = new book();

$error = null;
$getBook = null;

//ajouter un livre
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

//selectionner un livre dans le select
if(!empty($_POST['bookFormControlSelect'])){
$book->id = $_POST['bookFormControlSelect'];
$getBook = $book->getBook();
}

//modifier un livre
if(!empty($_POST['newBookAuthor']) && !empty($_POST['newBookTitle']) && !empty($_POST['newBookRelease']) && !empty($_POST['newBookResume'])){
    $book->id = $_POST['newBookId'];
    $book->author = $_POST['newBookAuthor'];
    $book->title = $_POST['newBookTitle'];
    $book->release = $_POST['newBookRelease'];
    $book->resume = $_POST['newBookResume'];
    $updateBook = $book->updateBook();
}
//supprimer in livre
if(!empty($_POST['deleteSelect']))
{
    $book->title= $_POST['deleteSelect'];
    $deletebook = $book->deleteBook();
}

//générer tous les livres
$booksList = $book->getBooksList();