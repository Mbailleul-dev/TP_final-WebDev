<?php
session_start();

require_once "../models/database.php";
require_once "../models/articleModel.php";
require_once "../models/articleCommentModel.php";
require_once "../controllers/articleController.php";

require_once "../header2.php";
?>

<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php
                if (isset($_SESSION['id_userTypes']) && $_SESSION['id_userTypes'] == 1) { ?>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <?php include "addArticle.php"; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-5">
                <?php
                if (isset($_SESSION['id_userTypes']) && $_SESSION['id_userTypes'] == 1) { ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?php include "updateArticle.php"; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <?php include "deleteArticle.php"; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="row mt-5">
            <?php
            foreach ($articleShow as $key => $article) { ?>

                <div class="row text-center">
                    <div class="col">
                    <a class="btn btn-search btn-size" data-bs-toggle="collapse" href="#firstCollapse<?= $key ?>" role="button" aria-expanded="false" aria-controls="firstCollapse<?= $key ?>"><?= $article['article']['titleArticle'] ?></a>
                        <div class="collapse multi-collapse" id="firstCollapse<?= $key ?>">
                            <div class="card card-body">
                                <p>Ecrit le <?= $article['article']['releaseArticle'] ?> par <b><?= $article['article']['authorLogin'] ?></b></p>
                                <p class="text" id="article-<?= $key ?>" article-title="<?= $article['article']['titleArticle'] ?>"><?= $article['article']['textArticle'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                    <button id="btnComment" class="btn btn-search btn-size" type="button" data-bs-toggle="collapse" data-bs-target="#secondCollapse<?= $key ?>" aria-expanded="false" aria-controls="secondCollapse<?= $key ?>">Voir les commentaires</button>
                        <div class="collapse multi-collapse" id="secondCollapse<?= $key ?>">
                            <div class="card card-body">
                                <?php
                                foreach($article['comment'] as $comment)
                                { 
                                    if (isset($comment['releaseComment']) && isset($comment['commentLogin']))
                                    { ?>
                                    <p>ecrit par <b><?= $comment['commentLogin']  ?></b> le <b><?= $comment['releaseComment'] ?></b></p>
                                    <p><?= $comment['textComment'] ?></p>
                                    <?php  } else { ?> <p>Pas encore de commentaire.</p>
                                <?php } }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>
</section>
<?php
require_once "../footerArticle.php";
?>