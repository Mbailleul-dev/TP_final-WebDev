<div class="form-group">
  <form action="#" method="POST">
    <label for="exampleFormControlSelect1">Modifier un article:</label>
    <select class="form-control" id="exampleFormControlSelect1">
      
      <?php
      foreach ($articleShow as $key => $article) { ?>
        <option value="<?= $key ?>"><?= $article['article']['titleArticle'] ?></option>
      <?php } ?>
    </select>
  </form>
</div>

<!-- Bouton Modal -->
<button type="button" id="updateArticle" class="btn btn-search" data-bs-toggle="modal" data-bs-target="#Modal">
  Modifier cet article
</button>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="#" method="POST">
        <div class="modal-header">
        <label for="ModalLabel"></label>
          <h5 class="modal-title"><input id="ModalLabel" type="text" class="form-control" name="ModalLabel" value="<?= @$article['article']['titleArticle'] ?>"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="ModalBody"></label>
          <textarea id="ModalBody" class="form-control" name="ModalBody" value="" rows="15"><?= @$article['article']['textArticle'] ?></textarea>
        <label for="newId"></label><input class="invisible" id="newId" name="newId" type="number" value="<?= @$key ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-inverse" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-search">Sauvegarder</button>
        </div>
      </form>
    </div>
  </div>
</div>