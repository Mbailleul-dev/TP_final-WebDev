<?php
session_start();

require_once "../models/database.php";
require_once "../models/bookModel.php";
require_once "../controllers/bookController.php";

require_once "../header.php";
require_once "../navbar.php";
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
    </div>
<?php } ?>

<section>
<div class="container">
    <?php
    foreach ($booksList as $book) { ?>
        <div class="accordion accordion-flush">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed book"  type="button" data-bs-toggle="collapse" data-bs-target="#flush-<?= $book->id ?>" aria-expanded="false" aria-controls="flush-<?= $book->id ?>">
                        <p><b><?= $book->title ?></b> écrit par <b><?= $book->author ?></b>.</p>
                    </button>
                </h2>
                <div id="flush-<?= $book->id ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <p>Publié en <?= $book->release ?>. </p>
                        <p class="text" ><?= $book->resume ?></p>
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