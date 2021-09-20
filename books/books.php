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
                <div class="col-md-4">
                    <div class="card mt-5" style="width: 25rem;" id="<?= $book->ref ?>">
                        <div class="card-body">
                            <h5 class="card-title"><b><?= $book->title ?></b> écrit par <b><?= $book->author ?></b>.</h5>
                            <p class="card-text">Paru le <?= $book->release ?></p>
                            <p class="card-text text" style="overflow: auto;">
                                <img src="../assets/img/couverture/default.jpg" class="cardImg me-2" alt="Photo du bouquin">
                                <?= $book->resume ?>
                            </p>
                            <!-- <a class="btn btn-size btn-style" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                Voir les commentaires.
                            </a> -->
                        </div>
                    </div>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                        </div>
                        <div class="offcanvas-body">
                            <div>
                                <p class="black">Premier commentaire.</p>
                            </div>
                            <button type="button" class="btn-style btn text-reset" data-bs-dismiss="offcanvas">Fermer</button>
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