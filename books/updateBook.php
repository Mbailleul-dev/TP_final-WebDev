<div class="form-group">
    <form action="#" method="POST">
        <label for="updateBookSelect">Modifier un article:</label>
        <select class="form-control" id="updateBookSelect">
            <?php
            foreach ($booksList as $book) { ?>
                <option value="<?= $book->id ?>" book-title="<?= $book->title ?>" book-resume="<?= $book->resume ?>"><?= $book->title ?></option>
            <?php } ?>
        </select>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-search" data-bs-toggle="modal" data-bs-target="#updateBook">
            Modifier cet ouvrage
        </button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="updateBook" tabindex="-1" aria-labelledby="updateBookLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="#" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="updateBookTitle">Titre:</label>
                                <input type="text" class="form-control" name="updateBookTitle" value="" id="updateBookTitle">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="updateBookResume">Texte:</label>
                                <textarea class="form-control" name="updateBookResume" value="" id="updateBookResume" rows="15"></textarea>
                            <label for="bookId"></label><input id="bookId" class="visible" name="bookId" type="number">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-inverse" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-search">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>