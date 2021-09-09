<?php
session_start();

require_once "../models/database.php";
require_once "../models/bookModel.php";
require_once "../controllers/bookController.php";

require_once "../header2.php";
?>

<?php
if (isset($_SESSION['id_userTypes']) && $_SESSION['id_userTypes'] == 1) { ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php require "addBook.php"; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php require "updateBook.php"; ?>
            </div>
            <div class="col-md-6">
                <?php require "deleteBook.php"; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php require_once "updateValidate.php" ?>
            </div>
        </div>
    </div>
<?php } ?>

<section>
    <div class="container mt-5 d-flex">
        <div class="row">

            <?php
            foreach ($booksList as $book) { ?>
                <!-- <div class="accordion accordion-flush">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed book" type="button" data-bs-toggle="collapse" data-bs-target="#flush-<?= $book->id ?>" aria-expanded="false" aria-controls="flush-<?= $book->id ?>">
                            <p><b><?= $book->title ?></b> écrit par <b><?= $book->author ?></b>.</p>
                        </button>
                    </h2>
                    <div id="flush-<?= $book->id ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>Publié en <?= $book->release ?>. </p>
                            <p class="text" id="book-<?= $book->ref ?>" book-title="<?= $book->title ?>"><?= $book->resume ?></p>
                        </div>
                    </div>
                </div>
            </div> -->
                <div class="col-md-4">
                    <div class="card mt-5" style="width: 25rem;" id="<?= $book->ref ?>">
                        <img src="../assets/img/couverture/default.jpg" class="card-img-top" alt="Photo du bouquin">
                        <div class="card-body">
                            <h5 class="card-title"><b><?= $book->title ?></b> écrit par <b><?= $book->author ?></b>.</h5>
                            <p class="card-text">Paru le <?= $book->release ?></p>
                            <p class="card-text text" style="overflow: auto;"><?= $book->resume ?></p>
                            <a href="#" class="btn btn-style">Voir les commentaires</a>
                        </div>
                    </div>
                </div>
            <?php
            } ?>


        </div>
    </div>
</section>

<?php
require_once "../footer.php";
?>