<div class="form-group">
    <form action="#" method="POST">
        <label for="deleteSelect">Supprimer un article:</label>
        <select class="form-control" name="deleteSelect" id="deleteSelect">
            <?php
            foreach ($articlesList as $article) { ?>
                <option value="<?= $article->title ?>"><?= $article->title ?></option>
            <?php } ?>
        </select>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-search" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Supprimer cet article
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        Êtes vous certain ?
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



