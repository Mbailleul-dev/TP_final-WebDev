<?php
session_start();

require_once "../models/database.php";
require_once "../models/topicModel.php";
require_once "../controllers/topicController.php";

require_once "../header2.php";
?>

<div class="container-fluid topic mt-5">
    <div class="row">
        <div class="col-md-2 ms-4">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Tous les sujets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dépenser moins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gagner plus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Coin lecture</a>
                </li>
                <li class="nav-item">
                    <!-- Button trigger modal -->
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Ajouter un sujet</a>
                </li>
            </ul>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="#" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nouveau sujet</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="addCategoryTopic">Catégorie:</label>
                            <select class="form-control" id="addCategoryTopic" name="addCategoryTopic">
                                <option value="DM">Dépenser moins</option>
                                <option value="GP">Gagner plus</option>
                                <option value="lecture">Coin lecture</option>
                            </select><br>
                            <label for="addTitleTopic">Titre du topic:</label>
                            <textarea class="form-control" id="addTitleTopic" name="addTitleTopic" rows="1" cols="100"></textarea>
                            <label for="addTextTopic">Contenu du topic:</label>
                            <textarea class="form-control" id="addTextTopic" name="addTextTopic" rows="10" cols="100"></textarea>
                            <small><?= @$error ?></small>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-inverse" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-search">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9">
                <div class="row text-center">
                    <div class="col">
                        <p class="text-white"><?= $topic->text ?></p>
                    </div>
                </div>
                <div class="row">
                    <button>Ajouter un commentaire</button>
                </div>
        </div>
    </div>
</div>


<?php
require_once "../footer.php"
?>