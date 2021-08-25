<?php

class book extends database
{
    protected $db = null;
    public $id = 0; //on initialise les valeurs pour le patient
    public $author = ' ';
    public $title = ' ';
    public $resume = ' ';
    public $release = '1970-01-01';
    
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function getBooksList()
    {
        $getList = 'SELECT `id`,`author`,`title`,`resume`,`release`
        FROM shd113_books
        ORDER BY `id` DESC';
        $getListExecute = $this->db->query($getList);
        $getListResult = $getListExecute->fetchAll(PDO::FETCH_OBJ); //fetchAll est une methode de l'objet "queryExecute"
        return $getListResult;
    }

    public function addBook()
    {
        $addBook = $this->db->prepare('INSERT INTO shd113_books(`author`,`title`, `resume`, `release`)
        VALUES (:author, :title, :resume, :release)');
        $addBook->bindValue(':author', $this->author, PDO::PARAM_STR);
        $addBook->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addBook->bindValue(':resume', $this->resume, PDO::PARAM_STR);
        $addBook->bindValue(':release', $this->release, PDO::PARAM_INT);
        $addBook->execute();
    }

    public function updateBook()
    {
        $updateBook = $this->db->prepare('UPDATE shd113_Books 
        SET `title`=:updateBookTitle, `resume`=:updateBookResume
        WHERE `id`=:bookId');
        $updateBook->bindValue(':bookId', $this->id, PDO::PARAM_INT);
        $updateBook->bindValue(':updateBookTitle', $this->title, PDO::PARAM_STR);
        $updateBook->bindValue(':updateBookResume', $this->text, PDO::PARAM_STR);
        return $updateBook->execute();
    }

    // public function deleteBook()
    // {
    //     $deleteBook = $this->db->prepare('DELETE FROM shd113_Books
    //     WHERE `title`=:deleteSelect');
    //     $deleteBook->bindValue(':deleteSelect', $this->title, PDO::PARAM_STR);
    //     return $deleteBook->execute();
    // }
}