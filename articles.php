<?php
session_start();

require_once "database.php";
require_once "models/articleModel.php";
require_once "controllers/articleController.php";

require_once "header.php";
?>


<?php
if (isset($_SESSION['id_userTypes']) && $_SESSION['id_userTypes'] == 1) { ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php require "addArticle.php"; ?>
            </div>
        </div>
    </div>
<?php } ?>

<section>
<div class="container">
    <?php
    foreach ($articlesList as $article) { ?>

        <div class="accordion accordion-flush">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-<?= $article->ref ?>" aria-expanded="false" aria-controls="flush-<?= $article->ref ?>">
                        <?= $article->title ?>
                    </button>
                </h2>
                <div id="flush-<?= $article->ref ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <p>Ecrit le <?= $article->release ?> par <b><?= $article->login ?></b></p>
                        <p class="text"><?= $article->text ?></p>
                    </div>
                </div>
            </div>
        <?php
    } ?>
        </div>
</div>
</section>
<?php
require_once "footer.php";
?>