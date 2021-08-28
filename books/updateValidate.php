
<?php if ($getBook != null) { ?>
  <div class="container mt-5">
    <div class="row">
      <fieldset>
        <form action="books.php" method="POST">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="newBookAuthor">Auteur:</label>
                <input type="text" class="form-control" name="newBookAuthor" value="<?= $getBook->author ?>" id="newBookAuthor">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="newBookTitle">Titre:</label>
                <input type="text" class="form-control" name="newBookTitle" value="<?= $getBook->title ?>" id="newBookTitle">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="newBookRelease">Date de parution:</label>
                <input type="number" class="form-control" name="newBookRelease" value="<?= $getBook->release ?>" id="newBookRelease">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="newBookResume">Résumé:</label>
              <textarea class="form-control" name="newBookResume" id="newBookResume" rows="3"><?= $getBook->resume ?></textarea>
              <label for="newBookId" class="invisible"></label><input type="number" id="newBookId" name="newBookId" class="invisible" value="<?= $getBook->id ?>">

            </div>
          </div>
          <button type="submit" class="btn btn-search">Valider les modifications</button>
        </form>
      </fieldset>
    </div>
  </div>
<?php } ?>