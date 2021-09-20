<div class="form-group">
    <form action="#" method="POST">
        <label for="deleteSelect">Supprimer un article:</label>
        <select class="form-control" name="deleteSelect" id="deleteSelect">
            <?php
            foreach ($articleShow as $key => $article) { ?>
                <option value="<?= $key ?>"><?= $article['article']['titleArticle'] ?></option>
            <?php } ?>
        </select>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-search" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Supprimer cet article
        </button>
        <!-- Modal -->
        <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Êtes vous certain ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-inverse" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-search">Supprimer cet article</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <button type="submit" class="btn btn-search">Supprimer cet article</button> -->
    </form>
</div>



